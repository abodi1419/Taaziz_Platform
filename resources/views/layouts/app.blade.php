<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .bg-navbar-kau{
            background: linear-gradient(180deg, rgb(45, 116, 36) 0%, rgb(136, 243, 122) 100%);
            /*height: 150px;*/
        }
        /*body{*/
        /*    background: linear-gradient(180deg, rgb(136, 243, 122) 0%, rgb(255, 255, 255) 29%);*/
        /*}*/
        body{
            padding-top: 80px;
        }
    </style>
    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Styles -->
{{--    <link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}
    <link rel="icon" type="image/x-icon" href="{{url('kau.png')}}" />
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" />
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/quill.snow.css')}}" />
    @if(\Illuminate\Support\Facades\App::getLocale()!='ar')
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/bootstrap.rtl.min.css') }}" rel="stylesheet">

    @endif


    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
{{--    <script src="{{ mix('js/app.js') }}"></script>--}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>



</head>
<body @if(\Illuminate\Support\Facades\App::getLocale()=='ar') dir="rtl" @endif>
    <div id="app">
{{--        Navbar start        --}}
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top p-3">
            <div class="container-fluid">


                <a class="navbar-brand text-success" href="{{url('/')}}">

                    <h2 class="d-inline"><img src="{{url('logo1.png')}}" alt=""></h2>
                </a>
                <a class="navbar-brand" href="#">
                    <img src="https://www.kau.edu.sa/img/logo_kau.png" alt="" height="30" />
                </a>

                <ul class="navbar-nav flex-grow-1 flex-md-grow-0 px-2">
                    @if(\Illuminate\Support\Facades\App::getLocale()=='en')
                        <li class="nav-item text-end">
                            <a class="nav-link" href="{{ url('locale/ar') }}">عربي</a>
                        </li>
                    @else
                        <li class="nav-item text-end">
                            <a class="nav-link" href="{{ url('locale/en') }}">{{ __('EN') }}</a>
                        </li>
                    @endif
                </ul>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a class="navbar-brand" href="{{url('/')}}">{{ __(config('app.name', 'Laravel')) }}</a></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">

                        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                            @auth()
                                <div class="btn-group w-100 h6 p-0 m-0 d-md-none">
                                    <a class="nav-link w-100 dropdown-toggle h3" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}

                                        <img src="{{asset(Auth::user()->image)}}" class="rounded-circle" alt="User image" height="20" width="20">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('student.index') }}">
                                                {{ Auth::user()->name }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}">

                                                {{ __('Logout') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home')}}" role="button">
                                        {{ __('Home') }}
                                    </a>
                                </li>
                                @if(auth()->user()->hasRole('student'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('profile.index')}}" role="button">
                                            {{ __("Profile") }}
                                        </a>
                                    </li>
                                @endif
                                @can("User list")
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ __("Users") }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="roleDropdown">
                                            <a class="dropdown-item" href="{{route('users.index')}}">{{__("View users")}}</a>
                                            <a class="dropdown-item" href="{{route('users.create')}}">{{__("Create user")}}</a>
                                        </div>
                                    </li>
                                @endcan
                                @can("Role list")
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ __("Roles") }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="roleDropdown">
                                            <a class="dropdown-item" href="{{route('roles.index')}}">{{__("View roles")}}</a>
                                            <a class="dropdown-item" href="{{route('roles.create')}}">{{__("Create role")}}</a>
                                        </div>
                                    </li>
                                @endcan
                                @if(auth()->user()->hasRole('admin') ||auth()->user()->hasRole('student') )
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __("Community") }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="roleDropdown">
                                        <a class="dropdown-item" href="{{route('articles.index')}}">{{__("Public Page")}}</a>
                                        <a class="dropdown-item" href="{{route('myArticles')}}">{{__("My Page")}}</a>
                                    </div>
                                </li>
                                @endif
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __("Jobs") }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="roleDropdown">
                                        @can('Job create')
                                            <a class="dropdown-item" href="{{route('jobs.create')}}">{{__("New job")}}</a>
                                        @endcan

                                            <a class="dropdown-item" href="{{route('jobs.index')}}">{{__("Show jobs")}}</a>

{{--                                        @if(auth()->user()->hasRole('student'))--}}
{{--                                            <a class="dropdown-item" href="{{route('myApplications')}}">{{__("my Applications")}}</a>--}}
{{--                                        @endif--}}
                                    </div>
                                </li>

                                {{--   It appears only to admin --}}
                                @if(auth()->user()->hasRole('admin'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('home')}}" role="button">
                                            {{ __('Statistics panel') }}
                                        </a>
                                    </li>
                                @endif

                            @endauth


                        </ul>
                        <ul class="navbar-nav justify-content-end pe-3">
                            @auth()

                                <li class="nav-item d-none d-md-inline">

                                    <div class="btn-group w-100 h6 p-0 m-0">
                                        <a class="nav-link w-100 dropdown-toggle h3" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ Auth::user()->name }}

                                            <img src="{{asset(Auth::user()->image)}}" class="rounded-circle" alt="User image" height="20" width="20">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('student.index') }}">
                                                    {{ Auth::user()->name }}
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>


                                </li>
                            @else
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register as a student') }}</a>
                                    </li>
                                @endif
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register_employer') }}">{{ __('Register as employers') }}</a>
                                        </li>
                                    @endif

                            @endauth
                        </ul>
                    </div>
                </div>

            </div>

        </nav>
{{--        Navbar end      --}}
        <main class="py-4 pt-5">
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
