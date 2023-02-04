<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;


class UpdateController extends Controller
{
    public function __invoke(MovieRequest $request, Movie $movie) {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

        $movie->update($data);
        $movie->tags()->sync($tags);
        
        return redirect()->route('movie.show', $movie->id);
    }
}
