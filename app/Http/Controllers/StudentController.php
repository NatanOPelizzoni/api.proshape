<?php

namespace App\Http\Controllers;

use App\Http\Requests\student\StudentRequest;
use App\Services\StudentService;

class StudentController extends Controller
{
    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        return $this->studentService->getAllStudents();
    }

    public function store(StudentRequest $request)
    {
        return $this->studentService->createStudent($request);
    }

    public function show($id)
    {
        return $this->studentService->getStudentById($id);
    }

    public function update(StudentRequest $request, $id)
    {
        return $this->studentService->updateStudent($request, $id);
    }

    public function destroy($id)
    {
        return $this->studentService->deleteStudent($id);
    }
}
