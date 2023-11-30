<?php

namespace App\Services;

use App\Http\Requests\student\StudentRequest;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class StudentService
{
    public function getAllStudents(): JsonResponse
    {
        $students = Student::all();

        return response()->json([
            'success' => true,
            'message' => 'Student List',
            'data' => $students
        ], 200);
    }

    public function createStudent(StudentRequest $request): JsonResponse
    {
        $student = Student::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Student Created',
            'data' => $student
        ], 201);
    }

    public function getStudentById($id): JsonResponse
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student Not Found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Student Detail',
            'data' => $student
        ], 200);
    }

    public function updateStudent(StudentRequest $request, $id): JsonResponse
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student Not Found',
                'data' => null
            ], 404);
        }

        $student->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Student Updated',
            'data' => $student
        ], 200);
    }

    public function deleteStudent($id): JsonResponse
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student Not Found',
                'data' => null
            ], 404);
        }

        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Student Deleted',
            'data' => $student
        ], 200);
    }
}
