<?php

namespace App\Http\Controllers;

use App\Models\{Tag};

class TagsController extends Controller
{
    public function index($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->with('category')->orderBy('id', 'desc')->paginate(8);

        return view('front.tags.single', compact('tag','posts'));
    }
}
