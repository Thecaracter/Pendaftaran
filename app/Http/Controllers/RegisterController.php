<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate the user
        $validatedData = $request->validate([
            'username' => 'required|unique:users|min:3|max:255',
            'password' => 'required|min:8|max:255',
            'email' => 'required|email|unique:users|max:255',
        ]);

        $user = new User();
        $user->username = $validatedData['username'];
        $user->password = Hash::make($validatedData['password']);
        $user->email = $validatedData['email'];
        $user->role = 'user';
        $user->save();

        // Set success message in session
        $request->session()->flash('success', 'User registered successfully');

        return redirect()->back();
    }
}