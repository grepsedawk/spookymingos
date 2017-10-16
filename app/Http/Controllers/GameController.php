<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game as Game;

class GameController extends Controller
{
    public function new() {
        return view("games.add");
    }

    public function add(Request $request) {
        if ($request->has('title')) {
            $game = new Game;
            $game->title = $request->input('title');
            $game->save();
        }
        return redirect("/gamesession/new");
    }
}
