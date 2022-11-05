@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Edit project')}}</h3>
    <hr>
    <form action="{{route('projects.update',$project)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $project->name }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>


        <div class="row mb-3">
            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

            <div class="col-md-6">
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{$project->description}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="start" class="col-md-4 col-form-label text-md-end">{{ __('Start') }}</label>

            <div class="col-md-6">
                <input id="start" type="date" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ $project->start }}" required>

                @error('start')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="end" class="col-md-4 col-form-label text-md-end">{{ __('End') }}</label>

            <div class="col-md-6">
                <input id="end" type="date" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ $project->end }}" required>
                @error('end')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('URL') }}</label>

            <div class="col-md-6">
                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $project->url }}">

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
