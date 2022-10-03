<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment): RedirectResponse
    {
        $comment->create([
            'user_id' => auth()->id(),
            'title' => $request->get('title'),
            'comment' => $request->get('comment'),
            'post_id' => $request->get('post_id'),
        ]);

        return back()->with('success','Комментарий добавлен');
    }

    public function destroy()
    {
        //
    }
}
