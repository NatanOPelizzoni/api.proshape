<?php

namespace App\Repositories;

use App\Models\User;
use App\Services\Shared\ApiResponseService;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        $user = User::create(array_merge($data, [
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]));

        return ApiResponseService::success($user, 'User Created', 201);
    }

    public function getAll()
    {
        $users = User::all();

        return ApiResponseService::success($users, 'Users Retrieved');
    }

    public function getById($id)
    {
        $user = User::find($id);

        if (!$user) {
            return ApiResponseService::error('User not found', 404);
        }

        return ApiResponseService::success($user, 'User Retrieved');
    }

    public function update(array $data, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return ApiResponseService::error('User not found', 404);
        }

        $user->update(array_merge($data, [
            'updated_by' => auth()->id(),
        ]));

        return ApiResponseService::success($user, 'User Updated');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return ApiResponseService::error('User not found', 404);
        }

        $user->delete();

        return ApiResponseService::success(null, 'User Deleted');
    }

    public function massDelete($request)
    {
        $ids = $request->input('ids');
        $users = User::whereIn('id', $ids)->get();

        if ($users->isEmpty()) {
            return ApiResponseService::error('Users not found', 404);
        }

        User::whereIn('id', $ids)->delete();

        return ApiResponseService::success(null, 'Users Deleted');
    }

    public function updateEmail($userId, $newEmail)
    {
        $user = User::find($userId);

        if (!$user) {
            return ApiResponseService::error('User not found', 404);
        }

        $user->email = $newEmail;
        $user->save();

        return ApiResponseService::success($user, 'User Email Updated');
    }
}
