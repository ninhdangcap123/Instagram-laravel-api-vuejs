<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/home') }}">
                <div><img src="/svg/logo.svg" alt="logo" style="height: 25px; border-right: 2px ;  border-left: 2px;" class="pr-3 pl-3">

                {{ config('app.name', "Ninh's Instagram") }}
                </div>

            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->

                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    @if (Auth::user()->isAdmin())
                        <li><a href="{{ action("UsersController@admin") }}">Admin</a></li>
                    @endif

                    <li><a href="/admin">Admin</a></li>

                    <li><a href="/posts/new">New post</a></li>

                    <li><a href="/home">Discover</a></li>

                    <li><a href="/posts">Feed</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}"
                                 style="width: 25px; height: 25px; top: 10px; left: 10px; border-radius: 50%;">
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ action("UsersController@show", Auth::user()->id) }}">My Profile</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault()
                                                     document.getElementById('logout-form').submit()">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>