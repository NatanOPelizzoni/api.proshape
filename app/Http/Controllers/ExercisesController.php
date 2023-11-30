<?php

namespace App\Http\Controllers;

use App\Http\Requests\exercise\ExercisesRequest;
use App\Services\ExerciseService;

class ExercisesController extends Controller
{
    private $exerciseService;

    public function __construct(ExerciseService $exerciseService)
    {
        $this->exerciseService = $exerciseService;
    }

    public function index()
    {
        return $this->exerciseService->getAllExercises();
    }

    public function store(ExercisesRequest $request)
    {
        return $this->exerciseService->createExercise($request);
    }

    public function show($id)
    {
        return $this->exerciseService->getExerciseById($id);
    }

    public function update(ExercisesRequest $request, $id)
    {
        return $this->exerciseService->updateExercise($request, $id);
    }

    public function destroy($id)
    {
        return $this->exerciseService->deleteExercise($id);
    }
}
