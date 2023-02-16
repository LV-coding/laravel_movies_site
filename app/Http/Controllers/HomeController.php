<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard. C:/xampp/php/php.exe
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $movies = auth()->user()->likes;
        return view('home', compact('movies'));
    }
}
