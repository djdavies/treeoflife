<!DOCTYPE html>
<html lang="en">

    <head>
        @section('head')
            <meta charset="UTF-8">
            <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
            <link rel="stylesheet" href="{{asset('css/custom_bootstrap.css')}}"/>
            <link rel="stylesheet" href="{{asset('scss/familytree.css')}}"/>
        @show
    </head>

    <body>
        <div class="container height-buffer">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{ URL::route('home') }}">Project Yggdrasil</a>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form action="/search" class="navbar-form navbar-left" role="search">
                        <div class="form-group dropdown">
                            <input type="text" class="form-control searchbar" placeholder="Search" name="request" data-toggle="dropdown">
                            <ul class="dropdown-menu results hidden" role="menu" aria-labelledby="dLabel"></ul>
                        </div>
                    </form>


                    <ul class="nav navbar-nav navbar-left navbar-collapse collapse navbar-responsive-collapse">
                        <li><a href="{{ URL::route('home') }}">Home</a></li>
                        <li><a href="/search">Explore</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="{{ URL::route('getForum') }}">Forums</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                            <!-- when user is logged in -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-default navbar-btn">{{{ Auth::user()->username }}}</button>
                                <button type="button" class="btn btn-default dropdown-toggle navbar-btn" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ URL::route('getLogout') }}">Log Out</a></li>
                                </ul>
                            </div>
                        @else
                            <button type="button" class="btn btn-success navbar-btn" id="sign_in">Sign in</button>
                            <a href="{{ URL::route('userCreate') }}" type="button" class="btn btn-default navbar-btn sign_up" id="register">Sign up</a>

                            {{Form::open(['route' => 'postLogin', 'class' => 'navbar-form input-hide login'])}}

                                <div class="form-group">
                                    {{ Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Username']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) }}
                                </div>

                                {{ Form::submit('Submit',["class" => "btn btn-success navbar-btn"]) }}
                            {{ Form::close() }}
                        @endif
                    </ul>
                </div>
            </nav>

            <div class="page-header">
                @yield('header')
            </div>

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-warning">
                    {{ Session::get('error') }}
                </div>
            @endif
            @yield('content')
        </div>
    </body>
    @section('scripts')
        {{ HTML::script('javascript/jquery-2.1.1.js') }}
        {{ HTML::script('javascript/bootstrap.js') }}
        {{ HTML::script('javascript/siteFunctions.js') }}
    @show
</html>