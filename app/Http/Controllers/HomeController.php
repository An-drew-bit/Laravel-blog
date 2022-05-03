<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with('category')
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('home', compact('posts'));
    }
}
