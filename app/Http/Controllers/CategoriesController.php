<?php

namespace App\Http\Controllers;

use App\Models\{Category};
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('id', 'desc')->paginate(8);

        return view('front.categories.single', compact('category','posts'));
    }
}
