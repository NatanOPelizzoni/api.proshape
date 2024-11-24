<?php

namespace App\Http\Controllers;

use App\Http\Requests\Exercise\StoreExerciseRequest;
use App\Http\Requests\Exercise\UpdateExerciseRequest;
use App\Services\ExerciseService;
use App\Services\Shared\ApiResponseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    protected $exerciseService;

    public function __construct(ExerciseService $exerciseService)
    {
        $this->exerciseService = $exerciseService;
    }

    public function store(StoreExerciseRequest $request): JsonResponse
    {
        $exercise = $this->exerciseService->create($request);
        return ApiResponseService::success($exercise, 'Exercise Created', 201);
    }

    public function index(Request $request)
    {
        $exercises = $this->exerciseService->getAll();
        return ApiResponseService::success($exercises, 'Exercises Retrieved');
    }

    public function show($id)
    {
        $exercise = $this->exerciseService->getById($id);

        if (!$exercise) {
            return ApiResponseService::error('Exercise not found', 404);
        }

        return ApiResponseService::success($exercise, 'Exercise Retrieved');
    }

    public function update(UpdateExerciseRequest $request, $id)
    {
        $exercise = $this->exerciseService->update($request, $id);

        if (!$exercise) {
            return ApiResponseService::error('Exercise not found', 404);
        }

        return ApiResponseService::success($exercise, 'Exercise Updated');
    }

    public function destroy($id)
    {
        $exercise = $this->exerciseService->delete($id);

        if (!$exercise) {
            return ApiResponseService::error('Exercise not found', 404);
        }

        return ApiResponseService::success(null, 'Exercise Deleted');
    }

    public function massDelete(Request $request)
    {
        $exercises = $this->exerciseService->massDelete($request);

        if (!$exercises) {
            return ApiResponseService::error('Exercises not found', 404);
        }

        return ApiResponseService::success(null, 'Exercises Deleted');
    }
}
