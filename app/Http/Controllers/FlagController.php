<?php

namespace App\Http\Controllers;

use App\Events\ScoreUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DB;

class FlagController extends Controller
{
    public function index() {
        return view ('submitflags');
    }

    public function submitFlags (Request $request) {
        $input = $request->input();

        $rules = [
            'flag' => 'required|exists:flags,flag',
        ];

        $messages = [
            'flag.exists' => "That flag isn't right, make sure to include 'flag{'"
        ];

        $validator = Validator::make($input, $rules, $messages);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user_id = Auth::id();

        $flagid = DB::table('flags')->where('flag', '=', request('flag'))->pluck('id')->first();

        $submitted = DB::table('user_flags')->select('submitted')->where('flag_id', '=', $flagid)->where('user_id', '=', $user_id)->first();

        if ($submitted === null) {

            $user = Auth::user();
            $user->score = $user->score + 1;
            $user->save();

            event(new ScoreUpdated($user)); // broadcast `ScoreUpdated` event

            DB::table('user_flags')->insert(array(['submitted' => 1, 'user_id' => $user_id, 'flag_id' => $flagid, 'created_at' => NOW(), 'updated_at'=> NOW()]));

            return redirect()->back()->withSuccess('Success, Your score has been updated')->withValue($user->score);
        }

        else {
            return Redirect::back()->withErrors(['Error, you have already submitted this flag']);
        }
    }
}
