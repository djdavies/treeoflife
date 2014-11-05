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
        {{ Form::model($taxa, ['method' => $method, 'url'=> 'd/'.$taxon[0]->name]) }}
            @if($method !== 'delete')
                <div class="row edit-page">
                    <div class="col-md-6">
                        <p>Common Name</p>
                        {{ Form::text('common_name', $taxon[0]->common_name, ['class' => 'col-md-12'])  }}
                    </div>
                    <div class="col-md-6">
                        <p>Scientific Name</p>
                        {{ Form::text('scientific_name', $taxon[0]->scientific_name, ['class' => 'col-md-12'])  }}
                    </div>
                </div>

                <div class="row edit-page">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p class="padding-top">Summary</p>
                            {{ Form::textArea('summary', $taxon[0]->summary, ['class' => 'col-md-12']) }}
                        </div>
                    </div>
                </div>

                <div class="row edit-page">
                    <div class="col-md-12">
                        <p class="padding-top">Full Description</p>
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
