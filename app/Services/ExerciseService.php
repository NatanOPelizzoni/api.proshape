<?php

namespace App\Services;

use App\Http\Requests\exercise\ExercisesRequest;
use App\Models\Exercises;
use Illuminate\Http\JsonResponse;

class ExerciseService
{
    public function getAllExercises(): JsonResponse
    {
        $exercises = Exercises::all();

        return response()->json([
            'success' => true,
            'message' => 'Exercise List',
            'data' => $exercises
        ], 200);
    }

    public function createExercise(ExercisesRequest $request): JsonResponse
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

    public function getExerciseById($id): JsonResponse
    {
        $exercise = Exercises::find($id);

        if (!$exercise) {
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

    public function updateExercise(ExercisesRequest $request, $id): JsonResponse
    {
        $exercise = Exercises::find($id);

        if (!$exercise) {
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

    public function deleteExercise($id): JsonResponse
    {
        $exercise = Exercises::find($id);

        if (!$exercise) {
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
