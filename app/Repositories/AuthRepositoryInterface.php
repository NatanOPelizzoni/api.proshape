<?php

namespace App\Repositories;

interface AuthRepositoryInterface
{
    public function register(array $data);

    public function login(array $credentials);

    public function logout();

    public function refresh();

    public function profile();
}
