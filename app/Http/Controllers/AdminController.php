<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game as Game;

class AdminController extends Controller
{
    public function main() {
        return view("admin.main");
    }

    public function games() {
        $games = Game::all();
        return view("admin.games")->with([
            "games" => $games
        ]);
    }

    public function addGame(Request $request) {
        if ($request->has('title')) {
            $game = new Game;
            $game->title = $request->input('title');
            $game->save();
        }
        return redirect("/admin/games");
    }
}
