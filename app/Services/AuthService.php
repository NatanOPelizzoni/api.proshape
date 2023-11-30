<?php

namespace App\Services;

use App\Repositories\AuthRepositoryInterface;
use Illuminate\Http\JsonResponse;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $data): JsonResponse
    {
        $user = $this->authRepository->register($data);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function login(array $credentials): JsonResponse
    {
        $token = $this->authRepository->login($credentials);

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
        $this->authRepository->logout();

        return response()->json([
            'message' => 'User successfully logged out'
        ], 200);
    }

    public function refresh(): JsonResponse
    {
        $token = $this->authRepository->refresh();

        $message = 'Token successfully refreshed';
        return $this->createNewToken($token, $message);
    }

    public function profile(): JsonResponse
    {
        $user = $this->authRepository->profile();

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
