<?php

namespace App\Services;

use App\Http\Requests\exercise_training_sheet\ExerciseTrainingSheetRequest;
use App\Repositories\ExerciseTrainingSheetRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ExerciseTrainingSheetService
{
    protected $exerciseTrainingSheetRepository;

    public function __construct(ExerciseTrainingSheetRepositoryInterface $exerciseTrainingSheetRepository)
    {
        $this->exerciseTrainingSheetRepository = $exerciseTrainingSheetRepository;
    }

    public function getAllExerciseTrainingSheets(): JsonResponse
    {
        return $this->exerciseTrainingSheetRepository->getAllExerciseTrainingSheets();
    }

    public function createExerciseTrainingSheet(ExerciseTrainingSheetRequest $request): JsonResponse
    {
        return $this->exerciseTrainingSheetRepository->createExerciseTrainingSheet($request->validated());
    }

    public function getExerciseTrainingSheetById($id): JsonResponse
    {
        return $this->exerciseTrainingSheetRepository->getExerciseTrainingSheetById($id);
    }

    public function updateExerciseTrainingSheet(ExerciseTrainingSheetRequest $request, $id): JsonResponse
    {
        return $this->exerciseTrainingSheetRepository->updateExerciseTrainingSheet($request->validated(), $id);
    }

    public function deleteExerciseTrainingSheet($id): JsonResponse
    {
        return $this->exerciseTrainingSheetRepository->deleteExerciseTrainingSheet($id);
    }
}
