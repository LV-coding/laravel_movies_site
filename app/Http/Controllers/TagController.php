<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    public function create() {
        return view('tag.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required|string|max:255',
        ]);
        Tag::create($data);
        return redirect()->route('tag.index');
    }

    public function edit(Tag $tag) {
        return view('tag.edit', compact('tag'));
    }

    public function update(Tag $tag) {
        $data = request()->validate([
            'title' => 'required|string|max:255',
        ]);
        $tag->update($data);
        return redirect()->route('tag.index');
    }

    public function destroy(Tag $tag) {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
