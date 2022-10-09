<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Job;
use Illuminate\Http\Request;

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
        $jobs = Job::orderBy('id','DESC')->get();
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

//        dd($request->all());
        $validatedData = null;
        if($request->has('is_remote')){
            $validatedData = $request->validate([
                    'company_name'=>'required|min:2|string|max:255',
                    'company_phone' => 'min:7|string|required',
                    'company_website'=>'url|required',
                    'company_speciality'=>'string|required|max:255',

                    'title' =>'required|min:2',
                    'type'=>'required|string',
                    'description'=>'required|min:20',
                ]
            );
            $validatedData['location'] = "Remote";
        }else{
            $validatedData = $request->validate([
                'company_name'=>'required|min:2|string|max:255',
                'company_phone' => 'min:7|string|required',
                'company_website'=>'url|required',
                'company_speciality'=>'string|required|max:255',

                'title' =>'required|min:2',
                'type'=>'required|string',
                'location' =>'string|required|max:255',
                'description'=>'required|min:20',
                ]
            );
        }





        Auth::user()->jobs()->create($validatedData);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {

        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
