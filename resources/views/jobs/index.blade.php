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
                                <form action="{{route('applications.store',$job->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-success" onclick="return confirm('{{__('Are you sure you want to apply for this opportunity?')}}');" >
                                        {{__('Apply')}}
                                    </button>
                                </form>
                            </div>
                        @endif

                        {{--   It appears only to admin --}}
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('employer'))
                            <div class="card-footer d-flex justify-content-center align-items-center bg-light">
                                    @csrf
                                    <a class="bg-light text-black" href="{{route('applications.viewApplicants',$job->id)}}">{{__('View Applicants')}}</a>
                            </div>

                            <div class="card-footer d-flex justify-content-center align-items-center bg-warning">
                                    @csrf
                                <a class="bg-warning text-black" href="{{route('applications.Candidates',$job->id)}}">{{__('Candidates')}}</a>
                            </div>

                            <div class="card-footer d-flex justify-content-center align-items-center bg-success">
                                    @csrf
                                <a class="bg-success text-white" href="{{route('applications.Accepted',$job->id)}}">{{__('Accepted')}}</a>
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
