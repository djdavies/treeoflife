@extends('master')
	@section('header')
		<!--Page to display all {{{ get_class($classes) }}} -->
		<div class="row">
			<span class="pull-right"><a href="{{ $classes->showChildren() }}">{{ $classes->getChildName() }} &rarr; </a></span>
		</div>
		<h2> 
			All {{{ get_class($classes) }}}
			<a href="{{ $classes->selfUrl().'/create'}}" class="btn btn-primary pull-right">
				Add a {{{ get_class($classes) }}}
			</a>
		</h2>
		@stop

		@section('content')
			<div class="row">
				<div class="col-md-12">
					<h3>Tree View</h3>
				</div>
				<div class="col-md-12 col-md-offset-1">
					<div class="tree">
						<ul>
							<li>
								<a>{{ get_class($classes) }}</a>
								<ul>
									@foreach($classification as $content)
										<li>
											<a href='{{$content->childrenurl($content->id)}}'>
												{{{ $content->name }}} 
											</a>
										</li>
									@endforeach
								</ul>	
							</li>
						</ul>
					</div>
				</div>
			</div>
		@stop
	