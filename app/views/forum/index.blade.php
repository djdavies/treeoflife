@extends('master')

    @section('head')
        @parent
        <title>Forum of Life</title>
    @stop

	@section('header')
	    <h2>Forums</h2>
	    @if(Auth::check() && Auth::user()->isSiteAdmin())
            <div>
                <a class="btn btn-default" data-toggle="modal" data-target="#topic_title">
                    Add Topic <i class="glyphicon glyphicon-plus-sign" ></i>
                </a>
            </div>
	    @endif
	@stop

	@section('content')
        <div class="col-md-12">
            @foreach($topics as $topic)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="clearfix">
                                <h3 class="panel-title pull-left">{{ $topic->title }}</h3>
	                            @if(Auth::check() && Auth::user()->isForumAdmin() || Auth::user()->isSiteAdmin())
	                                <a class="btn btn-default btn-xs pull-right create_new_catagory" data-id="{{ $topic->id }}" data-toggle="modal" data-target="#category_title">
                                        <i class="glyphicon glyphicon-plus-sign"></i>
                                    </a>
                                    @if(Auth::user()->isSiteAdmin())
                                        <div class="pull-right">
                                            <a href="#" data-id="{{ $topic->id }}" data-toggle="modal"
                                                data-target="#topic_delete" class="btn btn-danger btn-xs pull-right delete_topic">
                                                &times
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="panel-body no-padding">
                            <div class="list-group ">
                                @foreach($categories as $category)
                                    @if($category->topic_id == $topic->id)
                                        <a class="list-group-item" href="{{ URL::route('getTopicCategories', $category->id) }}">
                                            {{ $category->title }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
	    </div>

	    @if(Auth::check() && Auth::user()->isSiteAdmin())
	        {{--submit new topic--}}
            <div class="modal fade" id="topic_title" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">New Topic</h4>
                        </div>

                        <div class="modal-body">
                            {{ Form::open(['class' => 'submit_topic', 'method' => 'post', 'route' => 'postTopic']) }}
                                <div class="form-group {{ $errors->has('topic_title') ? 'has-error' : '' }}">
                                   {{ Form::label('topic_title', 'Topic Title') }}
                                   {{ Form::text('topic_title', '', ['class'=> 'form-control', "autocomplete" => "off"]) }}
                                   @if($errors->has('topic_title'))
                                       <p>{{ $errors->first('topic_title') }}</p>
                                   @endif
                                </div>
                            {{ Form::close() }}
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success submit_topic">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            {{--submit new category--}}
            <div class="modal fade" id="category_title" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">New Category</h4>
                        </div>

                        <div class="modal-body">
                            {{ Form::open(['class' => 'submit_category', 'method' => 'post', 'route' => 'postCategory']) }}
                                <div class="form-group {{ $errors->has('category_title') ? 'has-error' : '' }}">
                                   {{ Form::label('category_title', 'Category Title') }}
                                   {{ Form::text('category_title', '', ['class'=> 'form-control', "autocomplete" => "off"]) }}
                                   {{ Form::hidden('topic_id', '0', ['class' => 'hidden_topic_input']) }}
                                   @if($errors->has('category_title'))
                                       <p>{{ $errors->first('category_title') }}</p>
                                   @endif
                                </div>
                            {{ Form::close() }}
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success submit_category">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            {{--delete a topic--}}
            <div class="modal fade" id="topic_delete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Delete Topic</h4>
                        </div>

                        <div class="modal-body">
                            <h3>Are you sure you want to delete this topic?</h3>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a href="#" type="button" class="btn btn-danger btn-delete-topic">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
	@stop

	@section('scripts')
	    @parent
	    @if(Session::has('modal'))
            <script type="text/javascript">
                $( "{{ Session::get('modal') }} ").modal('show');
            </script>
	    @endif
	@stop