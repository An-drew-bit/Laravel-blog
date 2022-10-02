<?php

namespace App\Queries;

use App\Models\{Post, User};
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Pagination\LengthAwarePaginator;

class PostBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Post::query();
    }

    public function getPostAllWithRelation(): LengthAwarePaginator
    {
        return $this->getBuilder()
            ->with('category')
            ->orderByDesc('created_at')
            ->paginate(12);
    }

    public function getPostBySlug(string $slug): Model
    {
        return $this->getBuilder()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function createStandartPost(array $params): Model
    {
        $user = User::findOrFail(auth()->id());

        return $user->posts()->create($params);
    }
}
