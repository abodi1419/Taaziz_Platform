@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-primary text-center">{{__('View Candidates Applications')}} : job title</h3> <br>

        <div class="row">
{{--            @foreach($profiles as $profile)--}}
                <div class="col-md-4 pb-5">

                    <div class="card">

                        <div class="card-header  d-flex justify-content-center align-items-center">
                            <h5> <a class="text-dark" href=""></a></h5>
{{--                            {{$profile->sutdent_id->name}}--}}
                        </div>

                        <div class="card-body">
                            <p> {{__('Major')}}:</p>
{{--                             {{$profile->sutdent_id->majeor}}--}}
                            <p> {{__('GPA')}}:</p>
{{--                            {{$profile->sutdent_id->gpa}}--}}
                            <p> {{__('Graduation date')}}: </p>

                            <a href=""> {{__('view profile')}} </a>
                        </div>

                            <div class="card-footer d-flex justify-content-center align-items-center bg-success">
                                <form action="" method="post">
{{--                                    {{route('applications.store',$job->id)}}--}}
                                    @csrf
                                    <button class="bg-success border-0 text-white">{{__('Accept')}}</button>
                                </form>
                            </div>
                            <div class="card-footer d-flex justify-content-center align-items-center bg-danger">
                                <form action="" method="post">
{{--                                    {{route('applications.store',$job->id)}}--}}
                                    @csrf
                                    <button class="bg-danger text-white border-0 ">{{__('Reject')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>

{{--                @endforeach--}}
        </div>


    </div>
@endsection
