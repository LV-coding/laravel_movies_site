<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class IndexController extends Controller
{
    public function __invoke()
    {
        $movies = Movie::all()->random(3);
        return view('index', compact('movies'));
    }
}
