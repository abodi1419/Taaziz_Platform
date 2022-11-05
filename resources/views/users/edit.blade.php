@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Edit user')}}</h3>
    <hr>
    <div class="text-center mb-3">
        <img src="{{asset($user->image)}}" id="preview" style="background: transparent;" height="150" alt="">
    </div>
    <form id="myForm" action="{{route('users.update', $user)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

            <div class="col-md-5">
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $user->image }}" autocomplete="image" autofocus>

                @error('image')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-md-1 text-center">
                <button type="button" id="remove-image" class="btn btn-danger">{{__('Remove')}}</button>
            </div>
        </div>
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone number') }}</label>

            <div class="col-md-6">
                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" placeholder="05XXXXXXXX" required autocomplete="phone" autofocus>

                @error('phone')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-3">
            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

            <div class="col-md-6">
                <select name="role" id="role" onchange="onRoleChanges(this)" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}" @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="role-part"></div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
            </div>
        </div>

    </form>

    <script>
        var imgInp = document.getElementById('image');
        var preview = document.getElementById('preview');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }

        let button = document.getElementById("remove-image")
        button.addEventListener('click', function () {
            imgInp.value = '';
            preview.src = '{{asset($user->image)}}'

        })

        var rolePart = document.getElementById('role-part');
        let rolesSelect = document.getElementById('role');
        if(rolesSelect.options[rolesSelect.selectedIndex].text==='student'){
            rolePart.innerHTML=`@include("users._student")`;
        }
        function onRoleChanges(e) {
            if (e.options[e.selectedIndex].text==='student'){
                rolePart.innerHTML =`@include("users._student")`;
            }else{
                rolePart.innerHTML = ""


            }

        }

    </script>

</div>



@endsection
