<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index() {
        $types = Type::all();
        return view('type.index', compact('types'));
    }

    public function create() {
        return view('type.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required|string|max:255',
        ]);
        Type::create($data);
        return redirect()->route('type.index');
    }

    public function edit(Type $type) {
        return view('type.edit', compact('type'));
    }

    public function update(Type $type) {
        $data = request()->validate([
            'title' => 'required|string|max:255',
        ]);
        $type->update($data);
        return redirect()->route('type.index');
    }

    public function destroy(Type $type) {
        $type->delete();
        return redirect()->route('type.index');
    }
}
