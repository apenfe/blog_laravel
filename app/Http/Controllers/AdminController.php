<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(User $user)
    {

        $posts = Post::where('user_id', $user->id)->get();

        return view('admin-posts', compact('posts'));
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
        return view('posts.edit', compact('post'));

    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        $post->update($request->validated());

        return to_route('posts.show', $post)->with('status', 'Post modificado correctamente');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')->with('status', 'Post eliminado correctamente');
    }
}
