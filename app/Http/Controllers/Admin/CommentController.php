<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Queries\Admin\CommentBuilder;

class CommentController extends Controller
{
    public function index(CommentBuilder $builder)
    {
        return view('admin.comments.index', [
            'comments' => $builder->getCommentRelation(),
        ]);
    }

    public function destroy(CommentBuilder $builder, int $id)
    {
        $comment = $builder->getCommentById($id);

        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success',"Комментарий удален!");
    }
}
