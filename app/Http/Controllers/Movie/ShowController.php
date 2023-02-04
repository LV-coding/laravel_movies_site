<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;


class ShowController extends Controller
{
    public function __invoke(Movie $movie) {
        return view('movie.show', compact('movie'));
    }
}
