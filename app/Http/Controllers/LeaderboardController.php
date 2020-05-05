<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index() {
        return view ('leaderboard');
    }

    public function leaderboard () {
        return User::all(['id', 'name', 'score']);
    }
}
