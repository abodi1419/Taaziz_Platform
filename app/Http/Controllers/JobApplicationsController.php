<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Job $job) {

//        if (Auth::user()) {

//            $request['job_id'] = $job->id;
            $request['job_id'] = 1;
            $request['user_id'] = Auth::id();
            $request['status'] = 2;
//
//            $user = Auth::user();
//            $user->applications()->create($request->all());
////
//            return redirect()->back();

            $data = $request->all();
            dd($data);

//        } else {
//
//            return redirect()->back();
//
//        }


    }

//    public function show()
//    {
//        //
//    }

    public function viewApplicants(Job $job)
    {
        return view('job_applications.viewApplicants', compact('job'));
    }

    public function Candidates(Job $job)
    {
        return view('job_applications.Candidates', compact('job'));
    }

    public function Accepted(Job $job)
    {
        return view('job_applications.Accepted', compact('job'));
    }

}
