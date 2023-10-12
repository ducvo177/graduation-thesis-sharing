<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $user = auth()->user();
        return response()->json(['user' => $user]);
    }
}
