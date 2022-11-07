@extends('layouts.app')

@section('content')
    <style>
        .unline{
            text-decoration: none;
            font-weight: bold;
        }
        .space{
            margin-left: 10px;
            border-radius: 10px;
        }
    </style>
    <div class="container">
        @can('Job create')
            <a href="{{route('jobs.create')}}" class= "btn btn-lg btn-primary">{{__('Post a new job')}}</a>
        @endcan
        <br><br>
        <hr>
        <h3 class="text-primary text-center">{{__('jobs | internships')}}</h3> <br>

        <div class="row">

            @forelse($jobs as $job)

                <div class="col-md-4 pb-5">

                    <div class="card">

                        <div class="card-header  d-flex justify-content-center align-items-center">
                            <h5> <a class=" unline text-dark" href="{{route('jobs.show', $job->id)}}">{{$job->title}}</a></h5>
                        </div>

                        <div class="card-body">
                            <p> {{__('Name')}}: {{$job->company_name}}</p>
                            <p> {{__('Type')}}: {{$job->type}}</p>
                            <p> {{__('Location')}}: {{$job->location}}</p>
                        </div>

{{--                        if the user is: graduated student --}}
                        @if(auth()->user()->hasRole('student'))
                            <div class="card-footer d-flex justify-content-center align-items-center">
                                @php
                                $applied=false;
                                $status=0;
                                foreach ($user_applications as $application){
                                    if($application->job_id== $job->id){
                                        $status = $application->status;
                                        $applied=true;
                                    }
                                }
                                @endphp
                                @if(!$applied)
                                <form action="{{route('applications.store')}}" method="post">
                                    @csrf
                                    <input type="number"  name="job_id" value="{{$job->id}}" hidden>
                                    <button class="btn btn-success text-center" onclick="return confirm('{{__('Are you sure you want to apply for this opportunity?')}}');" >
                                        {{__('Apply')}}

                                    </button>
                                </form>
                                @else
{{--                                    <div class="card-footer d-flex justify-content-center align-items-center text-white">--}}
                                        @if($status==2)
                                            <h5 class="bg-secondary p-lg-2 text-white w-100 text-center">{{__('Applied')}}</h5>
                                        @elseif($status==3)
                                            <h5 class="bg-warning p-lg-2 text-white w-100 text-center">{{__('Candidated')}}</h5>

                                        @elseif($status==4)
                                            <h5 class="bg-success p-lg-2 text-white w-100 text-center">{{__('.Accepted')}}</h5>

                                        @elseif($status==1)
                                            <h5 class="bg-danger p-lg-2 text-white w-100 text-center">{{__('Rejected')}}</h5>


                                        @endif
{{--                                    </div>--}}
                                @endif
                            </div>
                        @endif

                        {{--   It appears only to admin or employers --}}
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('employer'))
                            <div class="card-footer d-flex justify-content-center align-items-center bg-light">
                                <div class="space d-flex justify-content-center align-items-center w3-blue">
{{--                                        @csrf--}}
                                        <a class="unline w3-blue text-black m-2 p-1  w-100" href="{{asset('applicants/'.$job->id.'/show')}}">{{__('Applicants')}}</a>
                                </div>

                                <div class="space d-flex justify-content-center align-items-center w3-yellow">
{{--                                        @csrf--}}
                                    <a class="unline w3-yellow text-black m-2 p-1  w-100" href="{{asset('candidates/'.$job->id.'/show')}}">{{__('Candidates')}}</a>
                                </div>

                                <div class="space d-flex justify-content-center align-items-center w3-green">
{{--                                        @csrf--}}
                                    <a class="unline w3-green text-black m-2 p-1 w-100" href="{{asset('accepted/'.$job->id.'/show')}}">{{__('Accepted')}}</a>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
            @empty
                {{__('No jobs yet')}}

            @endforelse
        </div>
    </div>
@endsection
