<?php

namespace App\Queries;

use App\Models\Comment;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\{Builder};
use Illuminate\Pagination\LengthAwarePaginator;

class CommentBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Comment::query();
    }

    public function getCommentRelation(): LengthAwarePaginator
    {
        return $this->getBuilder()
            ->with(['post', 'user'])
            ->paginate(10);
    }
}
