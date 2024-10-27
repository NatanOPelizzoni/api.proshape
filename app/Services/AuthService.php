<?php

namespace App\Services;

use App\Repositories\AuthRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthService
{
    protected $authRepository;

    public function __construct(
        AuthRepositoryInterface $authRepository
    ) {
        $this->authRepository = $authRepository;
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);
        $user = $this->authRepository->login($credentials);

        if ($user) {
            $success['token'] = $user->createToken('ProShapeUserToken')->plainTextToken;
            $success['name'] = $user->name;

            return response()->json([
                'success' => $success,
                'message' => 'User login successfully.'
            ], 200);
        } else {
            return response()->json([
                'error' => 'Unauthorised',
                'message' => 'Unauthorised'
            ], 401);
        }
    }
}
