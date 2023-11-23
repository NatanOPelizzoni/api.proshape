<?php

namespace App\Http\Controllers;

use App\Http\Requests\student\StudentRequest;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return response()->json([
            'success' => true,
            'message' => 'Student List',
            'data' => $students
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Student Created',
            'data' => $student
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // TODO: Implement show() method.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        // TODO: Implement update() method.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // TODO: Implement destroy() method.
    }
}
