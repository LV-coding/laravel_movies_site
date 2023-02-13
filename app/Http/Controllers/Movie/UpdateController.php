<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(MovieRequest $request, Movie $movie) {

        try {
            DB::beginTransaction();

            $data = $request->validated();
            $tags = $data['tags'];
            unset($data['tags']);

            $movie->update($data);
            $movie->tags()->sync($tags);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            return redirect()->route('movie.create');
        }
        
        return redirect()->route('movie.show', $movie->id);
    }
}
