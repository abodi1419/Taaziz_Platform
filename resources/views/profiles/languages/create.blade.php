@extends('layouts.app')

@section('content')
<div class="container">
    @if($next)
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
        </div>
    @endif
    <h3>{{__('Add language')}}</h3>
    <hr>
    <form action="{{route('languages.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row mb-3">
            <label for="language" class="col-md-4 col-form-label text-md-end">{{ __('Language') }}</label>

            <div class="col-md-6">
                <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ old('language') }}" required>

                @error('language')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Level') }}</label>

            <div class="col-md-6">
                <input type="range" oninput="editLabel(this)" step="20" name="level" id="level" class="form-range w-100 @error('language') is-invalid @enderror" max="100" value="20">
{{--                'Beginner','Intermediate','Proficient','Fluent','Native' --}}
                <div class="text-center"><span id="level-label">{{__('Beginner')}}</span></div>

            </div>
        </div>


        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
                </button>
                @if($next)
                    <a href="{{route('contacts.create')}}">{{__('Next')}}</a>
                @endif

            </div>
        </div>

    </form>

</div>
<script>
    editLabel(document.getElementById('level'))
    function editLabel(e) {
        if(e.value<20){
            e.value=20;
        }
        let levels = ['{{__('Beginner')}}', '{{__('Intermediate')}}', '{{__('Proficient')}}', '{{__('Fluent')}}', '{{__('Native')}}'];
        let levelsColors = ['danger','warning','warning','success','success']
        let levelLabel = document.getElementById('level-label')
        levelLabel.innerHTML = levels[e.value/20-1]
        levelLabel.setAttribute('class','text-'+levelsColors[e.value/20-1]+" h3")
    }
</script>


@endsection
