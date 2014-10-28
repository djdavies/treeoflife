@extends('master')
	@section('header')
		<a href="javascript:history.go(-1)">Back to {{ get_class($self) }} overview</a>
		<h2>
			{{ $item->name }}
		</h2>
	@stop

	@section('content')
		<div class="row">
			<div class="col-md-6">
				<table class="table table-striped">
				@foreach($item->info() as $info)
					<tr>
						<td>{{ str_replace('_', ' ', $info). ':' }}</td>
						<td>{{ $item->{$info} }}</td>
					</tr>
				@endforeach
				</table>
			</div>
			<div class="col-md-6">
				<div class="tree">
					<ul>
						<li>
							<a href="#">{{get_class($self).': '}}</a>
							<ul>
								<li>
									<a href="#">{{$item->name}}</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		<!-- Item description -->
		<div class="row">
			<div class="col-md-12">
				<h2>Description</h2>
				<div class="well">
					{{{ $item->description }}}
				</div>
			</div>
		</div>
	@stop