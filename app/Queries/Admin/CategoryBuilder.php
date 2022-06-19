<?php

namespace App\Queries\Admin;

use App\Models\Category;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Category::query();
    }

    public function getCategoryAll(): LengthAwarePaginator
    {
        return Category::paginate(10);
    }

    public function createCategory(array $params): Model
    {
        return Category::create($params);
    }
}
