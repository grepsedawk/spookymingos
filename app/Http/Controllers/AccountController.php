<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{

    public function settings(){
        // Set steam key
        $steamkey = "9C1D35CE16CD28ED6C5617ECD584C5B7";
        // Check if the current player has a steam_id
        if(isset(Auth::user()->steam_id)) {
            // Set the connection to true
            $is_connected_to_steam = true;
            // Connect to Steam
            $json = file_get_contents("https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $steamkey . "&steamids=" . Auth::user()->steam_id);
            // Get object from JSON
            $obj = json_decode($json);
            // Get raw players
            $player = $obj->response->players[0];
        } else {
            // Set the connection to false
            $is_connected_to_steam = false;
            // Set the player to empty
            $player = array();
        }

        return view('settings')->with([
            "is_connected_to_steam" => $is_connected_to_steam,
            "self_player" => $player,
            "timezone" => Auth::user()->timezone
        ]);
    }


    public function saveTimezone(Request $request) {
        $user = Auth::user();
        $user->timezone = $request->timezone;
        $user->save();
        return redirect("/settings");
    }
}
