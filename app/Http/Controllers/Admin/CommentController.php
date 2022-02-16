<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('admin.comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'post_id'=> $request->input('post_id'),
            'title' => $request->input('title'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success','Комментарий добавлен');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('comments.index')->with('success',"Комментарий удален!");
    }
}
