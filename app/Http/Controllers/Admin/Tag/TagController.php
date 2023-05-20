<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Carbon\Carbon;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')->get();
        $carbon = Carbon::class;
        return view('admin.tag.index', compact('tags', 'carbon'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }

    public function show(Tag $tag)
    {
        $carbon = Carbon::class;
        return view('admin.tag.show', compact('tag', 'carbon'));
    }

    public function edit(tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, tag $tag)
    {
        $data = $request->validated();
        tag::find($tag->id)->update($data);
        return redirect()->route('admin.tag.show', $tag->id);
    }

    public function destroy(tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
