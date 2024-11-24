<?php

namespace App\Repositories;

use App\Models\TrainingSheet;
use App\Services\Shared\ApiResponseService;

class TrainingSheetRepository implements TrainingSheetRepositoryInterface
{
    public function create(array $data)
    {
        $trainingSheet = TrainingSheet::create(array_merge($data, [
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]));

        return ApiResponseService::success($trainingSheet, 'Training Sheet Created', 201);
    }

    public function getAll()
    {
        $trainingSheets = TrainingSheet::all();

        return ApiResponseService::success($trainingSheets, 'Training Sheets Retrieved');
    }

    public function getById($id)
    {
        $trainingSheet = TrainingSheet::find($id);

        if (!$trainingSheet) {
            return ApiResponseService::error('Training Sheet not found', 404);
        }

        return ApiResponseService::success($trainingSheet, 'Training Sheet Retrieved');
    }

    public function update(array $data, $id)
    {
        $trainingSheet = TrainingSheet::find($id);

        if (!$trainingSheet) {
            return ApiResponseService::error('Training Sheet not found', 404);
        }

        $trainingSheet->update(array_merge($data, [
            'updated_by' => auth()->id(),
        ]));

        return ApiResponseService::success($trainingSheet, 'Training Sheet Updated');
    }

    public function delete($id)
    {
        $trainingSheet = TrainingSheet::find($id);

        if (!$trainingSheet) {
            return ApiResponseService::error('Training Sheet not found', 404);
        }

        $trainingSheet->delete();

        return ApiResponseService::success(null, 'Training Sheet Deleted');
    }

    public function massDelete($request)
    {
        $ids = $request->input('ids');
        $trainingSheets = TrainingSheet::whereIn('id', $ids)->get();

        if ($trainingSheets->isEmpty()) {
            return ApiResponseService::error('Training Sheets not found', 404);
        }

        TrainingSheet::whereIn('id', $ids)->delete();

        return ApiResponseService::success(null, 'Training Sheets Deleted');
    }
}
