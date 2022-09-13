<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Rules\KAUEmailValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    /**
     * StudentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['create','store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = auth()->user();
        $student = $user->student;
        return view('students.index',compact('user','student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()!=null){
            abort(404);
        }
        return view("students.create");
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',new KAUEmailValidation(), 'unique:users'],
            'phone' => ['required', 'string', 'min:10|max:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob' => ['required','date'],
            'sid' => ['required','numeric','unique:students'],
            'graduation_date'=>['required','date']
        ]);
        if ($request->has('is_employed')){
            $validatedData['is_employed']='1';
        }else{
            $validatedData['is_employed']='0';
        }
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        $user->student()->create($validatedData);
        $user->syncRoles('student');
        if(auth()->attempt(array('email' => $validatedData['email'], 'password' => $request->password))){
            return redirect()->to('/');
        }else{

            return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');

        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $user = auth()->user();
        if($student->user->id!=$user->id){
            abort(403,'Not authorized');
        }
        $roles = Role::all();
        $user = $student->user;
        return view("students.edit",compact('roles','user','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $user = auth()->user();
        if($student->user->id!=$user->id){
            abort(403,'Not authorized');
        }

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',new KAUEmailValidation(), 'unique:users,email,'.$user->id],
            'phone' => ['required', 'string', 'min:10|max:10', 'unique:users,phone,'.$user->id],
            'dob' => ['required','date'],
            'sid' => ['required','numeric','unique:students,sid,'.$student->id],
            'graduation_date'=>['required','date']
        ]);
        if ($request->has('is_employed')){
            $validatedData['is_employed']='1';
        }else{
            $validatedData['is_employed']='0';
        }
        if($request->password!=null){
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
            $validatedData['password']=bcrypt($request->password);
        }
        $file=$request->file('image');
        if($file!=null){
            $request->validate([
                'image'=>'required|mimes:jpeg,jpg,png,svg|required|max:10000'
            ]);
            $fileName =time().'.'.$file->getClientOriginalExtension();
            $upload = ['file_name'=>$fileName];
            if(is_file($user->image)&&!str_contains($user->image,"default.png"))
                unlink($user->image);
            Storage::disk('local')->putFileAs(
                'public/uploads/icons/',
                $file,
                $fileName
            );
            $validatedData['image']='storage/uploads/icons/'.$fileName;

        }

        $student->update($validatedData);
        $user->update($validatedData);
        $user->syncRoles('student');
        return redirect()->back()->with('success',__("User was updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $user = auth()->user();
        if($student->user->id!=$user->id){
            abort(403,'Not authorized');
        }
    }
}
