<?php

namespace App\Services;

use App\Http\Requests\muscular_group\MuscularGroupRequest;
use App\Models\MuscularGroup;
use Illuminate\Http\JsonResponse;

class MuscularGroupService
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

    public function createMuscularGroup(MuscularGroupRequest $request): JsonResponse
    {
        $muscularGroup = MuscularGroup::create($request->validated());

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

    public function updateMuscularGroup(MuscularGroupRequest $request, $id): JsonResponse
    {
        $muscularGroup = MuscularGroup::find($id);

        if (!$muscularGroup) {
            return response()->json([
                'success' => false,
                'message' => 'Muscular Group Not Found',
                'data' => null
            ], 404);
        }

        $muscularGroup->update($request->validated());

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
