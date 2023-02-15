<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieEditRequest;
use App\Models\Movie;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(MovieEditRequest $request, Movie $movie) {

        try {
            DB::beginTransaction();

            $data = $request->validated();
            $tags = $data['tags'];
            unset($data['tags']);

            if (isset($data['image_path'])) {
                $data['image_path'] = Storage::disk('public')->put('images', $data['image_path']);
            }
            
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
