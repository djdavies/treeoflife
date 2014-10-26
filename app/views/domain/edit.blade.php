@extends('master')

	@section('header')
		<a href="{{{ ('/species/'. $species->id.'') }}}">&larr; Cancel</a>
		<h2>
			@if($method == 'post')
				Add a New Species
			@elseif ($method == 'delete')
				Delete {{{ $species->name }}}?
			@else
				Edit {{{ $species->name }}}
			@endif
		</h2>
	@stop
	
	@section('content')
		<div class="col-md-10 col-md-offset-1">
			{{ 
				Form::model($species, 
					array('method' => $method, 
					'url'=> 'species/'.$species->id)
				) 
			}}
			
				@unless($method == 'delete')

					<dl class="dl-horizontal">
						<div class="col-md-6 ">
							<div class="form-group input-group">
								<dt>{{ Form::label('Name') }}</dt>
								<dd>{{ 
										Form::text('name',
										$species->name, 
										['class'=>'form-control'])
									 }}
								</dd>
								<span class="input-group-addon"></span>
							</div>

							<div class="form-group input-group">
								<dt>{{ Form::label('Common Names') }}</dt>
								<dd>{{ 
										Form::text('common_name', 
										$species->common_name, 
										['class'=>'form-control'])
									 }}
								</dd>
								<span class="input-group-addon"></span>
							</div>

							<div class="form-group input-group">
								<dt>{{ Form::label('Lived From') }}</dt>
								<dd>{{ 
										Form::text('lived_from', 
										$species->lived_from, 
										['class'=>'form-control'])
									}}
								</dd>
								<span class="input-group-addon">/years</span>
							</div>

							<div class="form-group input-group">
								<dt>{{{ Form::label('Lived To') }}}</dt>
								<dd>{{ 
										Form::text('lived_to', 
										$species->lived_to, 
										['class'=>'form-control'])
									}}
								</dd>
								<span class="input-group-addon">/years</span>
							</div>

							<div class="form-group input-group">
								<dt>{{ Form::label('Lived Where') }}</dt>
								<dd>{{ 
										Form::text('lived_where', 
										$species->lived_where, 
										['class'=>'form-control'])
									}}
								</dd>
								<span class="input-group-addon"></span>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group input-group">
								<dt>{{ Form::label('Max Adult Height') }}</dt>
								<dd>{{ 
										Form::text('adult_height', 
										$species->adult_height, 
										['class'=>'form-control'])
									}}
								</dd>								<span class="input-group-addon">/m</span>
							</div>

							<div class="form-group input-group">
								<dt>{{ Form::label('Max Adult Mass') }}</dt>
								<dd>{{ 
										Form::text('adult_mass', 
										$species->adult_mass, 
										['class'=>'form-control'])
									}}
								</dd>
								<span class="input-group-addon">/kg</span>
							</div>

							<div class="form-group input-group">
								<dt>{{ Form::label('Max Cranial Capacity') }}</dt>
								<dd>{{
										Form::text('cranial_mass', 
										$species->cranial_mass, 
										['class'=>'form-control'])
									}}
								</dd>
								<span class="input-group-addon">/cm&sup3</span>
							</div>

							<div class="form-group input-group">
								<dt>{{ Form::label('Discovered on') }}</dt>
								<dd>{{ 
										Form::text('discovered', 
										$species->discovered, 
										['class'=>'form-control'])
									}}
								</dd>
								<span class="input-group-addon"></span>			
							</div>

							<div class="form-group input-group">
								<dt>{{ Form::label('Genus') }}</dt>
								<dd>{{ 
										Form::select('genus_id', 
										$genus_options, 
										['class'=>'form-control'])
									}}
								</dd>				
							</div>
						</div>
					</dl>
					
					<dl class="dl-vertical">			
						<div class="form-group">
							<dt>{{ Form::label('Species Information') }}</dt>
							<dd>{{ 
									Form::textArea('info',
									$species->info, 
									['class'=>'col-md-12'])
								}}
							</dd>
						</div>
					</dl>
						
					{{ 
						form::submit("Save", 
						array("class"=>"btn btn-default pull-right top-buffer")) 
					}}
				@else
					{{ 
						form::submit("Delete", 
						array("class"=>"btn btn-default pull-right top-buffer")) 
					}}
				@endif
			{{ Form::close() }}
		</div>
	@stop
