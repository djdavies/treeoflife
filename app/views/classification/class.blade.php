@extends('master')
	@section('header')
		<h2> 
			Tree of Life
		</h2>
		@stop




		@section('content')
			<div class="row">
                <div class="col-md-12">
                    @foreach($classification as $content)
                        <div id="wrapper">
                            <span class="label">{{ $content->name }} </span>
                                {{ $linksTable->getTree($content->id ); }}
                            </div>
                        </div>
                    @endforeach


              {{--<div class="branch lv1">--}}
                {{--<div class="entry"><span class="label">Entry-1</span>--}}
                  {{--<div class="branch lv2">--}}
                    {{--<div class="entry"><span class="label">Entry-1-1</span>--}}
                      {{--<div class="branch lv3">--}}
                        {{--<div class="entry sole"><span class="label">Entry-1-1-1</span></div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="entry"><span class="label">Entry-1-2</span>--}}
                      {{--<div class="branch lv3">--}}
                        {{--<div class="entry sole"><span class="label">Entry-1-2-1</span></div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="entry"><span class="label">Entry-1-3</span>--}}
                      {{--<div class="branch lv3">--}}
                        {{--<div class="entry sole"><span class="label">Entry-1-3-1</span></div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}
                {{--<div class="entry"><span class="label">Entry-2</span></div>--}}
                {{--<div class="entry"><span class="label">Entry-3</span>--}}
                  {{--<div class="branch lv2">--}}
                    {{--<div class="entry"><span class="label">Entry-3-1</span></div>--}}
                    {{--<div class="entry"><span class="label">Entry-3-2</span></div>--}}
                    {{--<div class="entry"><span class="label">Entry-3-3</span>--}}
                      {{--<div class="branch lv3">--}}
                        {{--<div class="entry"><span class="label">Entry-3-3-1</span></div>--}}
                        {{--<div class="entry"><span class="label">Entry-3-3-2</span>--}}
                          {{--<div class="branch lv4">--}}
                            {{--<div class="entry"><span class="label">Entry-3-3-2-1</span></div>--}}
                            {{--<div class="entry"><span class="label">Entry-3-3-2-2</span>--}}
                                {{--<div class="branch lv5">--}}
                                    {{--<div class="entry sole"><span class="label">3-3-2-1-1</span></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                          {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="entry"><span class="label">Entry-3-3-3</span></div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="entry"><span class="label">Entry-3-4</span></div>--}}
                  {{--</div>--}}
                {{--</div>--}}
                {{--<div class="entry"><span class="label">Entry-4</span></div>--}}
                {{--<div class="entry"><span class="label">Entry-5</span></div>--}}
              {{--</div>--}}
            {{--</div>--}}
		@stop
	