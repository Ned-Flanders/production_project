<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flags;

class AdminController extends Controller
{
    public function _constructor() {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $flags ['flags']=Flags::OrderBy('id','asc')->paginate(3);

        return view('admin', $flags);
    }

    public function store(Request $request) {

        Flags::create([
            'challenge_name'=>$request->challenge_name,
            'flag' => $request->flag,
            'course' => $request->course
        ]);

        return redirect()->route('admin.index')->with('success', 'Flag Created Successfully');
    }

    public function update(Request $request) {

       Flags::findOrfail($request->flag_id)->update([
           'challenge_name'=>$request->challenge_name,
           'flag' => $request->flag,
           'course' => $request->course
       ]);

        return redirect()->route('admin.index')->with('success', 'Flag Updated Successfully');

    }

    public function destroy(Request $flag) {
        $delete = $flag->all();

        $deleteflag = Flags::findOrfail($flag->flag_id);

        $deleteflag->delete();

        return redirect()->route('admin.index')->with('success', 'Flag Deleted Successfully');

    }
}

