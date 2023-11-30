<?php

namespace App\Services;

use App\Http\Requests\muscular_group\MuscularGroupRequest;
use App\Repositories\MuscularGroupRepositoryInterface;
use Illuminate\Http\JsonResponse;

class MuscularGroupService
{
    protected $muscularGroupRepository;

    public function __construct(MuscularGroupRepositoryInterface $muscularGroupRepository)
    {
        $this->muscularGroupRepository = $muscularGroupRepository;
    }

    public function getAllMuscularGroups(): JsonResponse
    {
        return $this->muscularGroupRepository->getAllMuscularGroups();
    }

    public function createMuscularGroup(MuscularGroupRequest $request): JsonResponse
    {
        return $this->muscularGroupRepository->createMuscularGroup($request->validated());
    }

    public function getMuscularGroupById($id): JsonResponse
    {
        return $this->muscularGroupRepository->getMuscularGroupById($id);
    }

    public function getExercisesForMuscularGroup($id): JsonResponse
    {
        return $this->muscularGroupRepository->getExercisesForMuscularGroup($id);
    }

    public function updateMuscularGroup(MuscularGroupRequest $request, $id): JsonResponse
    {
        return $this->muscularGroupRepository->updateMuscularGroup($request->validated(), $id);
    }

    public function deleteMuscularGroup($id): JsonResponse
    {
        return $this->muscularGroupRepository->deleteMuscularGroup($id);
    }
}
