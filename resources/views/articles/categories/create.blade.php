@extends('layouts.app')

@section('content')
<div class="container">

    <h3>{{__('Add category')}}</h3>
    <hr>
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row mb-3">
            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>

                @error('title')
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

            </div>
        </div>

    </form>

</div>



@endsection
