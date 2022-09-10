@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{$user->name}} </h2>
    {{$user->student->profile->major}}<br>
    {{__('GPA: ').$user->student->profile->gpa}}
    <hr>
    <h4>{{__('Bio')}}</h4>
    <p>
        {{$user->student->profile->bio}}
    </p>

    <div class="row">



    </div>

</div>



@endsection
