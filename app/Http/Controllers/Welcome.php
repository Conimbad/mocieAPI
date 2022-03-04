<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class Welcome extends Controller
{
    public function index() {
        $movies = Http::get('http://www.omdbapi.com/?page=30&s&type=movie&s=war&apikey=dcec297d');
        $movies = $movies->json();
        return view('welcome', compact('movies'));
    }
}
