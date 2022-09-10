@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Create profile')}}</h3>
    <hr>
    <p class="text-warning">
        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
        {{__('Add at least 3 skills')}}
    </p>
    <form action="{{route('skills.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row mb-3">
            <label for="skill" class="col-md-4 col-form-label text-md-end">{{ __('Skill') }}</label>

            <div class="col-md-6">
                <input id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ old('skill') }}" required autocomplete="skill" autofocus>

                @error('skill')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>



        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
                </button>
                <a href="{{route('experiences.create')}}">{{__('Next')}}</a>

            </div>
        </div>

    </form>

</div>



@endsection
