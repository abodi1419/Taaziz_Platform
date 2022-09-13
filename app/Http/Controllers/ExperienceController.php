<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * ExperienceController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $next = session('next');
        session()->forget('num');

        return view('profiles.experiences.create',compact('next'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = null;
        if($request->has('still')){
            $validatedData = $request->validate([
                'company' => 'string|required|min:2',
                'position' => 'string|required|min:2',
                'description' => 'max:1000',
                'start' => 'date|required'
            ]);
        }else{
            $validatedData = $request->validate([
                'company' => 'string|required|min:2',
                'position' => 'string|required|min:2',
                'description' => 'max:1000',
                'start' => 'date|required',
                'end' => 'date|required|after_or_equal:start',
            ]);
        }
        auth()->user()->student->profile->experiences()->create($validatedData);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        return view('profiles.experiences.edit',compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $validatedData = null;
        if($request->has('still')){
            $validatedData = $request->validate([
                'company' => 'string|required|min:2',
                'position' => 'string|required|min:2',
                'description' => 'max:1000',
                'start' => 'date|required'
            ]);
            $validatedData['end']=null;
        }else{
            $validatedData = $request->validate([
                'company' => 'string|required|min:2',
                'position' => 'string|required|min:2',
                'description' => 'max:1000',
                'start' => 'date|required',
                'end' => 'date|required|after_or_equal:start',
            ]);
        }

        $experience->update($validatedData);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        //
    }
}
