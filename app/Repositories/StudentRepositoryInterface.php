<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;

interface StudentRepositoryInterface
{
    public function getAllStudents(): JsonResponse;
    public function createStudent(array $data): JsonResponse;
    public function getStudentById($id): JsonResponse;
    public function updateStudent(array $data, $id): JsonResponse;
    public function deleteStudent($id): JsonResponse;
}
