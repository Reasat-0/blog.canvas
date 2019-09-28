
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css')}}">
    <!-- Scripts -->


</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="row">
                @if(Auth::check())

                    <div class="col-lg-4">
                        <ul class="list-group">



                            <li class="list-group-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('category') }}">Category</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('category.create') }}">Create new category</a>
                            </li>

                            <li class="list-group-item">
                                <a href={{route('post.create')}}>Create new post</a>
                            </li>

                            <li class="list-group-item">
                                <a href={{route('post.view')}}>Posts</a>
                            </li>

                            <li class="list-group-item">
                                <a href={{route('tag.create')}}>Create new tag</a>
                            </li>

                            <li class="list-group-item">
                                <a href={{route('tag.view')}}>Tags</a>
                            </li>

                            <li class="list-group-item">
                                <a href={{route('post.viewTrashed')}}>Trashed Posts</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('user.profile')}}">Edit Profile</a>
                            </li>

                            @if(\Illuminate\Support\Facades\Auth::user()->admin)

                                <li class="list-group-item">
                                    <a href={{route('user.view')}}>Users</a>
                                </li>

                                <li class="list-group-item">
                                    <a href={{route('user.create')}}>New Users</a>
                                </li>

                                <li class="list-group-item">
                                    <a href={{route('settings.view')}}>Setting</a>
                                </li>
                                @endif


                        </ul>

                    </div>




                    @endif
                <div class="col-lg-8">

                        @yield('content')

                </div>
            </div>
        </div>



    </div>



    {{--For Side Nav--}}
{{--

    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>

        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        var ps = new PerfectScrollbar(sideNavScrollbar);








        // SideNav Default Options
        $('.button-collapse').sideNav({
            edge: 'left', // Choose the horizontal origin
            closeOnClick: false, // Closes side-nav on &lt;a&gt; clicks, useful for Angular/Meteor
            breakpoint: 1440, // Breakpoint for button collapse
            MENU_WIDTH: 240, // Width for sidenav
            timeDurationOpen: 300, // Time duration open menu
            timeDurationClose: 200, // Time duration open menu
            timeDurationOverlayOpen: 50, // Time duration open overlay
            timeDurationOverlayClose: 200, // Time duration close overlay
            easingOpen: 'easeOutQuad', // Open animation
            easingClose: 'easeOutCubic', // Close animation
            showOverlay: true, // Display overflay
            showCloseButton: false // Append close button into siednav
        });




        // Show sideNav
        $('.button-collapse').sideNav('show');
        // Hide sideNav
        $('.button-collapse').sideNav('hide');








    </script>

--}}

    {{--For Session Notification--}}


    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        @if(Session::has('success'))

        toastr.success("{{ Session::get('success') }}")

        @endif

        @if(Session::has('info'))

            toastr.info("{{Session::get('info') }}")


        @endif

        @if(Session::has('warning'))

            toastr.warning("{{Session::get('warning')}}")
        @endif

    </script>


</body>
</html>
