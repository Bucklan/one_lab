<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->validated())){
            return response()->json(['message' => 'success']);
        }
        return response()->json(['message' => 'login']);
    }

    public function register()
    {
        return response()->json(['message' => 'register']);
    }

    public function logout()
    {
        return response()->json(['message' => 'logout']);
    }
}