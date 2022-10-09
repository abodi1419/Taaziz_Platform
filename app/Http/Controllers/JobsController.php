<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\jobs;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:jobs list", ['only' => ['jobs.post-jobs']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = jobs::orderBy('id','DESC')->get();
            return view("jobs.index",compact('jobs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->id==1) { // 1==admin id
            return view('jobs.create');
        }
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request->job_types);
//        $validatedData = $request->validate([
//            'company_name'=>'required|min:15',
//            'company_phone' => 'min:7',
//            'company_website',
//            'company_info',
//
//            'job_title' =>'required|min:5',
//            'job_types'=>'required',
//            'job_location' =>'required',
//            'job_description'=>'required|min:20',
//
//            'apply_by' =>'required',
//            'apply_by_link_Email'=>'required|min:15',
//
//        ]);

        $job = new jobs();
        $job->user_id = auth()->id();
        $job->company_name = $request->company_name;
        $job->company_phone = $request->company_phone;
        $job->company_website = $request->company_website;
        $job->company_info = $request->company_info;

        $job->job_title = $request->job_title;
        $job->job_types = $request->job_types;
        $job->job_location = $request->job_location;
        $job->job_description = $request->job_description;

        $job->apply_by = $request->apply_by;
        $job->apply_by_link_Email = $request->apply_by_link_Email;
        $job->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(jobs $jobs)
    {

        return view('jobs.show', compact('jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(jobs $jobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jobs $jobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(jobs $jobs)
    {
        //
    }
}
