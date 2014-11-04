@extends('master')

	@section('header')
		<a href="{{ '/d/'.$taxon[0]->name }}">&larr; Cancel</a>
		<h2>
			@if($method == 'post')
				Add a New
			@elseif ($method == 'delete')
				Delete {{{ $taxon[0]->name }}}?
			@else
				Edit {{{ $taxon[0]->name }}}
			@endif
		</h2>
	@stop
	
    @section('content')
        {{ Form::model($taxa, ['method' => $method, 'url'=>
         'd/'.$taxon[0]->name]) }}
            @if($method !== 'delete')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-8">
                                <h3 class="">Summary</h3>
                                {{ Form::textArea('summary', $taxon[0]->summary, ['class' => 'col-md-12']) }}
                            </div>

                            <div class="col-md-4">
                                <h3 class="">Contents</h3>
                                {{ Form::textArea('contents', $taxon[0]->contents, ['class' => 'col-md-12']) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="padding-top">Full Description</h3>
                        {{ Form::textArea('description', $taxon[0]->description, ['class' => 'col-md-12']) }}
                    </div>
                </div>

                <span class="pull-right">
                    {{ Form::label('Submit To Page?') }}
                    {{ Form::checkbox('name', 'value');}}
                    {{ Form::submit("Save", ["class"=>"btn btn-default top-buffer "]) }}
                </span>

            @else
                <span class="pull-right">
                    {{ form::submit("Delete", ["class"=>"btn btn-default top-buffer"]) }}
                </span>
            @endif
        {{ Form::close() }}
    @stop
