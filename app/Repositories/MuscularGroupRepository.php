<?php

namespace App\Repositories;

use App\Models\MuscularGroup;
use Illuminate\Http\JsonResponse;

class MuscularGroupRepository implements MuscularGroupRepositoryInterface
{
    public function getAllMuscularGroups(): JsonResponse
    {
        $muscularGroups = MuscularGroup::all();

        return response()->json([
            'success' => true,
            'message' => 'Muscular Group List',
            'data' => $muscularGroups
        ], 200);
    }

    public function createMuscularGroup(array $data): JsonResponse
    {
        $muscularGroup = MuscularGroup::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Muscular Group Created',
            'data' => $muscularGroup
        ], 201);
    }

    public function getMuscularGroupById($id): JsonResponse
    {
        $muscularGroup = MuscularGroup::find($id);

        if (!$muscularGroup) {
            return response()->json([
                'success' => false,
                'message' => 'Muscular Group Not Found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Muscular Group Detail',
            'data' => $muscularGroup
        ], 200);
    }

    public function getExercisesForMuscularGroup($id): JsonResponse
    {
        $muscularGroup = MuscularGroup::find($id);

        if (!$muscularGroup) {
            return response()->json([
                'success' => false,
                'message' => 'Muscular Group Not Found',
                'data' => null
            ], 404);
        }

        $exercises = $muscularGroup->exercises;

        return response()->json([
            'success' => true,
            'message' => 'Exercises for Muscular Group',
            'data' => $exercises
        ], 200);
    }

    public function updateMuscularGroup(array $data, $id): JsonResponse
    {
        $muscularGroup = MuscularGroup::find($id);

        if (!$muscularGroup) {
            return response()->json([
                'success' => false,
                'message' => 'Muscular Group Not Found',
                'data' => null
            ], 404);
        }

        $muscularGroup->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Muscular Group Updated',
            'data' => $muscularGroup
        ], 200);
    }

    public function deleteMuscularGroup($id): JsonResponse
    {
        $muscularGroup = MuscularGroup::find($id);

        if (!$muscularGroup) {
            return response()->json([
                'success' => false,
                'message' => 'Muscular Group Not Found',
                'data' => null
            ], 404);
        }

        if ($muscularGroup->exercises()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Muscular Group has associated exercises. Cannot delete.',
                'data' => null
            ], 422);
        }

        $muscularGroup->delete();

        return response()->json([
            'success' => true,
            'message' => 'Muscular Group Deleted'
        ], 200);
    }
}
