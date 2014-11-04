
 @extends('master')
 	@section('header')
        <div class="row">
            <h2>
                {{{ $item[0]->name }}}
            </h2>
             <a href="{{{url('edit/'.$item[0]->name)}}}">
                <i class="glyphicon glyphicon-edit">Edit</i>
             </a>
 		</div>
 	@stop

 	@section('content')
        <div class="row">

            <div class="col-md-8">
                {{{$item[0]->summary}}}
            </div>
            <div class="col-md-4">
                <table>
                    <tr>
                        <th>Contents</th>
                    </tr>
                </table>
            </div>
            </div>

 		<!-- Item description -->
 		<div class="row">
 			<div class="col-md-12">
 				<div class="well">
 					{{{ $item[0]->description }}}
 				</div>
 			</div>
 		</div>
 	@stop