<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    /**
     * UserManagementController constructor.
     */
    public function __construct()
    {
        $this->middleware("permission:User list", ['only' => ['index', 'show']]);
        $this->middleware("permission:User edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:User create", ['only' => ['create', 'store']]);
        $this->middleware("permission:User delete", ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:10|max:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required','numeric']
                ]);
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
        $roles = Role::all();
        return view("users.edit",compact('roles','user'));
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
        //
    }
}
