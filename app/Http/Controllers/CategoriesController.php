<?php

namespace App\Http\Controllers;

use AWS\CRT\HTTP\Request;
use App\Models\{Category};

class CategoriesController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('id', 'desc')->paginate(8);

        return view('front.categories.single', compact('category','posts'));
    }
}
