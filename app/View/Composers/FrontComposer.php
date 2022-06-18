<?php

namespace App\View\Composers;

use App\Models\{Category, Post};
use Illuminate\View\View;

class FrontComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'posts' => Post::orderBy('view', 'desc')->limit(6)->get(),
            'categories' => Category::all()->where('slug'),
        ]);
    }
}
