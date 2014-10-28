@extends('master')

	@section('header')
		<a href="">&larr; Cancel</a>
		<h2>
			@if($method == 'post')
				Add a New {{ get_class($classification) }}
			@elseif ($method == 'delete')
				Delete {{{ $classification->name }}}?
			@else
				Edit {{{ $classification->name }}}
			@endif
		</h2>
	@stop
	
	@section('content')
		<div class="col-md-10 col-md-offset-1">
			{{ 
				Form::model($classification,
					['method' => $method,
					'url'=> '$classification/'.$classification->id,
					'class' => 'form-horizontal'
					]
				) 
			}}
			
            @if($method !== 'delete')
                <div class="row">
                    @foreach($classification->info() as $formField)
                        <div class="form-group col-md-5">
                            {{ Form::label($formField, '', ['class' => 'control-label col-mid-2']) }}
                            <div class="col-mid-12">
                                {{
                                    Form::text('$columnName',
                                    $classification->$formField,
                                    ['class' => 'form-control'])
                                }}
                            </div>

                        </div>
                        <div class="col-md-1"></div>
                    @endforeach
                </div>

                <div class="row">
                    {{ Form::label($classification->getParentName()) }}

                    <select name="classication_id">
                        {{ var_dump($classification->parent())  }}
                        @foreach($classification->getPossibleParents()->all() as $thing)
                            <option value="{{ $thing->id }}">{{ $thing->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <dl class="dl-vertical">
                        <div class="form-group">
                            <dt>{{ Form::label('Summary') }}</dt>
                            <dd>{{
                                    Form::textArea('summary',
                                    $classification->summary,
                                    ['class'=>'col-md-12'])
                                }}
                            </dd>
                        </div>

                        <div class="form-group">
                            <dt>{{ Form::label('Full Description') }}</dt>
                            <dd>{{
                                    Form::textArea('description',
                                    $classification->description,
                                    ['class'=>'col-md-12'])
                                }}
                            </dd>
                        </div>
                    </dl>
                </div>
                <span class="pull-right">
                    <div class="row">
                        {{ Form::label('Complete?') }}
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
