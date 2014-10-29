@extends('master')
	@section('header')
		<!--Page to display all {{{ get_class($classes) }}} -->
		<div class="row">
			<span class="pull-right"><a href="{{ $classes->showChildren() }}">{{ $classes->getChildName() }} &rarr; </a></span>
		</div>
		<h2> 
			All {{{ get_class($classes) }}}
			<a href="{{ $classes->selfUrl().'/create'}}" class="btn btn-primary pull-right">
				Add a {{{ get_class($classes) }}}
			</a>
		</h2>
		@stop

		@section('content')
			<div class="row">
				<div class="col-md-12">
					<h3>Tree View</h3>
				</div>
				<div class="col-md-12 col-md-offset-1">
					<div class="tree">
						<ul>
							<li>
								<a>{{ get_class($classes) }}</a>
								<ul>
									@foreach($classification as $content)
										<li>
											<a href='{{$content->childrenurl($content->id)}}'>
												{{{ $content->name }}} 
											</a>
										</li>
									@endforeach
								</ul>	
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div id="wrapper"><span class="label">LUCA</span>
              <div class="branch lv1">
                <div class="entry"><span class="label">Entry-1</span>
                  <div class="branch lv2">
                    <div class="entry"><span class="label">Entry-1-1</span>
                      <div class="branch lv3">
                        <div class="entry sole"><span class="label">Entry-1-1-1</span></div>
                      </div>
                    </div>
                    <div class="entry"><span class="label">Entry-1-2</span>
                      <div class="branch lv3">
                        <div class="entry sole"><span class="label">Entry-1-2-1</span></div>
                      </div>
                    </div>
                    <div class="entry"><span class="label">Entry-1-3</span>
                      <div class="branch lv3">
                        <div class="entry sole"><span class="label">Entry-1-3-1</span></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="entry"><span class="label">Entry-2</span></div>
                <div class="entry"><span class="label">Entry-3</span>
                  <div class="branch lv2">
                    <div class="entry"><span class="label">Entry-3-1</span></div>
                    <div class="entry"><span class="label">Entry-3-2</span></div>
                    <div class="entry"><span class="label">Entry-3-3</span>
                      <div class="branch lv3">
                        <div class="entry"><span class="label">Entry-3-3-1</span></div>
                        <div class="entry"><span class="label">Entry-3-3-2</span>
                          <div class="branch lv4">
                            <div class="entry"><span class="label">Entry-3-3-2-1</span></div>
                            <div class="entry"><span class="label">Entry-3-3-2-2</span>
                                <div class="branch lv5">
                                    <div class="entry sole"><span class="label">3-3-2-1-1</span></div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="entry"><span class="label">Entry-3-3-3</span></div>
                      </div>
                    </div>
                    <div class="entry"><span class="label">Entry-3-4</span></div>
                  </div>
                </div>
                <div class="entry"><span class="label">Entry-4</span></div>
                <div class="entry"><span class="label">Entry-5</span></div>
              </div>
            </div>
		@stop
	