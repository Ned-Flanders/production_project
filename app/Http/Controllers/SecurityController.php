<?php

namespace App\Http\Controllers;

use App\Flags;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Events\ScoreUpdated;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    public function _constructor() {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('security');
    }

    public function store(Request $request)
    {
        $input = $request->input();

        $rules = [
            'flag' => 'required|exists:flags,flag',
            'flagid' => 'exists:flags,challenge_name'
        ];

        $messages = [
            'flag.exists' => "That isn't the right flag, make sure to include 'flag{'",
            'flagid.exists' => "That flagid isn't correct, are you submitting another challenge's flag?"
        ];

        $validator = Validator::make($input, $rules, $messages);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $user->score = $user->score + 1;
        $user->save();

        event(new ScoreUpdated($user)); // broadcast `ScoreUpdated` event

        return redirect()->back()->withSuccess('Success, Your score has been updated')->withValue($user->score);
    }

    public function leaderboard () {
        return User::all(['id', 'name', 'score']);
    }
}
