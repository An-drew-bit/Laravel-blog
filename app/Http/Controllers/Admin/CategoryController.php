<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Queries\Admin\CategoryBuilder;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    public function index(CategoryBuilder $builder)
    {
        return view('admin.categories.index', [
            'categories' => $builder->getCategoryAll()
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request, CategoryBuilder $builder)
    {
        $builder->createCategory($request->validated());

        return redirect(route('admin.category.index'))->with('success', 'Категория добавлена');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect(route('admin.category.index'))->with('success', 'Изменения сохранены');
    }

    public function destroy(Category $category)
    {
        if ($category->posts->count()) {
            return redirect(route('admin.category.index'))->with('error', 'Ошибка, у категории есть записи');
        }

        $category->delete();

        return redirect(route('admin.category.index'))->with('success', 'Категория успешно удалена');
    }
}
