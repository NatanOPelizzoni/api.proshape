<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email', 'password']);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Incorrect password'
            ], 401);
        }

        $token = auth()->attempt($credentials);

        if(!$token) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $message = 'User successfully logged in';
        return $this->createNewToken($token, $message);
    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json([
            'message' => 'User successfully logged out'
        ], 200);
    }

    public function refresh(): JsonResponse
    {
        $token = auth()->refresh();

        $message = 'Token successfully refreshed';
        return $this->createNewToken($token, $message);
    }

    public function profile(): JsonResponse
    {
        $user = auth()->user();

        return response()->json([
            'message' => 'User profile successfully retrieved',
            'user' => $user
        ], 200);
    }

    protected function createNewToken($token, $message): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
