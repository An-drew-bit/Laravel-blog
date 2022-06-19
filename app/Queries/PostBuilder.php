<?php

namespace App\Queries;

use App\Models\Post;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class PostBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Post::query();
    }

    public function getPostAllWithRelation(): LengthAwarePaginator
    {
        return Post::with('category')
            ->orderByDesc('created_at')
            ->paginate(12);
    }

    public function getPostBySlug(string $slug)
    {
        return Post::where('slug', $slug)
            ->firstOrFail();
    }
}
