<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Queries\Admin\PostBuilder;
use App\Services\Contracts\Upload;
use App\Models\{Category, Post, Tag};

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(PostBuilder $builder)
    {
        return view('admin.posts.index', [
            'posts' => $builder->getPostAll()
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::pluck('title', 'id')->all(),
            'tags' => Tag::pluck('title', 'id')->all()
        ]);
    }

    public function store(PostRequest $request, PostBuilder $builder)
    {
        $post = $builder->createPost($request->validated());

        $post->tags()->sync($request->tags);

        return redirect()->route('admin.posts.index')->with('success', 'Статья добавлена');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'categories' => Category::pluck('title', 'id')->all(),
            'tags' => Tag::pluck('title', 'id')->all(),
            'post' => $post
        ]);
    }

    public function update(PostRequest $request, Post $post, Upload $upload)
    {
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $upload->uploadImage($request->file('thumbnail'));
        }

        $post->update($validated);

        $post->tags()->sync($request->tags);

        return redirect()->route('admin.posts.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(Post $post)
    {
        $post->tags()->sync([]);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Статья удалена');
    }
}
