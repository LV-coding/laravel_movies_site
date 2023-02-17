<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchMovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class SearchMovieController extends Controller
{
    public function __invoke(SearchMovieRequest $request) {

        $data = $request->validated();
        $query = Movie::query();

        $query->where('title_ua', 'LIKE', "%{$data['search']}%")
                       ->orWhere('title_original', 'LIKE', "%{$data['search']}%")
                       ->orWhere('description', 'LIKE', "%{$data['search']}%");

        if(!auth()->user() || !auth()->user()->is_admin) {
            $query->where('is_published', '1');
        }

        $movies = $query->withCount('likes')->with('type', 'tags')->paginate(20); 
        $moviesCount = $movies->total();
        return view('search', compact('movies', 'moviesCount'));
    }
}
