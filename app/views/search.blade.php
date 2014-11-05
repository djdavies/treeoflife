@extends('master')
	@section('header')
	    <div class="row">
            {{ Form::open(['url' => 'search']) }}
                <div class="col-md-4">
                    {{ Form::text('request', $request, ['placeholder'=> 'search by keyword', 'class' => 'form-control', 'method' => 'PUT', 'action' => 'search']) }}
                </div>
                    <div class="col-md-2">
                    {{ Form::submit('search', ['class'=> 'btn btn-info']) }}
                </div>
            {{ Form::close() }}
		</div>
	@stop

	@section('content')
	    <div class="row">
            <h4>Search Results</h4>
            <h5>{{ count($result) }} results in {{ $time."'s" }}</h5>
        </div>

        <div class="col-md-12">
            @foreach($result as $content)
                <div class="row search-results">
                    <div class="row">
                        <div class="col-md-11">
                            <h1 class="inline-header">{{ $content->name }}</h1> <h2 class="inline-header">{{ '('.$content->scientific_name.')' }}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>{{ $content->summary }} - <a href="/d/{{ $content->name }}">show details</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
	@stop