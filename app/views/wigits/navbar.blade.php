
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                 data-target="#example-navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ URL::route('home') }}">Project Yggdrasil</a>
            <form action="/search" class="navbar-form navbar-left hidden-xs" role="search">
                <div class="form-group dropdown">
                    <input type="text" class="form-control searchbar" placeholder="Search" name="request" data-toggle="dropdown" autocomplete="off">
                    <ul class="dropdown-menu results hidden" role="menu" aria-labelledby="dLabel"></ul>
                </div>
            </form>
        </div>
        <div class="collapse navbar-collapse " id="example-navbar-collapse">
            <ul class="nav navbar-nav navbar-right right-padding">
                @if(Auth::check())
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Welcome {{{ Auth::user()->username }}} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::route('getLogout') }}">Log Out</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ URl::route('getLogin') }}" type="button" class="btn" id="sign_in">Sign in</a></li>
                    <li><a href="{{ URL::route('userCreate') }}" type="button" class="btn sign_up" id="register">Sign up</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-left">
                <li><a href="{{ URL::route('home') }}">Home</a></li>
                <li><a href="{{ URL::route('search') }}}">Explore</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="{{ URL::route('getForum') }}">Forums</a></li>
            </ul>

        </div>
    </nav>