<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(User $user)
    {
        if (auth()->id() !== $user->id) {
            abort(403);
        }

        $posts = Post::where('user_id', $user->id)->paginate(6);

        return view('admin-posts', compact('posts'));
    }

    public function edit(Post $post)
    {
        // debo comprobar si el post es del usuario logueado
        if (auth()->id() !== $post->user_id) {
            abort(403);
        }

        return view('posts.edit', compact('post'));

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
