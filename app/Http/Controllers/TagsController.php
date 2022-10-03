<?php

namespace App\Http\Controllers;

use App\Queries\TagBuilder;

class TagsController extends Controller
{
    public function index(TagBuilder $builder, string $slug)
    {
        $tag = $builder->getTagBySlug($slug);
        $posts = $tag->posts()->with('category')
            ->orderByDesc('id')
            ->paginate(8);

        return view('front.tags.single', [
            'tag' => $tag,
            'posts' => $posts
        ]);
    }
}
