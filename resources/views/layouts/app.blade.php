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
{{--                                @if(auth()->user()->hasRole('admin'))--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{route('home')}}" role="button">--}}
{{--                                            {{ __('Statistics panel') }}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endif--}}

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

    @auth()
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4" style="background-color: #128c7e">
                <!-- Left -->
                <div class="me-5">
                    <span>{{__("Get connected with us on social networks:")}}</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="https://twitter.com/kau_law_fac" target="_blank" class="text-white me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                        </svg>
                    </a>
                    <a href="#" target="_blank" class="text-white me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                        </svg>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">{{__("Ta'aziz Platform")}}</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #128c7e; height: 2px" />
                            <p>
                                {{__("A platform that represents the link between the Faculty of Law represented by the Alumni Unit, postgraduate students and employers.")}}

                            </p>
                            <button type="button" class="btn btn-outline-light"><a href="{{route('team')}}" style=" text-decoration: none; color: #128c7e ">{{__("Developers Team")}}</a></button>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">{{__("Faculty of Law")}}</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #128c7e; height: 2px" />
                            <p>
                                <a href="https://law.kau.edu.sa/Default-152-ar" target="_blank" class="text-white">{{__("website")}}</a>
                            </p>

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">{{__("Useful links")}}</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #128c7e; height: 2px" />
                            <p>
                                <a href="https://forms.gle/bcX1rhCUehLYymGh7" target="_blank" class="text-white">{{__("Help us improve the platform")}}</a>
                            </p>
                            <p>
                                <a href="" class="text-white" target="_blank">{{__("Questions")}}</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">{{__("Contact")}}</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #128c7e; height: 2px" />
                            <p> Jeddah, king abdulaziz university</p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                                info@taaziz.com</p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                                + 012 234 567</p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                                + 966 565234789</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2022 Copyright:
                <a class="text-white" href="">Taaziz.kau.edu.sa</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    @endauth
</body>
</html>
