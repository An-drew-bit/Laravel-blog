<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use App\Queries\Admin\TagBuilder;

class TagController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tag::class, 'tag');
    }

    public function index(TagBuilder $builder)
    {
        return view('admin.tags.index', [
            'tags' => $builder->getTagAll()
        ]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request, TagBuilder $builder)
    {
        $builder->createTag($request->validated());

        return redirect()->route('admin.tags.index')->with('success', 'Тег добавлен');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', [
            'tag' => $tag
        ]);
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('admin.tags.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(Tag $tag)
    {
        if ($tag->posts->count()) {
            return redirect()->route('admin.tags.index')->with('error', 'Ошибка, у тега есть записи');
        }

        $tag->delete();

        return redirect()->route('admin.tags.index')->with('success', 'Тег успешно удален');
    }
}
