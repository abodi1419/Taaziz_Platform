@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('View User')}}</h3>
    <div class="card">
        <div class="card-header">

            <div class="row">
                <div class="col-6">
                    <h3>{{$user->name}}</h3>
                </div>
                <div class="col-6">{{__("Joined at ").$user->created_at->format('d/m/Y')}}</div>
            </div>
        </div>
        <div class="card-body row">
            <div class="col-12 pb-2">
                <h5>{{__("Role: ")}}
                    @foreach($user->roles as $index=>$role)
                        @if($index>0)
                            {{", "}}
                        @endif
                        {{$role->name}}
                    @endforeach
                </h5>
            </div>
            <div class="col-6 pb-2">
                <h5>
                    {{__("Phone: ").$user->phone}}
                </h5>
            </div>
            <div class="col-6 pb-2">
                @if($user->phone_verified_at==null)
                    <span class="bg-danger border-dark rounded text-light p-2">
                            {{__("Not confirmed")}}
                    </span>
                @else
                    <span class="bg-success border-dark rounded text-light p-2">
                            {{__("Confirmed")}}
                    </span>
                @endif
            </div>
            <div class="col-6 pb-2">
                <h5>
                    {{__("Email: ").$user->email}}

                </h5>

            </div>
            <div class="col-6 pb-2">
                @if($user->email_verified_at==null)
                    <span class="bg-danger border-dark rounded text-light p-2">
                            {{__("Not confirmed")}}
                    </span>
                @else
                    <span class="bg-success border-dark rounded text-light p-2">
                            {{__("Confirmed")}}
                    </span>
                @endif
            </div>

            <div class="col-12"><br></div>
            <div class="col-12 row ">
                <div class="col-12 p-0"><h4>{{__("Permissions")}}</h4></div>
                @foreach($user->getPermissionsViaRoles() as $index=>$permission)
                    <?php
                    if($index==0||$name!=explode(" ",$permission->name)[0]){
                        $name = explode(" ",$permission->name)[0];
                        echo "<div class='col-12'><br></div>";
                        echo "<div class='col-12 p-2'><h5>{$name}</h5></div>";
                    }


                    ?>
                    <div class="col-6">{{explode(" ",$permission->name,2)[1] }}</div>
                @endforeach
            </div>



        </div>
    </div>






</div>



@endsection
