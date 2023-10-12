<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['message' => 'Login successful', 'token' => $token, 'user' => $user]);
        } else {
            return response()->json(['message' => 'Login failed'], 401);
        }
    }

    public function logout()
    {
        $user = Auth::user();
        $user->token()->revoke();
        return response()->json(['message' => 'Logout successful']);
    }
}
