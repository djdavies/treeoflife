@extends('master')

    @section('head')
        @parent
        <title>Forum of Life</title>
    @stop

	@section('header')
	    <h2>Forums</h2>
	    @if(Auth::check() && Auth::user()->isSiteAdmin())
            <div>
                <a class="btn btn-default" data-toggle="modal" data-target="#topic_form">
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
                            <h3 class="panel-title">{{ $topic->title }}</h3>
                        </div>

                        <div class="panel-body no-padding">
                            <div class="list-group ">
                                @foreach($categories as $category)
                                    @if($category->topic_id == $topic->id)
                                        <a class="list-group-item" href="{{ URL::route('getTopicCategories', $category->id) }}">{{ $category->title }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
	    </div>

	    @if(Auth::check() && Auth::user()->isSiteAdmin())
            <div class="modal fade" id="topic_form" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-header">
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
                                    <div class="form-group {{ $errors->has('topic_name') ? 'has-error' : "" }}">
                                        {{ Form::label('topic_name', 'Topic Name') }}
                                        {{ Form::text('topic_title', '', ['class'=> 'form-control']) }}
                                        @if($errors->has('topic_name'))
                                            {{ $errors->first('topic_name') }}
                                        @endif
                                    </div>
                                {{ Form::close() }}
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-success submit_topic" data-dismiss="modal">Save</button>
                            </div>
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
                $( "{{ Session::get('modal') }}" ).modal('show')
            </script>
	    @endif
	@stop