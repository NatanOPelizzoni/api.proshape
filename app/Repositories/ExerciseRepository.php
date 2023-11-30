<?php

namespace App\Repositories;

use App\Models\Exercises;
use Illuminate\Http\JsonResponse;

class ExerciseRepository implements ExerciseRepositoryInterface
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

    public function createExercise(array $data): JsonResponse
    {
        $exercise = Exercises::create($data);

        $muscularGroupId = $data['muscular_group_id'];
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

    public function updateExercise(array $data, $id): JsonResponse
    {
        $exercise = Exercises::find($id);

        if (!$exercise) {
            return response()->json([
                'success' => false,
                'message' => 'Exercise Not Found',
                'data' => null
            ], 404);
        }

        $exercise->update($data);

        $muscularGroupId = $data['muscular_group_id'];
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
