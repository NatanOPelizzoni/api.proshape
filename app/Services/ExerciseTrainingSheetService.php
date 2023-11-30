<?php

namespace App\Services;

use App\Http\Requests\exercise_training_sheet\ExerciseTrainingSheetRequest;
use App\Models\ExerciseTrainingSheet;
use Illuminate\Http\JsonResponse;

class ExerciseTrainingSheetService
{
    public function getAllExerciseTrainingSheets(): JsonResponse
    {
        $exerciseTrainingSheets = ExerciseTrainingSheet::all();

        return response()->json([
            'success' => true,
            'message' => 'Exercise Training Sheets List',
            'data' => $exerciseTrainingSheets
        ], 200);
    }

    public function createExerciseTrainingSheet(ExerciseTrainingSheetRequest $request): JsonResponse
    {
        $exerciseTrainingSheet = ExerciseTrainingSheet::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Exercise Training Sheet Created',
            'data' => $exerciseTrainingSheet
        ], 201);
    }

    public function getExerciseTrainingSheetById($id): JsonResponse
    {
        $exerciseTrainingSheet = ExerciseTrainingSheet::find($id);

        if (!$exerciseTrainingSheet) {
            return response()->json([
                'success' => false,
                'message' => 'Exercise Training Sheet Not Found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Exercise Training Sheet',
            'data' => $exerciseTrainingSheet
        ], 200);
    }

    public function updateExerciseTrainingSheet(ExerciseTrainingSheetRequest $request, $id): JsonResponse
    {
        $exerciseTrainingSheet = ExerciseTrainingSheet::find($id);

        if (!$exerciseTrainingSheet) {
            return response()->json([
                'success' => false,
                'message' => 'Exercise Training Sheet Not Found',
                'data' => null
            ], 404);
        }

        $exerciseTrainingSheet->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Exercise Training Sheet Updated',
            'data' => $exerciseTrainingSheet
        ], 200);
    }

    public function deleteExerciseTrainingSheet($id): JsonResponse
    {
        $exerciseTrainingSheet = ExerciseTrainingSheet::find($id);

        if (!$exerciseTrainingSheet) {
            return response()->json([
                'success' => false,
                'message' => 'Exercise Training Sheet Not Found',
                'data' => null
            ], 404);
        }

        $exerciseTrainingSheet->delete();

        return response()->json([
            'success' => true,
            'message' => 'Exercise Training Sheet Deleted',
            'data' => $exerciseTrainingSheet
        ], 200);
    }
}
