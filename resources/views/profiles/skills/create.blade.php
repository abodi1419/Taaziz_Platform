@extends('layouts.app')

@section('content')
<div class="container">
    @if($next)
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 28%;" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100">28%</div>
        </div>
    @endif
    <h3>{{__('Add skill')}}</h3>
    <hr>
    <p class="text-warning">


        @if($next&&$num<3)
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            @if($num==0)
                {{__('Add at least 3 skills')}}
            @else
                {{__('Add').' '.(3-$num).' '.__('more skills')}}
            @endif
        @endif
    </p>
    <form action="{{route('skills.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row mb-3">
            <label for="skill" class="col-md-4 col-form-label text-md-end">{{ __('Skill') }}</label>

            <div class="col-md-6">
                <input id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ old('skill') }}" required autocomplete="skill" autofocus>
                @if($next)
                    @if($num<=3)
                        <h4 class="@if($num<=1) text-danger @elseif($num==2) text-warning @else text-success @endif">{{$num}}/3</h4>
                    @else
                        <h5 class="text-success">{{$num.__(' Skills was added.')}}</h5>
                    @endif
                @endif
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
                @if($next)
                    <a href="{{route('experiences.create')}}">{{__('Next')}}</a>
                @endif

            </div>
        </div>

    </form>

</div>



@endsection
