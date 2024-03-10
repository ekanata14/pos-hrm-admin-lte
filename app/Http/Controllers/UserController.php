<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Users",
            'dir' => "All Users",
            'activePage' => 'user',
            'users' => User::join('roles', 'users.id_role', '=', 'roles.id_role')->select('users.*', 'roles.name_role as name_role')->get(),
        ];

        return view('pages.admin.users.index', $viewData);
        
        // return view("pages.users.user-management", [
        //     'users' => User::all(),
        //     'usersWithRoles' => DB::table('users')->join('roles', 'users.id_role', '=', 'roles.id_role')->select('users.*', 'roles.name_role as name_role')->get()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Users",
            'dir' => "Create User",
            'activePage' => 'user',
        ];

        return view('pages.admin.users.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|min:2',
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'address' => 'required|min:2',
            'phone_number' => 'required|min:2',
            'id_role' => 'required' 
        ]);

        User::create($validatedData);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $viewData = [
            'title' => "HRM System",
            'path' => "Users",
            'dir' => "Edit User",
            'activePage' => 'user',
            'user' => User::findOrFail($id),
            'roles' => Role::all(),
       ];

        return view('pages.admin.users.edit', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
        $viewData = [
            'title' => "HRM System",
            'path' => "Users",
            'dir' => "Edit User",
            'activePage' => 'user',
            'user' => User::findOrFail($id),
            'roles' => Role::all(),
       ];

        return view('pages.admin.users.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    { 
        // dd($request);
        $validatedData = $request->validate([
            'username' => 'required|max:255|min:2',
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|max:255',
            'address' => 'required|min:2',
            'phone_number' => 'required|min:5',
            'id_role' => 'required' 
        ]);

        $user = User::findOrFail($request->id_user);
        $user->update($validatedData);
        
        return redirect()->route('users.index');
    }
    
    public function updateApi(Request $request)
    { 
        $validatedData = $request->validate([
            'username' => 'required|max:255|min:2',
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|max:255',
            'address' => 'required|min:2',
            'phone_number' => 'required|min:5',
        ]);

        $user = User::findOrFail($request->id_user);
        $user->update($validatedData);
     
        return response()->json(['message' => 'User Updated Successfully']);
    }
    
    public function updatePasswordApi(Request $request)
    { 
        $validatedData = $request->validate([
            'password' => 'required',
        ]);

        $user = User::findOrFail($request->id_user);
        $hashedPassword = Hash::make($validatedData['password']);
        $user->update([$validatedData['password'] => $hashedPassword]);
     
        return response()->json(['message' => 'Password Changed Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id_user);
        $user->delete();
        return redirect('/users');
    
    }
}
