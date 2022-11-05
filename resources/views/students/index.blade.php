@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__($user->name)}}</h3>
    <hr>
    <div class="row">
        <div class="col-6">{{__('Email')}}</div>
        <div class="col-6">{{$user->email}}</div>
        <div class="col-6">{{__('Phone')}}</div>
        <div class="col-6">{{$user->phone}}</div>


    </div>

</div>



@endsection
