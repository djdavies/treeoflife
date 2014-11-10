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

            @include('wigits.navbar')

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