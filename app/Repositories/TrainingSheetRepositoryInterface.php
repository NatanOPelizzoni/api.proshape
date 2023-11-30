<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;

interface TrainingSheetRepositoryInterface
{
    public function getAllTrainingSheets(): JsonResponse;
    public function createTrainingSheet(array $data): JsonResponse;
    public function getTrainingSheetById($id): JsonResponse;
    public function updateTrainingSheet(array $data, $id): JsonResponse;
    public function deleteTrainingSheet($id): JsonResponse;
}
