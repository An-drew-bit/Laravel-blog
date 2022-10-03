<?php

namespace App\Http\Controllers;

use App\Queries\CategoryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class CategoriesController extends Controller
{
    public function index(CategoryBuilder $builder, string $slug): Application|Factory|View
    {
        $category = $builder->getCategoryBySlug($slug);
        $posts = $category->posts()->orderByDesc('id')->paginate(8);

        return view('front.categories.single', [
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
