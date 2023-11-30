<?php

namespace App\Http\Controllers;

use App\Http\Requests\muscular_group\MuscularGroupRequest;
use App\Services\MuscularGroupService;

class MuscularGroupController extends Controller
{
    private $muscularGroupService;

    public function __construct(MuscularGroupService $muscularGroupService)
    {
        $this->muscularGroupService = $muscularGroupService;
    }

    public function index()
    {
        return $this->muscularGroupService->getAllMuscularGroups();
    }

    public function store(MuscularGroupRequest $request)
    {
        return $this->muscularGroupService->createMuscularGroup($request);
    }

    public function show($id)
    {
        return $this->muscularGroupService->getMuscularGroupById($id);
    }

    public function showExercises($id)
    {
        return $this->muscularGroupService->getExercisesForMuscularGroup($id);
    }

    public function update(MuscularGroupRequest $request, $id)
    {
        return $this->muscularGroupService->updateMuscularGroup($request, $id);
    }

    public function destroy($id)
    {
        return $this->muscularGroupService->deleteMuscularGroup($id);
    }
}
