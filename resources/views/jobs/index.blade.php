@extends('layouts.app')

@section('content')
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
                            <h5> <a class="text-dark" href="{{route('jobs.show', $job->id)}}">{{$job->title}}</a></h5>
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
                                    <button class="btn btn-success" onclick="return confirm('{{__('Are you sure you want to apply for this opportunity?')}}');" >
                                        {{__('Apply')}}

                                    </button>
                                </form>
                                @else
                                    <div class="card-footer d-flex justify-content-center align-items-center text-white bg-secondary">
                                        @if($status==2)
                                            <h5>{{__('Applied')}}</h5>
                                        @elseif($status==3)
                                            <h5>{{__('Candidated')}}</h5>

                                        @elseif($status==4)
                                            <h5>{{__('Accepted')}}</h5>

                                        @elseif($status==1)
                                            <h5>{{__('Rejected')}}</h5>


                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif

                        {{--   It appears only to admin or employers --}}
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('employer'))
                            <div class="card-footer d-flex justify-content-center align-items-center bg-light">
                                    @csrf
                                    <a class="bg-light text-black" href="{{asset('applicants/'.$job->id.'/show')}}">{{__('View Applicants')}}</a>
                            </div>

                            <div class="card-footer d-flex justify-content-center align-items-center bg-warning">
                                    @csrf
                                <a class="bg-warning text-black" href="{{asset('candidates/'.$job->id.'/show')}}">{{__('Candidates')}}</a>
                            </div>

                            <div class="card-footer d-flex justify-content-center align-items-center bg-success">
                                    @csrf
                                <a class="bg-success text-white" href="{{asset('accepted/'.$job->id.'/show')}}">{{__('Accepted')}}</a>
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
