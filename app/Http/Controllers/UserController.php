<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
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

    public function store(UserRequest $request): JsonResponse
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

    public function update(UserRequest $request, $id)
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
