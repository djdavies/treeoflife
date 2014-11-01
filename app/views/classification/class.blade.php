@extends('master')
	@section('header')
		<h2> 
			Tree of Life
		</h2>
		@stop

		@section('content')

			<div class="row">
                <div class="col-md-3 level">
                     <span> Root </span>
                </div>
            </div>

            <div class="row padding-top">
                <div class="col-md-12">
                    @foreach($classification as $content)
                        <div id="wrapper">
                            <div class="root">
                                <span class="label" data-classification="root" data-id="$content->id">{{ $content->name }}
                                    <i class="glyphicon glyphicon-chevron-right pull-right expand-tree"></i>
                                </span>
                                {{ $taxa->showChildren($content->id ); }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
		@stop
	