<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->id_kantin !== null) {
                return response()->json(['user' => $user], 200);
            } else {
                return response()->json(['user' => $user], 200);
                // Auth::logout();
                // return response()->json(['error' => 'You are not authorized to access this resource'], 401);
            }
        } else {
            return response()->json(['error' => 'Invalid email or password'], 401);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }
}