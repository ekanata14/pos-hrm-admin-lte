<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where('username', '=', $request->username)->first();

        if(!$user && Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect']
            ]);
        }

        $token = $user->createToken('user_login')->plainTextToken;
        return response()->json(['token' => $token]); 
    }
    
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required', 
            'address' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
            'id_role' => 'required'
        ]);
            User::create($validatedData);
            return response()->json(['message' => 'Registered Successfully']);
    }

    public function me(){
        return response()->json(Auth::user());
    }

    public function logout(Request $request){
        $logout = $request->user()->currentAccessToken()->delete();
        if($logout){
            return "Successfully Logout";
        }
    }
}
