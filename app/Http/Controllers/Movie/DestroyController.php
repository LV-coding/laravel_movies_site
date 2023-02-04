<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;


class DestroyController extends Controller
{
    public function __invoke(Movie $movie) {
        $movie->delete();
        return redirect()->route('movie.index');
    }
}
