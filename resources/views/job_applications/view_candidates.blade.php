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
    <div class="container">
        <h3 class="text-primary text-center">{{__('View Applications')}}: {{$job->title}} </h3> <br>

        <div class="row">
            {{--            @dd($job->applications)--}}
            @forelse($job->applications as $application)
                @if($application->status==3)
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

                            <div class="card-footer d-flex justify-content-center align-items-center w3-green">
                                <a class="btn w3-green border-0 w-100 bold" href="{{asset('accept/'.$application->id)}}">{{__('Accept')}}</a>
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
