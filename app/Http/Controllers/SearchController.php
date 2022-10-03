<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Post;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request, Post $posts)
    {
        $search = $request->search;

        return view('front.posts.search', [
            'posts' => $posts->like($search)
                ->with('category')
                ->paginate(4),
            'search' => $search
        ]);
    }
}
