<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Discord\Discord;

class HomeController extends Controller

// Slack bot access token xoxb-235581167492-8qSe2tZnisDJSkm2IOoWdhXT

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all users
        $users = \App\User::all();
        // Create steamids string
        $steamids = "";
        // Set steam key
        $steamkey = "9C1D35CE16CD28ED6C5617ECD584C5B7";
        // Get steam IDs
        foreach ($users as $user) {
            // Append steam ID to steamids
            $steamids = $steamids . $user->steam_id . ",";
        }
        // Trim the last comma off the end
        $steamids = substr($steamids, 0, -1);
        // Connect to Steam
        $json = file_get_contents("https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $steamkey . "&steamids=" . $steamids);
        // Get object from JSON
        $obj = json_decode($json);
        // Get raw players
        $raw_players = $obj->response->players;
        // Setup array for sorting online/offline players
        $players = array();
        // Run through players
        foreach ($raw_players as $player) {
            // If they are online lets add them to the top of the array
            if ($player->personastate !== 0) {
                array_push($players, $player);
            }
        }
        // Run through the players again
        foreach ($raw_players as $player) {
            // If they are offline lets add them to the end of the array now
            if ($player->personastate === 0) {
                array_push($players, $player);
            }
        }
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

        return view('home')->with([
            "users" => $users,
            "steam_players" => $players,
            "is_connected_to_steam" => $is_connected_to_steam,
            "self_player" => $player
        ]);
    }
}
