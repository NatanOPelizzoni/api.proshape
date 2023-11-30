<?php

namespace App\Services;

use App\Http\Requests\exercise\ExercisesRequest;
use App\Repositories\ExerciseRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ExerciseService
{
    protected $exerciseRepository;

    public function __construct(ExerciseRepositoryInterface $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function getAllExercises(): JsonResponse
    {
        return $this->exerciseRepository->getAllExercises();
    }

    public function createExercise(ExercisesRequest $request): JsonResponse
    {
        return $this->exerciseRepository->createExercise($request->validated());
    }

    public function getExerciseById($id): JsonResponse
    {
        return $this->exerciseRepository->getExerciseById($id);
    }

    public function updateExercise(ExercisesRequest $request, $id): JsonResponse
    {
        return $this->exerciseRepository->updateExercise($request->validated(), $id);
    }

    public function deleteExercise($id): JsonResponse
    {
        return $this->exerciseRepository->deleteExercise($id);
    }
}
