<?php

namespace App\Queries\Admin;

use App\Models\Tag;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Pagination\LengthAwarePaginator;

class TagBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Tag::query();
    }

    public function getTagAll(): LengthAwarePaginator
    {
        return $this->getBuilder()
            ->paginate(5);
    }

    public function createTag(array $params): Model
    {
        return $this->getBuilder()
            ->create($params);
    }
}
