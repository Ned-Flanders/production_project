@extends('layouts.app')

@section('content')
    <div class="container">
        <p>When you solved the challenge, enter the flag here to score a point</p>
        <form role="form" method="post" action="{{route('security')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="flagValue">Enter flag</label>
                <input type="text" class="form-control" id="flagValue" placeholder="Enter flag" name="flag" value="{{old('flag')}}" required>
                <input type="hidden" id="flagid" name="flagid" value="CSRF Challenge 1">

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

        @if(session('success') && $value = session('value'))
            <div class="alert alert-success"> <br>
                <h4>{{Session::get('success')}}</h4>
                <h4>Your current score is {{ auth()->user()->score }}</h4>
            </div>
        @endif
    </div>

@endsection
