@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Roles')}}</h3>
    <table class="table">
        <thead>
        <tr>
            <td>{{__('Name')}}</td>
            <td>{{__('Actions')}}</td>
        </tr>

        </thead>
        <tbody>
        @foreach($roles as $role)

            <tr>
                <td>{{$role->name}}</td>
                <td>
                    <div class="row">
                        <div class="col"><a href="{{route("roles.show",$role)}}">View Role</a></div>
                        <div class="col"><a href="{{route("roles.edit",$role)}}">Edit Role</a></div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{route("roles.create")}}">{{__("Create role")}}</a>
</div>



@endsection
