@extends('master')
	@section('header')
	<!-- Page to display the content of the selected {{{ get_class($classification) }}} -->
	<a href="{{ $classification->url() }}">Back to {{ get_class($classification) }}</a>
	<h2> 
		All {{ $classification->child() }} that fall under the {{{ $classification->name.' '.get_class($classification) }}}
	</h2>
	@stop

	@section('content')
		<div class="tree">
			<ul>
				<li>
					<a href="#">{{ get_class($classification) }}</a>
					<ul>
						@foreach($classification->children() as $child)
							<li>
								<a href="#">{{ $child->name }}</a>
							</li>
						@endforeach
					</ul>	
				</li>
			</ul>
		</div>
	@stop