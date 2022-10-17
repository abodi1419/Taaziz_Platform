<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\KAUEmailValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    /**
     * UserManagementController constructor.
     */
    public function __construct()
    {
        $this->middleware("permission:User list", ['only' => ['index']]);
        $this->middleware("permission:User edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:User delete", ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = [];
        $roles = Role::all();
        foreach ($roles as $role){
            $usersByRole = $role->users;
            if(count($usersByRole))
                array_push($users,$usersByRole);
        }
        return view("users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user() != null) {
            if (!auth()->user()->hasPermissionTo('User create')) {
                abort(403, 'Not Authorized');
            }
        }
        $roles = Role::all();
        return view("users.create",compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user() != null) {
            if (!auth()->user()->hasPermissionTo('User create')) {
                abort(403, 'Not Authorized');
            }
        }
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:10|max:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required','numeric']
                ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $role = Role::findOrFail($validatedData['role']);
        $user = User::create($validatedData);
        $user->syncRoles($role);
        return redirect()->back()->with('success',__("User was added successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!auth()->user()->hasPermissionTo('User list')) {
            if (auth()->user()->id != $user->id) {
                abort(403, 'Not Authorized');
            }
        }


        return view("users.view", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!auth()->user()->hasPermissionTo('User edit')) {
            if (auth()->user()->id != $user->id) {
                abort(403, 'Not Authorized');
            }
        }

        $roles = Role::all();
        $student = $user->student;
        return view("users.edit",compact('roles','user','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User  $user)
    {
        if (!auth()->user()->hasPermissionTo('User edit')) {
            if (auth()->user()->id != $user->id) {
                abort(403, 'Not Authorized');
            }
        }
        $validatedData=null;
        if($request->has('password')&&strlen($request->password)){
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
                'phone' => ['required', 'string', 'min:10|max:10', 'unique:users,phone,'.$user->id],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role' => ['required','numeric']
            ]);
            $validatedData['password'] = bcrypt($validatedData['password']);
        }else{
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
                'phone' => ['required', 'string', 'min:10|max:10', 'unique:users,phone,'.$user->id],
                'role' => ['required','numeric']
            ]);
        }
        $role = Role::findOrFail($validatedData['role']);

        $studentValidatedData = null;
        if($role->name=='student') {

            if($user->student!=null){
                $id = $user->student->id;
                $studentValidatedData = $request->validate([
                    'dob' => ['required', 'date'],
                    'sid' => ['required', 'numeric', 'unique:students,sid,'.$id],
                    'graduation_date' => ['required', 'date']
                ]);
            }else{
                $studentValidatedData = $request->validate([
                    'dob' => ['required', 'date'],
                    'sid' => ['required', 'numeric', 'unique:students'],
                    'graduation_date' => ['required', 'date']
                ]);
            }

            if ($request->has('is_employed')) {
                $studentValidatedData['is_employed'] = '1';
            } else {
                $studentValidatedData['is_employed'] = '0';
            }
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

        if($role->name=='student'){
            $student = $user->student;
            if($student==null){
                $user->student()->create($studentValidatedData);
            }else{
                $student->update($studentValidatedData);
            }
        }
        $user->update($validatedData);
        $user->syncRoles($role);
        return redirect()->back()->with('success',__('User updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!auth()->user()->hasPermissionTo('User delete')) {
            if (auth()->user()->id != $user->id) {
                abort(403, 'Not Authorized');
            }
        }
        $user->delete();
    }
}
