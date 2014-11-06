@extends('...master')
	@section('header')
		<h2>Please Log in</h2>
	@stop

	@section('content')
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                {{ Form::open(['role' => 'form', 'method' => 'post', 'route' => 'getLogin' ]) }}
                    <div class="form-group">
                        {{ Form::label('Username') }}
                        {{ form::text('username', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Password') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div>
                    <span class="pull-right">
                        <div class="form-group">
                            {{ Form::label('Remember Me', '') }}
                            {{ Form::checkbox('remember', 'Remember Me', ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Log in',["class" => "btn btn-success pull-right"]) }}
                    </span>


                {{ Form::close() }}
            </div>
		</div>
	@stop