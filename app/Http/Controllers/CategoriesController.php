<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(Category $categories, string $slug)
    {
        $category = $categories->where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderByDesc('id')->paginate(8);

        return view('front.categories.single', [
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
