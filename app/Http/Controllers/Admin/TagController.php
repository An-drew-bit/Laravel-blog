<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use App\Queries\TagBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class TagController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tag::class, 'tag');
    }

    public function index(TagBuilder $builder): Application|Factory|View
    {
        return view('admin.tags.index', [
            'tags' => $builder->getTagAll()
        ]);
    }

    public function create(): Application|Factory|View
    {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request, TagBuilder $builder): Application|RedirectResponse|Redirector
    {
        $builder->createTag($request->validated());

        return redirect()->route('admin.tags.index')->with('success', 'Тег добавлен');
    }

    public function edit(Tag $tag): Application|Factory|View
    {
        return view('admin.tags.edit', [
            'tag' => $tag
        ]);
    }

    public function update(TagRequest $request, Tag $tag): Application|RedirectResponse|Redirector
    {
        $tag->update($request->validated());

        return redirect()->route('admin.tags.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(Tag $tag): Application|RedirectResponse|Redirector
    {
        if ($tag->posts->count()) {
            return redirect()->route('admin.tags.index')->with('error', 'Ошибка, у тега есть записи');
        }

        $tag->delete();

        return redirect()->route('admin.tags.index')->with('success', 'Тег успешно удален');
    }
}
