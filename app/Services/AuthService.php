<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data): JsonResponse
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function login(array $credentials): JsonResponse
    {
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Incorrect password'
            ], 401);
        }

        $token = auth()->attempt($credentials);

        if (!$token) {
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
