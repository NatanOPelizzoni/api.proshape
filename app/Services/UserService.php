<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }

    public function updateEmail($userId, $newEmail)
    {
        return $this->userRepository->updateEmail($userId, $newEmail);
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function getById($id)
    {
        return $this->userRepository->getById($id);
    }

    public function update(array $data, $id)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->userRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

    public function massDelete($request)
    {
        return $this->userRepository->massDelete($request);
    }
}
