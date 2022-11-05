@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('Edit experience')}}</h3>
    <hr>

    <form action="{{route('experiences.update',$experience)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="company" class="col-md-4 col-form-label text-md-end">{{ __('Company') }}</label>

            <div class="col-md-6">
                <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ $experience->company }}" required autocomplete="company" autofocus>

                @error('company')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="position" class="col-md-4 col-form-label text-md-end">{{ __('Position') }}</label>

            <div class="col-md-6">
                <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $experience->position }}" required autocomplete="position" autofocus>

                @error('position')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

            <div class="col-md-6">
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{$experience->description}}</textarea>
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
                <input id="start" type="date" class="form-control @error('start') is-invalid @enderror" name="start" value="{{$experience->start }}" required>

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
                <input id="end" type="date" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ $experience->end }}">
                <input type="checkbox" name="still" id="still" value="still" @if(!$experience->end) checked @endif> {{__('Until now')}}
                @error('end')
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
<script>
    let still = document.getElementById('still');
    let end = document.getElementById('end')
    if(still.checked){
        end.disabled = true
    }

    still.addEventListener('change',()=>{
        if(still.checked){
            end.disabled = true
        }else{
            end.disabled = false;
        }
    })
</script>


@endsection
