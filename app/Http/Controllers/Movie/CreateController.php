<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Type;


class CreateController extends Controller
{
    public function __invoke() {
        $types = Type::all(); 
        $tags = Tag::all();
        return view('movie.create', compact('types', 'tags'));
    }
}
