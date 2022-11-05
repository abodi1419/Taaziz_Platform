<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Job $job) {
//        $data = $request->all();
//        dd($data);

        $validatedData =$request->validate([
            'job_id'=>['numeric','exists:jobs,id']
        ]);


        $validatedData['user_id'] = Auth::id();
//
            $user = Auth::user();
            $user->applications()->create($validatedData);
//
            return redirect()->back();



    }


    public function showApplicants(Job $job)
    {

        $job = $job->load(['applications','applications.user.student','applications.user.student.profile']);
        return view('job_applications.view_applicants', compact('job'));
    }

    public function showCandidates(Job $job)
    {

        return view('job_applications.view_candidates', compact('job'));
    }
    public function candidacy(JobApplications $jobApplication)
    {
        $jobApplication->status = 3;
        $jobApplication->save();
        return redirect()->back()->with('success','Candidate');
    }

    public function reject(JobApplications $jobApplication)
    {
        $jobApplication->status = 1;
        $jobApplication->save();
        return redirect()->back()->with('success','Rejected');
    }
    public function accept(JobApplications $jobApplication)
    {
        $jobApplication->status = 4;
        $jobApplication->save();
        $jobApplication->user->student()->update(['is_employed'=>'1']);
        return redirect()->back()->with('success','Accepted');
    }

    public function showAccepted(Job $job)
    {
        return view('job_applications.view_accepted', compact('job'));
    }

}
