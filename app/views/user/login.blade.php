@extends('...master')
	@section('header')
		<h2>Please Log in</h2>
	@stop

	@section('content')
		<div class="col-md-08">
			{{Form::open()}}
				<div class="form-group">
					{{form::label('Username')}}
					{{form::text('username')}}
				</div>
				<div class="form-group">
					{{form::label('Password')}}
					{{form::text('password')}}
				</div>
				{{Form::submit()}}
			{{Form::close()}}
		</div>
	@stop