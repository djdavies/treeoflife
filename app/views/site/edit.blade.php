@extends('master')

	@section('header')
		<a href="">&larr; Cancel</a>
		<h2>
			@if($method == 'post')
				Add a New {{ $get_class($taxon) }}
			@elseif ($method == 'delete')
				Delete {{{ $taxon->name }}}?
			@else
				Edit {{{ $taxon->name }}}
			@endif
		</h2>
	@stop
	
	@section('content')
            @if($method !== 'delete')
                <div class="row">
                    {{ Form::label($taxon->name) }}
                </div>

                <div class="row">
                    <dl class="dl-vertical">
                        <div class="form-group">
                            <dt>{{ Form::label('Summary') }}</dt>
                            <dd>{{
                                    Form::textArea('summary',
                                    $taxon->summary,
                                    ['class'=>'col-md-12'])
                                }}
                            </dd>
                        </div>

                        <div class="form-group">
                            <dt>{{ Form::label('Full Description') }}</dt>
                            <dd>{{
                                    Form::textArea('description',
                                    $taxon->description,
                                    ['class'=>'col-md-12'])
                                }}
                            </dd>
                        </div>
                    </dl>
                </div>
                <span class="pull-right">
                    <div class="row">
                        {{ Form::label('Submit To Page?') }}
                        {{ Form::checkbox('name', 'value');}}
                    </div>

                    {{
                        form::submit("Save",
                        array("class"=>"btn btn-default top-buffer"))
                    }}
                </span>
            @else
                <span class="pull-right">
                    {{
                        form::submit("Delete",
                        array("class"=>"btn btn-default top-buffer"))
                    }}
                </span>
            @endif
            {{ Form::close() }}
        </div>
    @stop
