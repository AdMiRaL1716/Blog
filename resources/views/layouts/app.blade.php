<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:300,600,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="loading">
            <div class="text-center middle">
                <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <!-- Logo -->
                <a class="logo" href="">
                    MyBlog
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"><i class="fas fa-bars"></i></span>
                </button>

                <!-- navbar links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                        @else
                            @if(Auth::user()->id_role == 1)
                            <li class="nav-item dropdown">
                                <span class="nav-link"> Categories <i class="fas fa-angle-down"></i></span>
                                <ul class="dropdown-menu last">
                                    <li class="dropdown-item">
                                        <a href="{{ route('categories') }}">All</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ route('add-category') }}">Add</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                                <li class="nav-item dropdown">
                                    <span class="nav-link"> Posts <i class="fas fa-angle-down"></i></span>
                                    <ul class="dropdown-menu last">
                                        <li class="dropdown-item">
                                            <a href="{{ route('myposts') }}">My Posts</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="{{ route('add-post') }}">New Post</a>
                                        </li>
                                    </ul>
                                </li>
                            <li class="nav-item dropdown">
                                <span class="nav-link"><img src="{{asset(Auth::user()->image)}}" class="author-menu">{{ Auth::user()->name }} <i class="fas fa-angle-down"></i></span>
                                <ul class="dropdown-menu last">
                                    <li class="dropdown-item">
                                        <a href="{{route('edit-image')}}">Edit Image</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/assets/jquery-3.0.0.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/jquery-migrate-3.0.0.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/scrollIt.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/jquery.hover3d.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/jquery.waypoints.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/jquery.counterup.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/sticky-kit.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/jquery.magnific-popup.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/jquery.stellar.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('js/assets/YouTubePopUp.jquery.js') }}" defer></script>
    <script src="{{ asset('js/assets/validator.js') }}" defer></script>
    <script src="{{ asset('js/assets/scripts.js') }}" defer></script>
</body>
</html>
