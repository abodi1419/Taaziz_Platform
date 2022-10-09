@csrf
<h4 class="pb-3">COMPANY DETAILS</h4>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="company_name">{{__('Company Name')}}</label>
            <input type="text" name="company_name" id="company_name" class="form-control" @isset($job) value="{{$job->company_name}}" @endisset>
        </div>
        <div class="col">
            <label for="company_phone">{{__('Company phone')}}</label>
            <input type="text" name="company_phone" id="company_phone" class="form-control" @isset($job) value="{{$job->company_phone}}" @endisset>
        </div>
        <div class="col">
            <label for="company_website">{{__('Company Website')}}</label>
            <input type="text" name="company_website" id="company_website" class="form-control" @isset($job) value="{{$job->company_website}}" @endisset>
        </div>
    </div>

{{--    <div class="form-group mt-3">--}}
{{--        <label for="company_logo">Company logo</label>--}}
{{--        <input type="file" class="form-control-file" id="company_logo">--}}
{{--    </div>--}}

    <div class="form-group mt-3">
        <label for="company_info">{{__('Company info')}}</label>
        <textarea class="form-control" name="company_info" id="company_info" cols="10" rows="5"> @isset($job) {{$job->company_info}} @endisset </textarea>
    </div>
</div>

<hr>
<h4 class="pb-3">JOB DETAILS</h4>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="job_title">{{__('Job title')}}</label>
            <input type="text" name="job_title" class="form-control" @isset($job) value="{{$job->job_title}}" @endisset>
        </div>
        <div class="col">
            <label for="job_types">{{__('Job types')}}</label>
            <select  name="job_types" class="form-control" id="job_types">
                <option @isset($job) value="{{$job->job_types}}" @endisset>Full-time</option>
                <option @isset($job) value="{{$job->job_types}}" @endisset>Part-time</option>
                <option @isset($job) value="{{$job->job_types}}" @endisset>internship</option>
            </select>
        </div>
        <div class="col">
            <label for="job_location">{{__('Job location')}}</label>
            <input type="text" name="job_location" class="form-control" @isset($job) value="{{$job->job_location}}" @endisset>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="job_description">{{__('Job description')}}</label>
    <textarea class="form-control" name="job_description" id="content" cols="30" rows="10"> @isset($job) {{$job->job_description}} @endisset </textarea>
</div>
<hr>

<h4 class="pb-3">HOW TO APPLY</h4>
<div class="form-group">
    <label for="apply_by">{{__('Apply By')}}</label>
    <select  name="apply_by" class="form-control" id="apply_by">
        <option @isset($job) value="{{$job->apply_by}}" @endisset>Link</option>
        <option @isset($job) value="{{$job->apply_by}}" @endisset>Email</option>
    </select>
    <small id="emailHelp" class="form-text text-muted">Applicants will be redirected to the provided external URL / Email to apply to the job.</small>
</div>

<div class="form-group">
    <label for="apply_by_link_Email">{{__('Link / Email')}}</label>
    <input type="text" name="apply_by_link_Email" id="apply_by_link_Email" class="form-control" @isset($job) value="{{$job->apply_by_link_Email}}" @endisset>
    <small id="apply_by_link_Email" class="form-text text-muted">URL / Email to apply to the job.</small>
</div>


<div class="form-group">
    <button class="btn btn-success">{{$submitText}}</button>
</div>
