@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('View Role')}}</h3>
    <ul>
        @foreach($role->permissions as $permission)
            <li>{{$permission->name}}</li>
        @endforeach
    </ul>


</div>



@endsection
