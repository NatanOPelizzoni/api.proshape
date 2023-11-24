<?php

namespace App\Http\Controllers;

use App\Http\Requests\student\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $request;

    public function __construct(
        Request $request,
    ){
        $this->request = $request;
    }

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
    public function show()
    {
        $id = $this->request->route('id');
        $student = Student::find($id);
        if(!$student){
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

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request)
    {
        $id = $this->request->route('id');
        $student = Student::find($id);
        if(!$student){
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = $this->request->route('id');
        $student = Student::find($id);
        if(!$student){
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
