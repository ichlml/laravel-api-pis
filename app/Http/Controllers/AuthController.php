<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provide credentials are incorrect']
            ]);
        }
        $token = $user->createToken($request->email)->plainTextToken;
        $user->token = $token;
        
        return response()->json([
            'success' => true,
            'message' => 'login berhasil',
            'data' => [
                'username' => $user->username,
                'role' => $user->role,
                'email' => $user->email,
                'token' => $user->token,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'logout berhasil'
        ]);
    }
}
