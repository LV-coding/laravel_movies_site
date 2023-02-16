<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __invoke(Movie $movie) {
        auth()->user()->likes()->toggle($movie->id);
        return redirect()->back();
    }
}
