<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StandartPostRequest;
use App\Models\Category;
use App\Queries\PostBuilder;

class StandartPostController extends Controller
{
    public function index(Category $category)
    {
        return view('front.posts.standart', [
            'categories' => $category->pluck('title', 'id')->all()
        ]);
    }

    public function store(StandartPostRequest $request, PostBuilder $builder)
    {
        $builder->createStandartPost($request->validated());

        return back();
    }
}
