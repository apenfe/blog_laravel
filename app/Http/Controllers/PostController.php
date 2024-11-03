<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {

        $posts = Post::where('published_at', '<=', now())
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('posts.index', [
            'posts' => PostResource::collection($posts)
        ]);
    }

    public function show(Post $post)
    {
        // model binding se enlace clave primaria con el modelo
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', [
            'post' => new Post()
        ]);
    }

    public function store(StorePostRequest $request)
    {

        // prepare for validation
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $post = new Post($validated);
        $post->user_id = auth()->id();
        $post->save();

        // $post = new Post($request->validated());
        //  $post->user_id = auth()->id();
        //  $post->save();

        return to_route('posts.index')->with('status', 'Post creado correctamente');
    }

    public function edit(Post $post)
    {

        /*
         * cuidado con esto
         */

        // debo comprobar si el post es del usuario logueado
        if (auth()->id() !== $post->user_id) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        // $post->update($request->validated());

        // prepare for validation
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        } else {
            $validated['image'] = $post->image;
        }

        // ver si ya existe otra imagen
        if ($post->image && $request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
        }

        $post->update($validated);


        return to_route('posts.show', $post)->with('status', 'Post modificado correctamente');
    }

    public function destroy(Post $post)
    {

        // debo comprobar si el post es del usuario logueado
        if (auth()->id() !== $post->user_id) {
            abort(403);
        }

        $post->delete();

        return to_route('posts.index')->with('status', 'Post eliminado correctamente');
    }
}
