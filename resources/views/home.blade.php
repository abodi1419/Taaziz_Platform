@extends('layouts.app')

@section('content')
    <style>
        .square-info{
            height: 180px;
        }
        .small-square{
            width: 15px;
            height: 15px;
            border-radius: 20px;
            display: inline-block;
            position: absolute; top: 50%; right: 0;
            margin: 5px;
        }
        h1{
            font-weight: bold;

        }
    </style>

<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
{{--            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
{{--            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://pbs.twimg.com/profile_banners/986993325776560128/1603208371/1500x500" alt="First slide">
            </div>
{{--            <div class="carousel-item">--}}
{{--                <img class="d-block w-100" src="..." alt="Second slide">--}}
{{--            </div>--}}
{{--            <div class="carousel-item">--}}
{{--                <img class="d-block w-100" src="..." alt="Third slide">--}}
{{--            </div>--}}
        </div>
        <a class="carousel-control-prev" href="#" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    @if(isset($students_count))
    <div class="text-center">
        <div class="row">
            <div class="col-12 square-info shadow-sm position-relative p-3 mb-1 rounded">

                <h3 class="">
                    <span class="small-square bg-success"></span>
                    {{__("Active sessions")}}
                </h3>
                <div class="text-center text-success">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
{{--                        {{$active_users}}--}}
                    </h1>
                </div>
            </div>
            <div class="col-6 square-info mb-1 position-relative shadow-sm p-3 rounded">
                <h3>
                    <span class="small-square bg-primary"></span>
                    {{__("Registered students")}}
                </h3>
                <div class="text-center  text-primary">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$students_count}}
                    </h1>
                </div>
            </div>
            <div class="col-6 square-info mb-1 position-relative shadow-sm p-3 rounded">
                <h3>
                    <span class="small-square bg-success"></span>
                    {{__("Employed students")}}
                </h3>
                <div class="text-center  text-success">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$employed_students}}
                    </h1>
                </div>
            </div>
            <div class="col-6 square-info mb-1 position-relative shadow-sm p-3 mb-5 rounded">
                <h3>
                    <span class="small-square bg-success"></span>
                    {{__("Students with profiles")}}</h3>
                <div class="text-center  text-success">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$profiles_count}}
                    </h1>
                </div>
            </div>
            <div class="col-6 square-info mb-1 position-relative shadow-sm p-3 mb-5 rounded">
                <h3>
                    <span class="small-square bg-danger"></span>
                    {{__("Students without profiles")}}</h3>
                <div class="text-center  text-danger">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$students_count-$profiles_count}}
                    </h1>
                </div>
            </div>
            <div class="col-4 square-info shadow-sm position-relative p-3 mb-1 rounded">
                <h3>{{__("Registered employers")}}</h3>
                <div class="text-center ">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$employers_count}}
                    </h1>
                </div>
            </div>
            <div class="col-4 square-info mb-1 position-relative shadow-sm p-3 rounded">
                <h3>{{__("Published jobs")}}</h3>
                <div class="text-center ">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$jobs_count}}
                    </h1>
                </div>
            </div>
            <div class="col-4 square-info mb-1 position-relative shadow-sm p-3 rounded">
                <h3>{{__("Job applications")}}</h3>
                <div class="text-center ">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$apps_count}}
                    </h1>
                </div>
            </div>
            <div class="col-12 text-center">
                <h3>
                    {{__("Applications")}}
                </h3>
            </div>
            <div class="col-3 square-info mb-1 position-relative shadow-sm p-3 rounded">
                <h3>{{__("Accepted")}}</h3>
                <div class="text-center ">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$accepted_apps_count}}
                    </h1>
                </div>
            </div>
            <div class="col-3 square-info mb-1 position-relative shadow-sm p-3 rounded">
                <h3>{{__("Candidate")}}</h3>
                <div class="text-center ">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$candidate_apps_count}}
                    </h1>
                </div>
            </div>
            <div class="col-3 square-info mb-1 position-relative shadow-sm p-3 rounded" >
                <h3>{{__("Just applied")}}</h3>
                <div class="text-center ">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$applied_apps_count}}
                    </h1>
                </div>
            </div>
            <div class="col-3 square-info mb-1 position-relative shadow-sm p-3 mb-5 rounded">
                <h3>{{__("Rejected")}}</h3>
                <div class="text-center ">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$rejected_apps_count}}
                    </h1>
                </div>
            </div>
            <div class="col-4 square-info mb-1 position-relative shadow-sm p-3 mb-5 rounded">
                <h3>{{__("Community articles")}}</h3>
                <div class="text-center ">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$articles_count}}
                    </h1>
                </div>
            </div>
            <div class="col-4 square-info mb-1 position-relative shadow-sm p-3 mb-5 rounded">
                <h3>{{__("Community comments")}}</h3>
                <div class="text-center ">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$comments_count}}
                    </h1>
                </div>
            </div>
            <div class="col-4 square-info mb-1 position-relative shadow-sm p-3 mb-5 rounded">
                <h3>{{__("Community likes")}}</h3>
                <div class="text-center ">
                    <h1 style="position: absolute; top: 50%; left: 0; right: 0;">
                        {{$likes_count}}
                    </h1>
                </div>
            </div>


        </div>

    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">

{{--            @if(auth()->user()->hasRole('employer-waiting list'))--}}
{{--                <div class="alert alert-warning" role="alert">--}}
{{--                    {{ __('You are currently in the waiting list, please contact the Faculty of Law to grant you permissions.') }}--}}
{{--                    <br>--}}
{{--                    {{ __('- You can visit the contact page -') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body underline">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <img src="https://pbs.twimg.com/profile_banners/986993325776560128/1603208371/1500x500" text-center width="500"  alt="">--}}

        </div>
    </div>
</div>
@endsection
