@extends('master')
	@section('header')
	<!-- Page to display the content of the selected {{{ get_class($classification) }}} -->
	<h2> 
		All {{ $classification->child() }} that fall under the {{{ $classification->name.' '.get_class($classification) }}}
	</h2>
	@stop

	@section('content')
		<div class="row">
			<div class="col-md-12">
				<h3>Summary</h3>
				<div class="well">
					<p>{{ $classification->summary }} - <a href="{{ $classification->childurl($classification->id) }}">show details</a></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>Tree View</h3>
			</div>
			<div class="col-md-12 col-md-offset-1">
				<div class="tree">
					<ul>
						<li>
							<a href="{{ $classification->parenturl() }}">
								{{ $classification->name }}
							</a>
							<ul>
								@foreach($classification->children() as $child)
									<li>
									<a href='{{$child->childrenurl($child->id)}}'>
										{{ $child->name }}
									</a>
									</li>
								@endforeach
							</ul>	
						</li>
					</ul>
				</div>
		</div>
	@stop