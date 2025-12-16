<?php

namespace App\Http\Controllers;

use App\Models\Game;

class HomeController extends Controller
{
    public function index()
    {
        $games = Game::with('products')->get();
        return view('home', compact('games'));
    }
}
