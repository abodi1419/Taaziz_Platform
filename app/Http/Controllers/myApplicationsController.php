<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class myApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $application = Auth::user()->job;
        if (Auth::user()->id !=1){
            $jobs = Job::orderBy('id','DESC')->get();
            return view('job_applications.myApplications', compact('jobs'));
        }else{
        return abort(404);
    }

    }

}
