<!DOCTYPE html>
<hmtl lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Project Yggdrasil</title>
		<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
		<link rel="stylesheet" href="{{asset('css/custom_bootstrap.css')}}"/>
		{{ HTML::script('javascript/jquery-2.1.1.js') }}
		{{ HTML::script('javascript/siteFunctions.js') }}

		<script type="text/javascript">
			$
		</script>
	</head>
	<body>
		<div class="container height-buffer">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		      <div class="container-float">
		        <div class="navbar-header">
		          <a class="navbar-brand" href="{{'/'}}">Project Yggdrasil</a>
		        </div>

		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		            <form class="navbar-form navbar-left" role="search">
		            <div class="form-group">
		                <input type="text" class="form-control" placeholder="Search">
		            </div>
		          </form>
		          
						<ul class="nav navbar-nav navbar-left">
							<li><a href="#">Explore</a></li>
							<li><a href="#">Features</a></li>
							<li><a href="#">Enterprise</a></li>
							<li><a href="#">Blogs</a></li>
						</ul>

						<span class="nav pull-right right-buffer">
							@if(Auth::check())
								Logged in as   
	 							<strong>{{{Auth::user()->username}}}</strong>
	 							{{link_to('logout', 'Log Out', ['class' => 'btn navbar-btn'])}}
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

			<nav class="navbar navbar-bottom footer">
				@yield('footer')
			</nav>
		</div>	
	</body>

</hmtl>