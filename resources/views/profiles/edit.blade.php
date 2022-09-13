@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Update profile')}}</h3>
    <hr>
    <form action="{{route('profile.update',$profile)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="major" class="col-md-4 col-form-label text-md-end">{{ __('Major') }}</label>

            <div class="col-md-6">
                <input id="major" type="text" class="form-control @error('major') is-invalid @enderror" name="major" value="{{ $profile->major }}" required autocomplete="major" autofocus>

                @error('major')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="bio" class="col-md-4 col-form-label text-md-end">{{ __('Bio') }}</label>

            <div class="col-md-6">
                <textarea name="bio" id="bio" cols="30" rows="10" class="form-control @error('bio') is-invalid @enderror">{{ $profile->bio  }}</textarea>

                @error('bio')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="gpa" class="col-md-4 col-form-label text-md-end">{{ __('GPA') }}</label>

            <div class="col-md-6">
                <input id="gpa" type="number" max="5" min="1" step="0.01" class="form-control @error('gpa') is-invalid @enderror" name="gpa" value="{{ $profile->gpa }}" placeholder="5.00" required autocomplete="gpa" autofocus>

                @error('gpa')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>


        <div class="row mb-3">
            <label for="p">{{__("Profile visibility")}}</label>
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="state" value="2" id="p" {{ $profile->state==2 ? 'checked' : '' }}>

                    <label class="form-check-label" for="p">
                        {{ __('Public') }}
                    </label><br>
                    <input class="form-check-input" type="radio" name="state" value="1" id="c" {{ $profile->state==1 ? 'checked' : '' }}>

                    <label class="form-check-label" for="c">
                        {{ __('Companies only') }}
                    </label><br>
                    <input class="form-check-input" type="radio" name="state" value="0" id="pr" {{ $profile->state==0 ? 'checked' : '' }}>

                    <label class="form-check-label" for="pr">
                        {{ __('Private') }}
                    </label>
                </div>
            </div>
        </div>





        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
            </div>
        </div>

    </form>

</div>



@endsection
