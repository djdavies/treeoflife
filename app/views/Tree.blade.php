@extends('master')
    @section('head')
        @parent
        <title>Project Yggdrasil - Tree View</title>
    @stop

    @section('header')
    <h2>
        Tree of Life
    </h2>
    @stop

    @section('content')
        <div class="row padding-top">
            <div class="col-md-12">
                @foreach($classification as $content)
                    <div id="wrapper">
                        <div class="root">
                            <span class="label"> <a href="d/{{ $content->name }}">{{ $content->name }}</a>
                                 <i class="glyphicon glyphicon-chevron-right pull-right expand-tree"
                                    data-classification="{{ $content->taxa_name }}"
                                         data-id="{{ $content->id }}"></i>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @stop
