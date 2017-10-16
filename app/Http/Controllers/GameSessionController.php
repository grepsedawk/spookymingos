<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Game as Game;
use App\User as User;
use Auth;
use DB;
use App\GameSession as GameSession;

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

    public function addGameSession(Request $request) {
        $authuser = Auth::user();
        $gamesession = new GameSession();
        $gamesession->game = $request->game;
        $userstoinvite = array();
        foreach($request->userstoinvite as $userid) {
            array_push($userstoinvite, $userid);
        }
        $gamesession->invited_users = json_encode($userstoinvite);

        $fulldatetime = $request->datetime;
        $year = substr($fulldatetime, 0, 4);
        $month = substr($fulldatetime, 5, 2);
        $day = substr($fulldatetime, 8, 2);
        $hour = substr($fulldatetime, 11, 2);
        $minute = substr($fulldatetime, 14, 2);

        $gamesession->session_time_utc = Carbon::create($year, $month, $day, $hour, $minute, 0, $authuser->timezone)->setTimezone('UTC');
        $gamesession->session_length = $request->length_in_hours;
        $gamesession->save();
        return redirect("/");
    }
}
