<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Queries\Admin\PostBuilder;
use App\Models\{Category, Tag};

class PostController extends Controller
{
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

    public function edit(PostBuilder $builder, int $id)
    {
        return view('admin.posts.edit', [
            'categories' => Category::pluck('title', 'id')->all(),
            'tags' => Tag::pluck('title', 'id')->all(),
            'post' => $builder->getPostById($id)
        ]);
    }

    public function update(PostRequest $request, PostBuilder $builder, int $id)
    {
        $post = $builder->getPostById($id);

        $post->update($request->validated());
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.posts.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(PostBuilder $builder, int $id)
    {
        $post = $builder->getPostById($id);
        $post->tags()->sync([]);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Статья удалена');
    }
}
