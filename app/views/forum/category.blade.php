@extends('master')

    @section('head')
        @parent
        <title> Forum | {{{ $category->title }}}</title>
    @stop

	@section('header')
        <h2>{{{ $category->title }}}</h2>
	@stop

    @section('content')
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="clearfix">
                            <h3 class="panel-title pull-left">{{ $category->title }}</h3>
                            @if(Auth::check())
                                <a href="{{ URL::route('newThread', $category->id) }}" class="btn btn-default btn-xs pull-right">
                                    <i class="glyphicon glyphicon-plus-sign"></i>
                                </a>
                                @if(Auth::user()->isSiteAdmin())
                                    <div class="pull-right">
                                        <a href="#" data-id="{{ $category->id }}" data-toggle="modal"
                                            data-target="#category_delete" class="btn btn-default btn-xs delete_category pull-right">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="panel-body no-padding">
                        <div class="list-group ">
                            @foreach($threads as $thread)
                                <a class="list-group-item" href="{{ URL::route('getThread', $thread->id) }}">{{ $thread->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::check() && Auth::user()->isSiteAdmin())
            {{--delete a category--}}
            <div class="modal fade" id="category_delete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Delete Category</h4>
                        </div>

                        <div class="modal-body">
                            <h3>Are you sure you want to delete this category?</h3>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a href="#" type="button" class="btn btn-danger btn-delete-category">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @stop