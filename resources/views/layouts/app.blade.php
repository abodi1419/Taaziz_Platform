<!doctype html>
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
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    @if(\Illuminate\Support\Facades\App::getLocale()!='ar')
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/bootstrap(rtl).css') }}" rel="stylesheet">

    @endif


<!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    @if(\Illuminate\Support\Facades\App::getLocale()!='ar')
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    @else
        <script src="{{ asset('js/bootstrap.bundle(rtl).js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle(rtl).js') }}"></script>
    @endif


</head>
<body @if(\Illuminate\Support\Facades\App::getLocale()=='ar') dir="rtl" @endif>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __(config('app.name', 'Laravel')) }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav me-auto">
                        @can("Role list")
                            <li class="nav-item dropdown">
                                <a id="roleDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __("Roles") }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="roleDropdown">
                                    <a class="dropdown-item" href="{{route('roles.index')}}">{{__("View roles")}}</a>
                                    <a class="dropdown-item" href="{{route('roles.create')}}">{{__("Create role")}}</a>
                                </div>
                            </li>
                        @endcan
                        @can("User list")
                            <li class="nav-item dropdown">
                                <a id="roleDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __("Users") }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="roleDropdown">
                                    <a class="dropdown-item" href="{{route('users.index')}}">{{__("View users")}}</a>
                                    <a class="dropdown-item" href="{{route('users.create')}}">{{__("Create user")}}</a>
                                </div>
                            </li>
                        @endcan
                        @if(auth()->user()->hasRole('student'))
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('profile.index')}}" role="button">
                                    {{ __("Profile") }}
                                </a>


                            </li>
                        @endif

                    </ul>
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('student.index') }}">
                                        {{ Auth::user()->name }}
                                    </a>


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest
                        @if(\Illuminate\Support\Facades\App::getLocale()=='en')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('locale/ar') }}">عربي</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('locale/en') }}">{{ __('English') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li >{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif(\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
