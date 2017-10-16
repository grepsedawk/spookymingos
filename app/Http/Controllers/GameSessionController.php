<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game as Game;
use App\User as User;
use Auth;
use DB;

class GameSessionController extends Controller
{
    public function addGameSessionForm() {
        // Get all games
        $games = DB::table("games")->orderBy('title')->get();
        // Get all users
        $users = User::where([["id", "!=", Auth::id()], ["active", "=", 1]])->get();
        return view('gamesession.addform')->with([
            "games" => $games,
            "users" => $users
        ]);
    }
}
