<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;

interface MuscularGroupRepositoryInterface
{
    public function getAllMuscularGroups(): JsonResponse;
    public function createMuscularGroup(array $data): JsonResponse;
    public function getMuscularGroupById($id): JsonResponse;
    public function getExercisesForMuscularGroup($id): JsonResponse;
    public function updateMuscularGroup(array $data, $id): JsonResponse;
    public function deleteMuscularGroup($id): JsonResponse;
}
