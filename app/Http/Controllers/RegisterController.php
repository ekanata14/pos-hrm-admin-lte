<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Checkout;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required|max:255|min:2',
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'address' => 'required|min:2',
            'phone_number' => 'required|min:5',
            'password' => 'required|min:5|max:255',
            'id_role' => 'required' 
        ]);
        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/dashboard');
    }
}
