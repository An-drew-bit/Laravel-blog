<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Queries\Admin\CommentBuilder;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    public function index(CommentBuilder $builder)
    {
        return view('admin.comments.index', [
            'comments' => $builder->getCommentRelation(),
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success',"Комментарий удален!");
    }
}
