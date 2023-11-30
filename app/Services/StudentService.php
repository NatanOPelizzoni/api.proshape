<?php

namespace App\Services;

use App\Http\Requests\student\StudentRequest;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\JsonResponse;

class StudentService
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAllStudents(): JsonResponse
    {
        return $this->studentRepository->getAllStudents();
    }

    public function createStudent(StudentRequest $request): JsonResponse
    {
        return $this->studentRepository->createStudent($request->validated());
    }

    public function getStudentById($id): JsonResponse
    {
        return $this->studentRepository->getStudentById($id);
    }

    public function updateStudent(StudentRequest $request, $id): JsonResponse
    {
        return $this->studentRepository->updateStudent($request->validated(), $id);
    }

    public function deleteStudent($id): JsonResponse
    {
        return $this->studentRepository->deleteStudent($id);
    }
}
