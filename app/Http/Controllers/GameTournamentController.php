<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameTournamentController extends Controller
{
    public function comingsoon() {
        return view('tournaments.comingsoon');
    }
}
