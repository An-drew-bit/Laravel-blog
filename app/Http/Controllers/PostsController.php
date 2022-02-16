<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\{Post, User};

class PostsController extends Controller
{
    public function index($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->view += 1;

        $comments = Comment::all();
        $user = User::all();

        $post->update();

        return view('front.posts.single', compact('post', 'comments', 'user'));
    }
}
