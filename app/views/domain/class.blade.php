@extends('master')
	@section('header')
		<!--Page to display all {{{ get_class($classes) }}} -->
		<h2> 
			All {{{ get_class($classes) }}}
			<a href="#" class="btn btn-primary pull-right">
				Add a {{{ get_class($classes) }}}
			</a>
		</h2>
		@stop

		@section('content')
			<div class="tree">
				<ul>
					<li>
						<a href="#">{{ get_class($classes) }}</a>
						<ul>
							@foreach($classification as $content)
								<li>
									<a href="{{ $classes->childurl() }}">
										{{{ $content->name }}} 
									</a>
								</li>
							@endforeach
						</ul>	
					</li>
				</ul>
			</div>
		@stop
	