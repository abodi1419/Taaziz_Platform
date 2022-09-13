@extends('layouts.app')

@section('content')
<div class="container">
    @if($next)
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
        </div>
    @endif
    <h3>{{__('Add certification')}}</h3>
    <hr>
    <form action="{{route('certifications.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                <input id="issuer" type="text" class="form-control @error('issuer') is-invalid @enderror" name="issuer" value="{{ old('issuer') }}" required>

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
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{old('description')}}</textarea>
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
                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required>

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
                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}">

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
                    {{ __('Add') }}
                </button>
                @if($next)
                    <a href="{{route('languages.create')}}">{{__('Next')}}</a>
                @endif


            </div>
        </div>

    </form>

</div>



@endsection
