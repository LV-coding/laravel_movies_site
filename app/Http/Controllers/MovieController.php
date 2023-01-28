<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Type;


class MovieController extends Controller
{
    public function index() {
        $movies = Movie::orderBy('id', 'DESC')->limit(3)->get();
        return view('movie.index', compact('movies'));
    }

    public function create() {
        $types = Type::all(); 
        return view('movie.create', compact('types'));
    }

    public function store() {
        $data = request()->validate([
            'title_ua' => 'required|string|max:255',
            'title_original' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:'.(date('Y')),
            //'image_path' => 'image|mimes:jpg,png,jpeg,svg|max:2048',
            'link_1' => 'required|string|max:255',
            'link_2' => 'string|max:255',
            'description' => 'required|string|max:500',
            'type_id' => 'required|integer',
        ]);
        Movie::create($data);
        return redirect()->route('movie.index');
    }

    public function show(Movie $movie) {
        return view('movie.show', compact('movie'));
    }

    public function destroy(Movie $movie) {
        $movie->delete();
        return redirect()->route('movie.index');
    }

    public function edit(Movie $movie) {
        $types = Type::all(); 
        return view('movie.edit', compact('movie','types'));
    }

    public function update(Movie $movie) {
        $data = request()->validate([
            'title_ua' => 'required|string|max:255',
            'title_original' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:'.(date('Y')),
            //'image_path' => 'image|mimes:jpg,png,jpeg,svg|max:2048',
            'link_1' => 'required|string|max:255',
            'link_2' => 'string|max:255',
            'description' => 'required|string|max:500',
            'type_id' => 'required|integer',
        ]);

        $movie->update($data);
        return redirect()->route('movie.show', $movie->id);
    }
}
