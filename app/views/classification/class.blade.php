@extends('master')
	@section('header')
		<h2> 
			Tree of Life
		</h2>
		@stop




		@section('content')
			<div class="row">
                <div class="col-md-2 level">
                     <span> Root </span>
                </div>
            </div>

            <div class="row padding-top">
                <div class="col-md-12">
                    @foreach($classification as $content)
                        <div id="wrapper">
                            <div class="root">
                                <span class="label">{{ $content->name }} <span class="pull-right expand-tree">&rArr;</span></span></p>
                                {{ $linksTable->getTree($content->id ); }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
		@stop
	