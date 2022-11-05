@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-primary text-center">{{__('my Applications')}}</h3> <br>

        <div class="row">
            @if(!$jobs)
                <p>{{__('You haven not applied for a job yet')}}</p>

            @else
                @foreach($jobs as $job)
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

                        <div class="card-footer d-flex justify-content-center align-items-center text-white bg-secondary">
                            <h5>{{__('Applied')}}</h5>

                        </div>
                    </div>
                </div>

                @endforeach
            @endif
        </div>


    </div>
@endsection
