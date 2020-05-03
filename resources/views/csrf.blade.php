@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>CSRF Challenge 1</h1> <br>

        <p>During this challenge, we will be talking about CSRF (Cross site request forgery).</p>
        <p>There will be challenges set up in order for you to collect points, this can be done at the end of each challenge</p>

        <p>First, watch the video below to understand what CSRF is, although the video is slightly outdated, the fundamentals are still there, it's very informative and explained well</p>
        <div class="video-responsive">
            <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/vRBihr41JTo" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <h3>Example</h3>
        <p>If we visit this site <a href="https://www.attacker.dev/csrf1" target="_blank">Attack site</a> it will try to log us out of this site. This is an exmaple of a CSRF attack. The attacker is trying to use their site to perform actions on your behalf without you even knowing</p>
        <p>To gain your first flag of this course, put in the  element the attacker used to try log you out of the site</p><br>

        <form role="form" method="post" action="{{route('csrf_1')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="flagValue">Enter answer</label>
                <input type="text" class="form-control" id="answer" placeholder="Enter answer" name="answer" required>
                <input type="hidden" id="question" name="question" value="1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <form role="form" method="post" action="{{route('csrf_1')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="flagValue">Enter answer</label>
                <input type="text" class="form-control" id="answer" placeholder="Enter answer" name="answer" required>
                <input type="hidden" id="question" name="question" value="2">
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

        @if(session('success'))
            <div class="alert alert-success"> <br>
                <h4>{{Session::get('success')}}</h4>
                <p>{{Session::get('flag')}}</p>
            </div>
        @endif
        <p>For your second point, what action was the attacker trying to use? Simply state the action such as "send email"</p>
    </div>
@endsection
