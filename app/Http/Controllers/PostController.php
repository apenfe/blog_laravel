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
        return view('posts.create');
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required | min:5 | max:100',
            'body' => 'required | min:5 | max:500'
        ],
        [
            'title.required' => 'El título es obligatorio',
            'title.min' => 'El campo título debe tener al menos 5 caracteres',
            'title.max' => 'El campo título debe tener como máximo 100 caracteres',
            'body.required' => 'El contenido es obligatorio',
            'body.min' => 'El campo contenido debe tener al menos 5 caracteres',
            'body.max' => 'El campo contenido debe tener como máximo 500 caracteres'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        session()->flash('status', 'Post creado correctamente');

        return to_route('posts.index');
    }

}
