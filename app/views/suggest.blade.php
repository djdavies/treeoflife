@extends('master')

	@section('header')
		<a href="/">&larr; Cancel</a>
		<h2>
			Make a Suggestion
		</h2>
	@stop
	
    @section('content')
        {{ Form::model(['method' => $method, 'url' => '/suggestion']) }}
            {{ Form::select('type', ['general' => 'General Comment' ], 'general'); }}

            <div class="row edit-page">
                <div class="col-md-12">
                    <p class="padding-top">Comments</p>
                    {{ Form::textArea('comment', '', ['class' => 'col-md-12']) }}
                </div>
            </div>

            <span class="pull-right">
                {{ Form::submit("Save", ["class"=>"btn btn-default top-buffer "]) }}
            </span>
        {{ Form::close() }}
    @stop
