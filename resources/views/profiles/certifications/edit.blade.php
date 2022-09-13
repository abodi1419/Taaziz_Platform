@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Edit certification')}}</h3>
    <hr>
    <form action="{{route('certifications.update',$certification)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $certification->name }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="issuer" class="col-md-4 col-form-label text-md-end">{{ __('Issued by') }}</label>

            <div class="col-md-6">
                <input id="issuer" type="text" class="form-control @error('issuer') is-invalid @enderror" name="issuer" value="{{ $certification->issuer }}" required>

                @error('issuer')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>


        <div class="row mb-3">
            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

            <div class="col-md-6">
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{$certification->description}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

            <div class="col-md-6">
                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $certification->date }}" required>

                @error('date')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>


        <div class="row mb-3">
            <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('URL') }}</label>

            <div class="col-md-6">
                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{$certification->url }}">

                @error('url')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
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
