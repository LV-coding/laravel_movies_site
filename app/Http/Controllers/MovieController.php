<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieTag;
use App\Models\Tag;
use App\Models\Type;


class MovieController extends Controller
{
    public function index() {
        $movies = Movie::orderBy('id', 'DESC')->limit(3)->get();
        return view('movie.index', compact('movies'));
    }

    public function create() {
        $types = Type::all(); 
        $tags = Tag::all();
        return view('movie.create', compact('types', 'tags'));
    }

    public function store(MovieRequest $request) {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

        $movie = Movie::create($data);

        $movie->tags()->attach($tags);

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
        $tags = Tag::all();
        return view('movie.edit', compact('movie','types', 'tags'));
    }

    public function update(MovieRequest $request, Movie $movie) {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

        $movie->update($data);
        $movie->tags()->sync($tags);
        
        return redirect()->route('movie.show', $movie->id);
    }
}
