@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Users')}}</h3>
    <table class="table">
        <thead>
        <tr>
            <td>{{__('#')}}</td>
            <td>{{__('Name')}}</td>
            <td>{{__('Email')}}</td>
            <td>{{__('Joined at')}}</td>
            <td>{{__('Actions')}}</td>
        </tr>

        </thead>
        <tbody>
        @foreach($users as $index=>$user)

            <tr>
                <td>{{$index+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <div class="row">
                        <div class="col"><a href="{{route("users.show",$user)}}">View User</a></div>
                        <div class="col"><a href="{{route("users.edit",$user)}}">Edit User</a></div>
                        <form id="deleteForm" action="{{route("users.destroy",$user)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete User</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{route("users.create")}}">{{__("Create User")}}</a>
</div>



@endsection
