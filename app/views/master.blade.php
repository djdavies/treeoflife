<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Project Yggdrasil</title>
		<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
		<link rel="stylesheet" href="{{asset('css/custom_bootstrap.css')}}"/>
		<link rel="stylesheet" href="{{asset('scss/familytree.css')}}"/>
	</head>
	<body>
		<div class="container height-buffer">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		      <div class="container-float">
		        <div class="navbar-header">
		          <a class="navbar-brand" href="{{'/'}}">Project Yggdrasil</a>
		        </div>

		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		            <form action="/search" class="navbar-form navbar-left" role="search">
		            <div class="form-group dropdown">
		                <input type="text" class="form-control searchbar" placeholder="Search" name="request" data-toggle="dropdown">
		                <ul class="dropdown-menu results hidden" role="menu" aria-labelledby="dLabel"></ul>
		            </div>
		          </form>
		          
						<ul class="nav navbar-nav navbar-left">
							<li><a href="/search">Explore</a></li>
							<li><a href="/posts">Recent Posts</a></li>
							<li><a href="#">Enterprise</a></li>
						</ul>

						<span class="nav pull-right right-buffer">
							@if(Auth::check())
							    <!-- when user is logged in -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default navbar-btn padding-bottom">{{{ Auth::user()->username }}}</button>
                                        <button type="button" class="btn btn-default dropdown-toggle navbar-btn padding-bottom" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>

                                    <ul class="dropdown-menu pull-right " role="menu">
                                        <li><a href="user/posts">Recent Submissions</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li>{{ link_to('logout', 'Log Out') }}</li>
                                    </ul>
                                </div>
	 						@else
								<button type="button" class="btn btn-success navbar-btn" id="sign_in">Sign in</button>
								<button type="button" class="btn btn-default navbar-btn" id="sign_out">Sign up</button>
								{{Form::open(['url' => '/login/', 'class' => 'navbar-form input-hide login'])}}
									<div class="form-group">
										{{form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Username'])}}
									</div>
									<div class="form-group">
										{{form::text('password', '', ['class' => 'form-control', 'placeholder' => 'password'])}}
									</div>
									{{Form::submit('Submit',["class" => "btn btn-success navbar-btn"])}}
								{{Form::close()}}
							@endif
						</span>
					</div>
				</div>
			</nav>

			<div class="page-header">
				@yield('header')
			</div>

			@if(Session::has('message'))
				<div class="alert alert-success">
					{{Session::get('message')}}
				</div>
			@endif

			@if(Session::has('error'))
				<div class="alert alert-warning">
					{{Session::get('error')}}
				</div>
 			@endif
			 @yield('content')
		</div>

	</body>
	{{ HTML::script('javascript/jquery-2.1.1.js') }}
	{{ HTML::script('javascript/bootstrap.js') }}
	{{ HTML::script('javascript/siteFunctions.js') }}
</html>