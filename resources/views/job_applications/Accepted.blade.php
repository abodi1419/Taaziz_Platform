@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-primary text-center">{{__('View Accepted Applications')}} : job title</h3> <br>

        <div class="row">
{{--            @foreach($profiles as $profile)--}}
                <div class="col-md-4 pb-5">

                    <div class="card">

                            <div class="card-header  d-flex justify-content-center align-items-center">
                                <h5> <a class="text-dark" href=""></a></h5>
{{--                                {{$profile->sutdent_id->name}}--}}
                            </div>

                            <div class="card-body">
                                <p> {{__('Major')}}: </p>
{{--                                {{$profile->sutdent_id->majeor}}--}}
                                <p> {{__('GPA')}}: </p>
{{--                                {{$profile->sutdent_id->gpa}}--}}
                                <p> {{__('Graduation date')}}: </p>

                                <a href=""> {{__('view profile')}} </a>
                            </div>
                            <div class="card-footer d-flex justify-content-center align-items-center text-white bg-success">
                                <h5>Accepted</h5>

                            </div>
                    </div>
                </div>

{{--                @endforeach--}}
        </div>


    </div>
@endsection
