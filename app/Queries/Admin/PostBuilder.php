<?php

namespace App\Queries\Admin;

use App\Models\Post;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Pagination\LengthAwarePaginator;

class PostBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Post::query();
    }

    public function getPostAll(): LengthAwarePaginator
    {
        return $this->getBuilder()
            ->with('category', 'tags')
            ->paginate(5);
    }

    public function createPost(array $params): Model
    {
        return $this->getBuilder()
            ->create($params);
    }
}
