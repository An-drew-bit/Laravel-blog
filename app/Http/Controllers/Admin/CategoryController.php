<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Queries\Admin\CategoryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{RedirectResponse, JsonResponse};
use Illuminate\Routing\Redirector;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    public function index(CategoryBuilder $builder): Application|Factory|View
    {
        return view('admin.categories.index', [
            'categories' => $builder->getCategoryAll()
        ]);
    }

    public function create(): Application|Factory|View
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request, CategoryBuilder $builder): Application|RedirectResponse|Redirector
    {
        $builder->createCategory($request->validated());

        return redirect(route('admin.category.index'))->with('success', 'Категория добавлена');
    }

    public function edit(Category $category): Application|Factory|View
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category): Application|RedirectResponse|Redirector
    {
        $category->update($request->validated());

        return redirect(route('admin.category.index'))->with('success', 'Изменения сохранены');
    }

    public function destroy(Category $category): JsonResponse|RedirectResponse|Redirector
    {
        if ($category->posts->count()) {
            return redirect(route('admin.category.index'))->with('error', 'Ошибка, у категории есть записи');
        }

        $category->delete();

        return response()->json([
            'success' => 'Категория успешно удалена',
        ]);
    }
}
