<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;

interface ExerciseRepositoryInterface
{
    public function getAllExercises(): JsonResponse;
    public function createExercise(array $data): JsonResponse;
    public function getExerciseById($id): JsonResponse;
    public function updateExercise(array $data, $id): JsonResponse;
    public function deleteExercise($id): JsonResponse;
}
