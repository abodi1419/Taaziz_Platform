@extends('layouts.app')


@section('title', $jobs->job_title)


@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h4 class="text-center">{{$jobs->job_title}}</h4>
                <div><b>{{__('Company Name')}}: </b> {{$jobs->company_name}}</div>
                <div><b>{{__('Job Type')}}: </b> {{$jobs->job_types}} </div>
                <div><b>{{__('Job Location')}}: </b> {{$jobs->job_location}} </div>
                <div><b>{{__('Posted at')}}: </b> {{$jobs->created_at}}, <b>{{__('Updated at')}}: </b> {{$jobs->updated_at}}</div>
                <hr>
            </div>

            <div class="card-body">
                {!! nl2br($jobs->job_description) !!}
            </div>

                <div class="card-footer d-flex justify-content-center align-items-center">
                    @if($jobs->apply_by == 'Link')

                        <button class="btn btn-success"><a href="{{url($jobs->apply_by_link_Email)}}" target="_blank" class="text-white">Apply</a></button>

                    @else
                        <button class="btn btn-success"><a href="mailto:{{($jobs->apply_by_link_Email)}}" target="_blank" class="text-white">Apply</a></button>

                    @endif

                </div>
        </div>
    </div>


@endsection
