@extends('layouts.app')

@section('content')
    <div class="container">
        @if(auth()->user()->id==1)
        <a href="{{route('jobs.create')}}" class= "btn btn-lg btn-primary">{{__('post a new job')}}</a>
        @endif
        <br><br>
        <hr>
        <h3 class="text-primary text-center">{{__('All jobs / internship')}}</h3> <br>

        <div class="row">

            @forelse($jobs as $job)

                <div class="col-md-4 pb-5">

                    <div class="card">

                        <div class="card-header  d-flex justify-content-center align-items-center">
                            <h5> <a class="text-dark" href="{{route('jobs.show', $job->id)}}">{{$job->job_title}}</a></h5>
                        </div>

                        <div class="card-body">
                            <p> {{__('Name')}}: {{$job->company_name}}</p>
                            <p> {{__('Type')}}: {{$job->job_types}}</p>
                            <p> {{__('Location')}}: {{$job->job_location}}</p>
                        </div>

                        <div class="card-footer d-flex justify-content-center align-items-center">
                            @if($job->apply_by == 'Link')

                                <button class="btn btn-success"><a href="{{url($job->apply_by_link_Email)}}" target="_blank" class="text-white">Apply</a></button>

                            @else
                            <button class="btn btn-success"><a href="mailto:{{($job->apply_by_link_Email)}}" target="_blank" class="text-white">Apply</a></button>

                            @endif

                        </div>
                    </div>
                </div>
            @empty
                {{__('No jobs yet')}}

            @endforelse
        </div>


    </div>
@endsection
