<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function _constructor() {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('security');
    }
}
