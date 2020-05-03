@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Welcome to the web security course.</h1>

        <p>This course will explore some common web security vulnerabilities which exist today</p>

        <p>Below you will see a choice of courses you can start on below</p>

        <p>At the end of each challenge, you will be rewarded a flag which can be used to gain points and climb our <a href="https://production_project.dev/leaderboard" target="_blank"> leaderboard </a></p>

        <p>When you solved the challenge, enter the flag here to score a point</p>
        <h1>Submit your flags</h1>
        <form role="form" method="post" action="{{route('security')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="flagValue">Enter flag</label>
                <input type="text" class="form-control" id="flagValue" placeholder="Enter flag" name="flag" value="{{old('flag')}}" required>
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
