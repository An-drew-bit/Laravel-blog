<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Queries\PostBuilder;

class PostsController extends Controller
{
    public function index(string $slug, PostBuilder $builder)
    {
        $post = $builder->getPostBySlug($slug);
        $post->view += 1;

        $post->update();

        return view('front.posts.single', [
            'post' => $post
        ]);
    }
}
