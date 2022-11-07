@extends('layouts.app')

@section('content')
    <style>
        .bold{
            font-weight: bold;
            font-size: 15px;
        }
        .box{
            text-decoration: none;
            font-weight: bold;
        }
    </style>
    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <div class="container">

        <h3 class="text-primary text-center">{{__('View Applications')}}: {{$job->title}} </h3> <br>
        <hr>
{{--        <button class="btn btn-outline-dark bold" onclick="myFunction()">Filter--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">--}}
{{--                <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>--}}
{{--            </svg>--}}
{{--        </button>--}}
        <div class="container">
{{--            <form action="{{asset('/search/applicants/')}}" method="post" role="search" id="myDIV" style="display: none">--}}
{{--                @csrf--}}
{{--                <div class="row justify-content-md-center">--}}
{{--                <div class="col-3">--}}
{{--                    <label>Sort by:</label>--}}
{{--                    <select name="type">--}}
{{--                        <option value="GPA">GPA</option>--}}
{{--                        <option value="Graduation-date">Graduation date</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col-3">--}}
{{--                    <label>Type of sort:</label>--}}
{{--                    <select name="sort">--}}
{{--                        <option value="Descending">Descending</option>--}}
{{--                        <option value="Ascending">Ascending</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="col-1">--}}
{{--                    <span class="input-group-btn">--}}
{{--                    <button type="submit" style="border: none; border-radius: 5px">--}}
{{--                        <a class="fa fa-search box"> Filter </a>--}}
{{--                    </button>--}}
{{--                </span>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            </form>--}}
{{--        <br>--}}

        <div class="row">
{{--            @dd($job->applications)--}}
            @forelse($job->applications as $application)
                @if($application->status==2)
                    <div class="col-md-4 pb-5">
                        <div class="card">
                            <div class="card-header  d-flex justify-content-center align-items-center">
                                <h5> {{$application->user->name}}</h5>
                            </div>

                            <div class="card-body">
                                <p> {{__('Major')}}: {{$application->user->student->profile->major}} </p>
{{--                                {{$profile->sutdent_id->majeor}}--}}
                                <p> {{__('GPA')}}: {{$application->user->student->profile->gpa}}</p>
{{--                                {{$profile->sutdent_id->gpa}}--}}
                                <p> {{__('Graduation date')}}: {{$application->user->student->graduation_date}}</p>

                                <a class="box" href="{{asset('profile/'.$application->user->student->profile->id)}}"> {{__('view profile')}} </a>
                            </div>

                            <div class="card-footer d-flex justify-content-center align-items-center w3-yellow">
                                    <a class="btn w3-yellow border-0 w-100 bold" href="{{asset('candidacy/'.$application->id)}}">{{__('candidacy')}}</a>
                            </div>

                            <div class="card-footer d-flex justify-content-center align-items-center w3-red">
                                <a class="btn w3-red border-0 w-100 bold" href="{{asset('reject/'.$application->id)}}">{{__('Reject')}}</a>

                            </div>
                        </div>

                    </div>
                @endif
            @empty


            @endforelse
{{--                @endif--}}
{{--                @endforeach--}}
       </div>


    </div>
@endsection
