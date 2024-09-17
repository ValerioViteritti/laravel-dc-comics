<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// QUI VA INSERITO IL MODELS
use App\Models\Comic;

class PageController extends Controller
{
    public function index(){

        // $movies = Movie::orderBy('title')->get();
        $title = 'Fumetti della DC Comics';
        $num_fumetti = Comic::count();
        $ultimo_fumetto = Comic::latest()->first();
        $last_fumetto = $ultimo_fumetto->title;
        return view('home', compact('title', 'num_fumetti', 'last_fumetto'));
        // compact('movies', 'title')
    }

    public function about(){

        return view('about');

    }

    public function contacts(){

        return view('contacts');

    }
}
