<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Queries\Admin\TagBuilder;

class TagController extends Controller
{
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

        return redirect()->route('tags.index')->with('success', 'Тег добавлен');
    }

    public function edit(TagBuilder $builder, int $id)
    {
        return view('admin.tags.edit', [
            'tag' => $builder->getTagById($id)
        ]);
    }

    public function update(TagRequest $request, TagBuilder $builder, int $id)
    {
        $tag = $builder->getTagById($id);

        $tag->update($request->validated());

        return redirect()->route('tags.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(TagBuilder $builder, int $id)
    {
        $tag = $builder->getTagById($id);

        if ($tag->posts->count()) {
            return redirect()->route('tags.index')->with('error', 'Ошибка, у тега есть записи');
        }

        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Тег успешно удален');
    }
}
