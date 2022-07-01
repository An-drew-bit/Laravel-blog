<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Post;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request, Post $posts)
    {
        $s = $request->s;

        return view('front.posts.search', [
            'posts' => $posts->like($s)
                ->with('category')
                ->paginate(4),
            's' => $s
        ]);
    }
}
