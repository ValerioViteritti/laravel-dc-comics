<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// QUI VA INSERITO IL MODELS

class PageController extends Controller
{
    public function index(){

        // $movies = Movie::orderBy('title')->get();
        // $title = 'Elenco Film';

        return view('home',);
        // compact('movies', 'title')
    }

    public function about(){

        return view('about');

    }

    public function contacts(){

        return view('contacts');

    }
}
