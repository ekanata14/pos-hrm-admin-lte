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
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();

        if(!$user && Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect']
            ]);
        }

        $token = $user->createToken('user_login')->plainTextToken;
        return response()->json(['token' => $token]); 
    }
    
    public function register(Request $request)
    {
        $requestData = json_decode($request->getContent(), true);
        $validator = Validator::make($requestData, [
            'name' => 'required|min:2|max:255',
            'username' => 'required|min:2|max:255',
            'email' => 'required|email',    
            'address' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
            'id_role' => 'required',
        ]);

        if($validator->fails()){
            throw New ValidationException($validator);
        }

        try{
            $user = User::create($requestData);
            return response()->json(['message' => 'Registered Successfully']);
        } catch(\Exception $e){
            throw ValidationException::withMessages([
                'error' => ['Failed to create user']
            ]);
        }
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
