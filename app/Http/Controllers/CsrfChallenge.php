<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DB;

class CsrfChallenge extends Controller
{

    public function _constructor() {
        $this->middleware('auth');
    }

    public function index() {
        return view ('csrf');
    }

    public function CheckAnswers (request $request) {

        $input = $request->input();

        $answer = DB::table('challenge_answers')->where('answer', '=', request('answer'))->where('id','=',request('question'))->pluck('challenge_name')->first();
        $flag = DB::table('flags')->where('challenge_name','=', $answer)->pluck('flag')->first();

        $rules = [
            'answer' => 'required|exists:challenge_answers,answer',
        ];

        $messages = [
            'answer.exists' => "That answer isn't right",
        ];

        $validator = Validator::make($input, $rules, $messages);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if($answer === null) {
            return Redirect::back()->withErrors("That answer isn't right");
        }

        return redirect()->back()->withSuccess("That's the correct answer")->with(['flag' => $flag]);
    }
}
