<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
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
        session()->forget('next');
        if(auth()->user()->student->profile==null){
            return redirect()->to('profile/create');
        }
        $user = auth()->user()->load('student','student.profile');
        return view('profiles.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->student->profile != null){
            abort(403,'You already have created a profile.');
        }
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'major'=>'required|min:2',
            'bio' => 'max:1000',
            'state'=>'required',
            'gpa' => 'numeric|required|max:5|min:1'
        ]);
        if(!auth()->user()->student->profile)
            auth()->user()->student->profile()->create($validatedData);
        else{
            auth()->user()->student->profile()->update($validatedData);
        }
        return redirect()->to('skills/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('profiles.view',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $validatedData = $request->validate([
            'major'=>'required|min:2',
            'bio' => 'max:1000',
            'state'=>'required',
            'gpa' => 'numeric|required|max:5|min:1'
        ]);

        $profile->update($validatedData);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
