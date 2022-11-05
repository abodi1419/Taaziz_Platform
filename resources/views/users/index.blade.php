@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Users')}}</h3>
    @foreach($users as $userRoles)

        <h4>{{$userRoles[0]->roles[0]->name}}</h4>
        <table class="table">
            <thead>
            <tr>
                <td>{{__('#')}}</td>
                <td>{{__('Name')}}</td>
                <td>{{__('Role')}}</td>
                <td>{{__('Email')}}</td>
                <td>{{__('Joined at')}}</td>
                <td>{{__('Actions')}}</td>
            </tr>

            </thead>
            <tbody>
            @foreach($userRoles as $index=>$user)

                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->roles[0]->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <div class="row">
                            <div class="col"><a href="{{route("users.show",$user)}}">{{__('View user')}}</a></div>
                            <div class="col"><a href="{{route("users.edit",$user)}}">{{__('Edit user')}}</a></div>
                            @if($user->active==0)
                            <div class="col"><a class="btn btn-success" href="{{asset("users/activate/".$user->id)}}">{{__('Activate user')}}</a></div>
                            @else
                            <div class="col"><a class="btn btn-danger" href="{{asset("users/deactivate/".$user->id)}}">{{__('Deactivate user')}}</a></div>
                            @endif
                            <form id="deleteForm" action="{{route("users.destroy",$user)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">{{__('Delete user')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endforeach
    <a class="btn btn-primary" href="{{route("users.create")}}">{{__("Create user")}}</a>
</div>



@endsection
