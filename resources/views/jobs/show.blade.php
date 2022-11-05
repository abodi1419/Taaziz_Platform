@extends('layouts.app')


@section('title', $job->title)


@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h4 class="text-center">{{$job->title}}</h4>
                <div><b>{{__('Name')}}: </b> {{$job->company_name}}</div>
                <div><b>{{__('Type')}}: </b> {{$job->type}} </div>
                <div><b>{{__('Location')}}: </b> {{$job->location}} </div>
                <div><b>{{__('Website')}}: </b> <a target="_blank" href="{{$job->company_website}}">Website</a></div>
                <div><b>{{__('Posted at')}}: </b> {{date_format($job->created_at,'d/m/Y')}}, <b>{{__('Updated at')}}: </b> {{date_format($job->updated_at,'d/m/Y')}}</div>
                <hr>
            </div>

            <div class="card-body">
                {!! nl2br($job->description) !!}
            </div>

{{--                    --}}{{--  if the user is: graduated student - apply btn inside the job details --}}
{{--                    @if(auth()->user()->hasRole('student'))--}}
{{--                        <div class="card-footer d-flex justify-content-center align-items-center">--}}
{{--                            <form action="{{route('applications.store',$job->id)}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <button class="btn btn-success" onclick="return confirm('{{__('Are you sure you want to apply for this opportunity?')}}');" >--}}
{{--                                    Apply--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    @endif--}}
        </div>
    </div>


@endsection
