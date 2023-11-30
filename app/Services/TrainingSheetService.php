<?php

namespace App\Services;

use App\Http\Requests\training_sheet\TrainingSheetRequest;
use App\Repositories\TrainingSheetRepositoryInterface;
use Illuminate\Http\JsonResponse;

class TrainingSheetService
{
    protected $trainingSheetRepository;

    public function __construct(TrainingSheetRepositoryInterface $trainingSheetRepository)
    {
        $this->trainingSheetRepository = $trainingSheetRepository;
    }

    public function getAllTrainingSheets(): JsonResponse
    {
        return $this->trainingSheetRepository->getAllTrainingSheets();
    }

    public function createTrainingSheet(TrainingSheetRequest $request): JsonResponse
    {
        return $this->trainingSheetRepository->createTrainingSheet($request->validated());
    }

    public function getTrainingSheetById($id): JsonResponse
    {
        return $this->trainingSheetRepository->getTrainingSheetById($id);
    }

    public function updateTrainingSheet(TrainingSheetRequest $request, $id): JsonResponse
    {
        return $this->trainingSheetRepository->updateTrainingSheet($request->validated(), $id);
    }

    public function deleteTrainingSheet($id): JsonResponse
    {
        return $this->trainingSheetRepository->deleteTrainingSheet($id);
    }
}
