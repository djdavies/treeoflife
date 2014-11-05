@extends('master')
	@section('header')
	    <h2>Recent Posts</h2>
	@stop

	@section('content')
	    @if($submissions->count())
            @foreach($submissions as $submission)

                <div class="row search-results">
                    <div class="row">
                        <div class="col-md-11">
                            <h1 class="inline-header"> </h1> <h2 class="inline-header"></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>{{ $submission->summary }} - <a href="{{'/edit/'.$submission->common_name }}">edit</a>, <a href="{{ '/delete/'.$submission->common_name }}">delete</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No Submissions have been submitted yet</p>
        @endif
	@stop