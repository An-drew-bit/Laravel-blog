<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Queries\CommentBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    public function index(CommentBuilder $builder): Application|Factory|View
    {
        return view('admin.comments.index', [
            'comments' => $builder->getCommentRelation(),
        ]);
    }

    public function destroy(Comment $comment): Application|RedirectResponse|Redirector
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success',"Комментарий удален!");
    }
}
