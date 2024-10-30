<?php

namespace App\Repositories;

use App\Models\Exercise;
use App\Services\Shared\ApiResponseService;

class ExerciseRepository implements ExerciseRepositoryInterface
{
    public function create(array $data)
    {
        $exercise = Exercise::create(array_merge($data, [
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]));

        return ApiResponseService::success($exercise, 'Exercise Created', 201);
    }

    public function getAll()
    {
        $exercises = Exercise::all();

        return ApiResponseService::success($exercises, 'Exercises Retrieved');
    }

    public function getById($id)
    {
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return ApiResponseService::error('Exercise not found', 404);
        }

        return ApiResponseService::success($exercise, 'Exercise Retrieved');
    }

    public function update(array $data, $id)
    {
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return ApiResponseService::error('Exercise not found', 404);
        }

        $exercise->update(array_merge($data, [
            'updated_by' => auth()->id(),
        ]));

        return ApiResponseService::success($exercise, 'Exercise Updated');
    }

    public function delete($id)
    {
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return ApiResponseService::error('Exercise not found', 404);
        }

        $exercise->delete();

        return ApiResponseService::success(null, 'Exercise Deleted');
    }

    public function massDelete($request)
    {
        $ids = $request->input('ids');
        $exercises = Exercise::whereIn('id', $ids)->get();

        if ($exercises->isEmpty()) {
            return ApiResponseService::error('Exercises not found', 404);
        }

        Exercise::whereIn('id', $ids)->delete();

        return ApiResponseService::success(null, 'Exercises Deleted');
    }
}
