<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;


class ShowController extends Controller
{
    public function __invoke(Movie $movie) {

        if( $movie->is_published || (auth()->user() && auth()->user()->is_admin)) {
            return view('movie.show', compact('movie'));
        }
        return redirect()-> route('movie.index');
    }
}
