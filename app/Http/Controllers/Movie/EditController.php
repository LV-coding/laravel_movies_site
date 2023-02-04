<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Type;
use App\Models\Tag;


class EditController extends Controller
{
    public function __invoke(Movie $movie) {
        $types = Type::all(); 
        $tags = Tag::all();
        return view('movie.edit', compact('movie','types', 'tags'));
    }
}
