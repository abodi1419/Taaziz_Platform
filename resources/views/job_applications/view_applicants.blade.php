@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-primary text-center">{{__('View Applications')}}: {{$job->title}} </h3> <br>

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

                                <a href="{{asset('profile/'.$application->user->student->profile->id)}}"> {{__('view profile')}} </a>
                            </div>

                            <div class="card-footer d-flex justify-content-center align-items-center bg-warning">
{{--                                <form action="" method="post">--}}
{{--                                    {{route('applications.store',$job->id)}}--}}
{{--                                    @csrf--}}
                                    <a class="btn bg-warning border-0 w-100" href="{{asset('candidacy/'.$application->id)}}">{{__('candidacy')}}</a>
{{--                                    <button class="bg-warning border-0">{{__('candidacy')}}</button>--}}
{{--                                </form>--}}
                            </div>
                            <div class="card-footer d-flex justify-content-center align-items-center bg-danger">
                                <a class="btn bg-danger border-0 w-100" href="{{asset('reject/'.$application->id)}}">{{__('Reject')}}</a>

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
