<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;

interface ExerciseTrainingSheetRepositoryInterface
{
    public function getAllExerciseTrainingSheets(): JsonResponse;
    public function createExerciseTrainingSheet(array $data): JsonResponse;
    public function getExerciseTrainingSheetById($id): JsonResponse;
    public function updateExerciseTrainingSheet(array $data, $id): JsonResponse;
    public function deleteExerciseTrainingSheet($id): JsonResponse;
}
