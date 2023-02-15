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

        if (isset($data['sorting'])) {
            switch($data['sorting']) {
                case 1: $query->orderBy('likes', 'DESC');
                case 2: $query->orderBy('likes', 'ASC');
                case 3: $query->orderBy('id', 'DESC');
                case 4: $query->orderBy('id', 'ASC');
            }
        }

        if(!auth()->user() || !auth()->user()->is_admin) {
            $query->where('is_published', '1');
        }

        $sorting_arr =[[1, 'Most popular'], [2, 'Less popular'], [3, 'New on site'], [4, 'Old on site']];
        $types = Type::all();
        $tags = Tag::all();
        $movies = $query->paginate(20); 
        return view('movie.index', compact('movies', 'types', 'tags', 'sorting_arr'));
    }
}
