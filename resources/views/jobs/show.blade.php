@extends('layouts.app')


@section('title', $job->title)


@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h4 class="text-center">{{$job->title}}</h4>
                <div><b>{{__('Company Name')}}: </b> {{$job->company_name}}</div>
                <div><b>{{__('Job Type')}}: </b> {{$job->type}} </div>
                <div><b>{{__('Job Location')}}: </b> {{$job->location}} </div>
                <div><b>{{__('Job Location')}}: </b> <a target="_blank" href="{{$job->company_website}}">Website</a></div>
                <div><b>{{__('Posted at')}}: </b> {{date_format($job->created_at,'d/m/Y')}}, <b>{{__('Updated at')}}: </b> {{date_format($job->updated_at,'d/m/Y')}}</div>
                <hr>
            </div>

            <div class="card-body">
                {!! nl2br($job->description) !!}
            </div>

                <div class="card-footer d-flex justify-content-center align-items-center">
{{--                    @if($job->apply_by == 'Link')--}}

{{--                        <button class="btn btn-success"><a href="{{url($jobs->apply_by_link_Email)}}" target="_blank" class="text-white">Apply</a></button>--}}

{{--                    @else--}}
{{--                        <button class="btn btn-success"><a href="mailto:{{($jobs->apply_by_link_Email)}}" target="_blank" class="text-white">Apply</a></button>--}}

{{--                    @endif--}}


                </div>
        </div>
    </div>


@endsection
