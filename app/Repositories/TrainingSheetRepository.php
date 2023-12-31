<?php

namespace App\Repositories;

use App\Models\TrainingSheet;
use Illuminate\Http\JsonResponse;

class TrainingSheetRepository implements TrainingSheetRepositoryInterface
{
    public function getAllTrainingSheets(): JsonResponse
    {
        $trainingSheets = TrainingSheet::all();

        return response()->json([
            'success' => true,
            'message' => 'Training Sheet List',
            'data' => $trainingSheets
        ], 200);
    }

    public function createTrainingSheet(array $data): JsonResponse
    {
        $trainingSheet = TrainingSheet::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Training Sheet Created',
            'data' => $trainingSheet
        ], 201);
    }

    public function getTrainingSheetById($id): JsonResponse
    {
        $trainingSheet = TrainingSheet::find($id);

        if (!$trainingSheet) {
            return response()->json([
                'success' => false,
                'message' => 'Training Sheet Not Found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Training Sheet',
            'data' => $trainingSheet
        ], 200);
    }

    public function updateTrainingSheet(array $data, $id): JsonResponse
    {
        $trainingSheet = TrainingSheet::find($id);

        if (!$trainingSheet) {
            return response()->json([
                'success' => false,
                'message' => 'Training Sheet Not Found',
                'data' => null
            ], 404);
        }

        $trainingSheet->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Training Sheet Updated',
            'data' => $trainingSheet
        ], 200);
    }

    public function deleteTrainingSheet($id): JsonResponse
    {
        $trainingSheet = TrainingSheet::find($id);

        if (!$trainingSheet) {
            return response()->json([
                'success' => false,
                'message' => 'Training Sheet Not Found',
                'data' => null
            ], 404);
        }

        $trainingSheet->delete();

        return response()->json([
            'success' => true,
            'message' => 'Training Sheet Deleted',
            'data' => $trainingSheet
        ], 200);
    }
}
