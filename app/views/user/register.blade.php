@extends('master')
    @section('head')
        @parent
        <title>Register User</title>
    @stop

    @section('header')
        <h2>Register</h2>
    @stop

    @section('content')
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
            {{ Form::open(['role' => 'form', 'method' => 'post', 'action' => 'userCreate' ]) }}

                <div class="form-group">
                    {{ Form::label('username', 'Username: ') }}
                    {{ Form::text('username', '', ['type' => 'text', 'class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Password: ') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('confirm_password', 'Confirm Password: ') }}
                    {{ Form::password('confirm_password', ['class' => 'form-control']) }}
                </div>
                {{ Form::submit('Submit',["class" => "btn btn-success navbar-btn pull-right"]) }}
            {{ Form::close() }}
            </div>
        </div>
    @stop

