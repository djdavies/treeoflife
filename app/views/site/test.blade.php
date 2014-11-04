@extends('master')

 	@section('header')
 		<h2>
 			test
 		</h2>
 	@stop

     @section('content')
        <pre class=""> {{ var_dump($test) }}</pre>
     @stop