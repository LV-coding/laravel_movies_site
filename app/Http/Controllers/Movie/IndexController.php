<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieFilterRequest;
use App\Models\Movie;
use App\Models\Type;
use App\Models\Tag;


class IndexController extends Controller
{
    public function __invoke(MovieFilterRequest $request) 
    {
        $data = $request->validated();

        $query = Movie::query();
        
        if (isset($data['type_id'])) {
            if ($data['type_id'] != 0) { // 0 its all types
                $query->where('type_id', $data['type_id']);
            }
        }

        $types = Type::all();
        $tags = Tag::all();
        $movies = $query->orderBy('id', 'DESC')->paginate(20); 
        return view('movie.index', compact('movies', 'types', 'tags'));
    }
}
