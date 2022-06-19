<?php

namespace App\Queries\Admin;

use App\Models\Comment;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Pagination\LengthAwarePaginator;

class CommentBuilder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Comment::query();
    }

    public function getCommentRelation(): LengthAwarePaginator
    {
        return Comment::with(['post', 'user'])->paginate(10);
    }
}
