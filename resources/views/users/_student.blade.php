<div class="row mb-3">
    <label for="sid" class="col-md-4 col-form-label text-md-end">{{ __("Student id") }}</label>

    <div class="col-md-6">
        <input id="sid" type="number" class="form-control @error("sid") is-invalid @enderror" name="sid" value="@if(isset($student)&&$student!=null){{$student->sid}}@else{{old("sid")}}@endif" placeholder="1850325" required autocomplete="sid" autofocus>

        @error("sid")
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __("Date of birth") }}</label>

    <div class="col-md-6">
        <input id="dob" type="date" class="form-control @error("dob") is-invalid @enderror" name="dob" value="@if(isset($student)&&$student!=null){{$student->dob}}@else{{old("dob")}}@endif" required autocomplete="dob" autofocus>

        @error("dob")
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="graduation_date" class="col-md-4 col-form-label text-md-end">{{ __("Graduation date") }}</label>

    <div class="col-md-6">
        <input id="graduation_date" type="date" class="form-control @error("graduation_date") is-invalid @enderror" name="graduation_date" value="@if(isset($student)&&$student!=null){{$student->graduation_date}}@else{{old("graduation_date")}}@endif" required autocomplete="graduation_date" autofocus>

        @error("graduation_date")
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_employed" id="is_employed" @if(isset($student)&&$student!=null){{$student->is_employed?"checked":''}}@else{{old("is_employed")?"checked":''}}@endif >

            <label class="form-check-label" for="is_employed">
                {{ __("Is employed now?") }}
            </label>
        </div>
    </div>
</div>
