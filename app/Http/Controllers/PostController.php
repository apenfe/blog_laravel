<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {

        $posts = Post::where('published_at', '<=', now())
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('posts.index', compact('posts'));
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

    public function store(StorePostRequest $request) {

        $post = new Post($request->validated());
        $post->user_id = auth()->id();
        $post->save();
        //Post::create($request->validated());

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

        $post->update($request->validated());

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
