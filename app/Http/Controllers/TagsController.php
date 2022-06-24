<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function index(Tag $tags, string $slug)
    {
        $tag = $tags->where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->with('category')
            ->orderByDesc('id')
            ->paginate(8);

        return view('front.tags.single', [
            'tag' => $tag,
            'posts' => $posts
        ]);
    }
}
