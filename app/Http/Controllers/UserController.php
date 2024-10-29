<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(UserStoreRequest $request): JsonResponse
    {
        return $this->userService->create($request);
    }

    public function index(Request $request)
    {
        return $this->userService->getAll();
    }

    public function show($id)
    {
        return $this->userService->getById($id);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        return $this->userService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->userService->delete($id);
    }

    public function massDelete(Request $request)
    {
        return $this->userService->massDelete($request);
    }
}
