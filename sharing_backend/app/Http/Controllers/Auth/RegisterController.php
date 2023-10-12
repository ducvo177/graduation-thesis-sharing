<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'string', // Thêm trường địa chỉ
            'phone' => 'string', // Thêm trường số điện thoại
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'address' => $validatedData['address'], // Lưu trường địa chỉ vào cơ sở dữ liệu
            'phone' => $validatedData['phone'], // Lưu trường số điện thoại vào cơ sở dữ liệu
        ]);

        return response()->json(['message' => 'Registration successful', 'user' => $user]);
    }
}
