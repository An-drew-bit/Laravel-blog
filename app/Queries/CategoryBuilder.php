<?php

namespace App\Queries;

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
        return $this->getBuilder()
            ->paginate(10);
    }

    public function getCategoryBySlug(string $slug): Model
    {
        return $this->getBuilder()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function createCategory(array $params): Model
    {
        return $this->getBuilder()
            ->create($params);
    }
}
