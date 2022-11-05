@extends('layouts.app')

@section('content')
<div class="container">
    @if($next)
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
        </div>
    @endif
    <h3>{{__('Add contact')}}</h3>
    <hr>
    <form action="{{route('contacts.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="row mb-3">
            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

            <div class="col-md-6">
                <select name="type" id="type" oninput="editInput(this)" class="form-control">
                    <option value="tel">{{__("Phone")}}</option>
                    <option value="email">{{__("Email")}}</option>
                    <option value="url">{{__("URL")}}</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>

            <div class="col-md-6">
                <input id="contact" type="number" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" placeholder="05xxxxxxxx" required>

                @error('contact')
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
                    <a href="{{route('profile.index')}}">{{__('Go to your profile')}}</a>
                @endif

            </div>
        </div>

    </form>

</div>
<script>
    function editInput(e) {
        let contact = document.getElementById('contact');
        if(e.selectedIndex == 0){
            contact.setAttribute('type','number')
            contact.setAttribute('placeholder','05xxxxxxxx')
        }else if(e.selectedIndex == 1){
            contact.setAttribute('type','email')
            contact.setAttribute('placeholder','example@example.com')
        }else{
            contact.setAttribute('type','url')
            contact.setAttribute('placeholder','http://google.com')
        }
    }
</script>


@endsection
