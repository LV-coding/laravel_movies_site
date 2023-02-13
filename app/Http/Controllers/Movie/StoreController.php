<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(MovieRequest $request) {

        try {
            DB::beginTransaction();

            $data = $request->validated();

            $tags = $data['tags'];
            unset($data['tags']);
    
            $movie = Movie::create($data);
            $movie->tags()->attach($tags);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            return redirect()->route('movie.create');
        }   

        return redirect()->route('movie.index');
    }
}
