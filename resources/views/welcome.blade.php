@extends('layouts.app')

@section('content')
    <body class="home">
            <div class="flex-center position-ref full-height">
                <div class="masthead">
                    <div class="container">
                        <div class="left-content">
                            <h2>Learn from us, for free</h2>
                            <p>Interested in forensics &amp; security? </p>
                            <p>We can put you on your new career path</p>
                            <p>Get started</p>
                            <a href="{{ route('register') }}"><button>Register now</button></a>
                        </div>
                        <div class="right-content">
                            <h2>Already got an account?</h2>
                            <p>Login to continue your learning</p>
                            <a href="{{ route('login') }}"><button>Login</button></a>
                        </div>
                    </div>
                </div>
                <section class="courses">
                    <div class="container">
                        <h2>Top Courses</h2>

                        <div class="home-carousel">
                            <div class="carousel-item">
                                <div class="carousel-image" id="web">
                                </div>
                                <h3>Web Security</h3>
                                <p>Learn the fundamentals of web security</p>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-image" id="computer">
                                </div>
                                <h3>Computer Security</h3>
                                <p>Learn the fundamentals of computer security</p>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-image" id="forensics-computer">
                                </div>
                                <h3>Computer Forensics</h3>
                                <p>Learn the fundamentals of computer forensics</p>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-image" id="mobile-forensics">
                                </div>
                                <h3>Mobile Forensics</h3>
                                <p>Learn the fundamentals of computer forensics</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    </body>
</html>
@endsection
