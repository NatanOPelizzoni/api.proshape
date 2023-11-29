<?php

namespace App\Http\Controllers;

use App\Http\Requests\exercise\ExercisesRequest;
use App\Models\Exercises;
use Illuminate\Http\Request;

class ExercisesController extends Controller
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
        $exercise = Exercises::all();

        return response()->json([
            'success' => true,
            'message' => 'Exercise List',
            'data' => $exercise
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExercisesRequest $request)
    {
        $exercise = Exercises::create($request->validated());

        $muscularGroupId = $request->input('muscular_group_id');
        $exercise->muscularGroups()->attach($muscularGroupId);

        return response()->json([
            'success' => true,
            'message' => 'Exercise Created',
            'data' => $exercise
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $id = $this->request->route('id');
        $exercise = Exercises::find($id);
        if(!$exercise){
            return response()->json([
                'success' => false,
                'message' => 'Exercise Not Found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Exercise Detail',
            'data' => $exercise
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExercisesRequest $request)
    {
        $id = $this->request->route('id');
        $exercise = Exercises::find($id);
        if(!$exercise){
            return response()->json([
                'success' => false,
                'message' => 'Exercise Not Found',
                'data' => null
            ], 404);
        }

        $exercise->update($request->validated());

        $muscularGroupId = $request->input('muscular_group_id');
        $exercise->muscularGroups()->sync([$muscularGroupId]);

        return response()->json([
            'success' => true,
            'message' => 'Exercise Updated',
            'data' => $exercise
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = $this->request->route('id');
        $exercise = Exercises::find($id);
        if(!$exercise){
            return response()->json([
                'success' => false,
                'message' => 'Exercise Not Found',
                'data' => null
            ], 404);
        }

        $exercise->muscularGroups()->detach();

        $exercise->delete();

        return response()->json([
            'success' => true,
            'message' => 'Exercise Deleted',
            'data' => $exercise
        ], 200);
    }
}
