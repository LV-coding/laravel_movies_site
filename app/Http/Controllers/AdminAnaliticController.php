<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminAnaliticController extends Controller
{   
    public function __invoke() {

        // UserGropu
        $accounts = User::all();
        $usersCount = 0;
        $adminsCount = 0;

        foreach($accounts as $account) {
            if ($account->is_admin == 1) {
                ++$adminsCount;
            } else {
                ++$usersCount;
            }
        }

        // Movie Group
        $movies = Movie::all();
        $moviesPublishedCount = 0;
        $moviesNotPublishedCount = 0;
        foreach($movies as $movie) {
            if ($movie->is_published == 1) {
                ++$moviesPublishedCount;
            } else {
                ++$moviesNotPublishedCount;
            }
        }
        // Other
        $tagsCount = Tag::all()->count();
        $typesCount = Type::all()->count();

        return view('analitic', compact('usersCount', 
                                        'adminsCount', 
                                        'moviesPublishedCount', 
                                        'moviesNotPublishedCount',
                                        'tagsCount', 
                                        'typesCount'));
    }
    
}