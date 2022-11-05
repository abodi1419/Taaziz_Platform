@csrf
<h4 class="pb-3">{{__('EMPLOYER DETAILS')}}</h4>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="company_name">{{__('Employer Name')}}</label>
            <input type="text" name="company_name" id="company_name" class="form-control" @isset($job) value="{{$job->company_name}}" @else value="{{old('company_name')}}" @endisset>
        </div>
        <div class="col">
            <label for="company_speciality">{{__('Speciality')}}</label>
            <input type="text" name="company_speciality" id="company_speciality" class="form-control" @isset($job) value="{{$job->company_speciality}}" @else value="{{old('company_speciality')}}" @endisset>
        </div>
        <div class="col">
            <label for="company_phone">{{__('Phone')}}</label>
            <input type="text" name="company_phone" id="company_phone" class="form-control" @isset($job) value="{{$job->company_phone}}" @else value="{{old('company_phone')}}" @endisset>
        </div>
        <div class="col">
            <label for="company_website">{{__('Website')}}</label>
            <input type="url" name="company_website" id="company_website" class="form-control" @isset($job) value="{{$job->company_website}}" @else value="{{old('company_website')}}" @endisset>
        </div>
    </div>

{{--    <div class="form-group mt-3">--}}
{{--        <label for="company_logo">Company logo</label>--}}
{{--        <input type="file" class="form-control-file" id="company_logo">--}}
{{--    </div>--}}


</div>

<hr>
<h4 class="pb-3">{{__('JOB DETAILS')}}</h4>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="job_title">{{__('Job title')}}</label>
            <input type="text" name="title" class="form-control" @isset($job) value="{{$job->title}}" @else value="{{old('title')}}" @endisset>
        </div>
        <div class="col">
            <label for="type">{{__('Job type')}}</label>
            <select  name="type" class="form-control" id="type">
                <option @if(isset($job)&&$job->type=='Full time'||old('type')=='Full time') selected @endif value="Full time">{{__('Full time')}}</option>
                <option @if(isset($job)&&$job->type=='Part time'||old('type')=='Part time') selected @endif value="Part time">{{__('Part time')}}</option>
                <option @if(isset($job)&&$job->type=='Internship'||old('type')=='Internship') selected @endif value="Internship">{{__('Internship')}}</option>
            </select>
        </div>
        <div class="col">
            <label for="location">{{__('Job location')}}</label>
            <input type="text" id="location" name="location" class="form-control" @if(isset($job)&&$job->location!="Remote") value="{{$job->location}}" @else value="{{old('location')}}" @endif @if(old('is_remote')||isset($job)&&$job->location=='Remote') disabled @endif>
            <label for="is_remote">{{__('Remote')}}</label>
            <input type="checkbox" id="is_remote" value="Remote" name="is_remote" @if(old('is_remote')||isset($job)&&$job->location=="Remote") checked @endif onchange="if(this.checked) document.getElementById('location').disabled = true; else document.getElementById('location').disabled = false">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="description">{{__('Job description')}}</label>
    <textarea class="form-control" name="description" id="description" cols="30" rows="10"> @isset($job) {{$job->description}} @else {{old('description')}} @endisset </textarea>
</div>
<hr>

{{--<h4 class="pb-3">HOW TO APPLY</h4>--}}
{{--<div class="form-group">--}}
{{--    <label for="apply_by">{{__('Apply By')}}</label>--}}
{{--    <select  name="apply_by" class="form-control" id="apply_by">--}}
{{--        <option @isset($job) value="{{$job->apply_by}}" @endisset>Link</option>--}}
{{--        <option @isset($job) value="{{$job->apply_by}}" @endisset>Email</option>--}}
{{--    </select>--}}
{{--    <small id="emailHelp" class="form-text text-muted">Applicants will be redirected to the provided external URL / Email to apply to the job.</small>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--    <label for="apply_by_link_Email">{{__('Link / Email')}}</label>--}}
{{--    <input type="text" name="apply_by_link_Email" id="apply_by_link_Email" class="form-control" @isset($job) value="{{$job->apply_by_link_Email}}" @endisset>--}}
{{--    <small id="apply_by_link_Email" class="form-text text-muted">URL / Email to apply to the job.</small>--}}
{{--</div>--}}


<div class="form-group">
    <button class="btn btn-success">{{$submitText}}</button>
</div>
