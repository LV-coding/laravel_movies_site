<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function storeIndexPage(Movie $movie) {
        auth()->user()->likes()->toggle($movie->id);
        return redirect()->route('movie.index');
    }

    public function storeShowPage(Movie $movie) {
        auth()->user()->likes()->toggle($movie->id);
        return redirect()->route('movie.show', compact('movie'));
    }
}
