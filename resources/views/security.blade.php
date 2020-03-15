@extends('layouts.app')

@section('content')
$flag = User::where('flag', '=', Input::get('flag_text'))->first();

if ($user === null) {
// user doesn't exist
}
@endsection
