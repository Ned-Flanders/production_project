<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Validator,Redirect,Response;

class SendEmailController extends Controller
{
    //
    function index(){
        return view('send_email');
    }

    function send(Request $request) {
        //Used to validate the data being sent on the form, all fields required so it cannot be send blank
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $data = array(
          'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        );

        Mail::to('Jamie.w97@outlook.com')->send(new SendMail($data));
        return back()->with('success', 'Your message has been sent');
    }
}
