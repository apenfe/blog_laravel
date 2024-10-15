<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();

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

    public function store(Request $request) {

        $request->validate([
            'title' => 'required | min:5 | max:100',
            'body' => 'required | min:5 | max:500'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        session()->flash('status', 'Post creado correctamente');

        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));

    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required | min:5 | max:100',
            'body' => 'required | min:5 | max:500'
        ]); // si falla se vuelve al propio formulario con los errores

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->update();

        session()->flash('status', 'Post modificado correctamente');

        return to_route('posts.show', $post);

    }

}
