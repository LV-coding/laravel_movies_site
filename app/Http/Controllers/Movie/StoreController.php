<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;


class StoreController extends Controller
{
    public function __invoke(MovieRequest $request) {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

        $movie = Movie::create($data);

        $movie->tags()->attach($tags);

        return redirect()->route('movie.index');
    }
}
