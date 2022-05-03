<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('home', compact('posts'));
    }
}
