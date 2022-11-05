@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Create role')}}</h3>
    <hr>
    <form action="{{route("roles.store")}}" method="post">
        @csrf
        @method("POST")
        <div class="form-group">
            <label for="name">{{__("Name")}}</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="{{__('Enter role name')}}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-group">
            <strong>{{__('Permissions')}}:</strong>
            <br>


            <div class="row p-4">
                @foreach($permissions as $index=>$value)

                    <?php
                    if($index==0||$name!=explode(" ",$value->name)[0]){
                        $name = explode(" ",$value->name)[0];
                        $showName = __($name);
                        echo "<div class='col-12'><br></div>";
                        echo "<div class='col-12 p-0'><h3>{$showName}</h3></div>";
                    }


                    ?>
                    <div class="col-6">
                        <input type="checkbox" class="@error('permissions') is-invalid @enderror" name="permissions[]" id="{{$value->id}}" value="{{$value->id}}">
                        <label for="{{$value->id}}">{{__(explode(" ",$value->name,2)[1]) }}</label>

                    </div>



                @endforeach
            </div>
            <br>
            <div class="text-center"><button type="submit" class="btn btn-primary">{{__("Create role")}}</button></div>

        </div>



    </form>

</div>



@endsection
