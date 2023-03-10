<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class IndexController extends Controller
{
    public function __invoke()
    {
        $movies = Movie::where('is_published', '1')->get()->random(3);
        return view('index', compact('movies'));
    }
}
