
@extends('master')
@section('header')
    <div class="row">
        <h2>
            {{{ $item[0]->name }}}
        </h2>
        <a href="/suggestion">
            <i class="glyphicon glyphicon-edit"></i> Make Suggestion
        </a>
    </div>
@stop

@section('content')
    <div class="row">

        <div class="col-md-8">
            <h3>Summary</h3>
            {{{ $item[0]->summary }}}
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
        <div class="well">
            <h3>Description</h3>
            {{{ $item[0]->description }}}
        </div>
    </div>
@stop
