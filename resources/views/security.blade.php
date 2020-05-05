@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Welcome to the security course.</h1>

        <p>This course will teach you about common security vulnerabilities found in web and software</p>

        <p>Below you can choose the Web or Software Security course then choose a module to start </p>

        <p>Every challenge you complete, you will be rewarded a flag to submit for points to climb our <a href="https://production_project.dev/leaderboard" target="_blank"> leaderboard </a></p>

        <p>When you solved the challenge, submit the flags <a href="{{route('SubmitFlag')}}" target="_blank">here</a> to score a point</p>

        <p>You may wish to collect the flags and then submit them at the end of the course</p>

        <p>If you have any problems or questions, you can <a href="{{route('contact')}}" target="_blank">contact us</a></p>
    </div>
@endsection
