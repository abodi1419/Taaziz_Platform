<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Rainwater\Active\Active;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employed_students = DB::table('students')->sum('is_employed');
        $students_count = DB::table('students')->count('id');
        $employers_count = DB::table('employers')->count('id');
        $jobs_count = DB::table('jobs')->count('id');
        $profiles_count = DB::table('profiles')->count('id');
        $articles_count = DB::table('articles')->count('id');
        $comments_count = DB::table('comments')->count('id');
        $likes_count = DB::table('likes')->count('id');
        $apps_count = DB::table('job_applications')->count('id');
        $accepted_apps_count = DB::table('job_applications')->where('status','=','4')->count();
        $candidate_apps_count = DB::table('job_applications')->where('status','=','3')->count();
        $applied_apps_count = DB::table('job_applications')->where('status','=','2')->count();
        $rejected_apps_count = DB::table('job_applications')->where('status','=','1')->count();
        $active_users = Active::users()->count();
        if(Auth::user()->hasRole("admin")){
            return view('home',compact('students_count','employed_students'
            ,'employers_count','jobs_count','apps_count','profiles_count'
            ,'accepted_apps_count','candidate_apps_count','applied_apps_count','rejected_apps_count'
            ,'articles_count','comments_count','likes_count','active_users'));
        }else{
            return view('home');

        }
    }
}
