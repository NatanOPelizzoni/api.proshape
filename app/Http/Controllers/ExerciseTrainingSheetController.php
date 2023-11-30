<?php

namespace App\Http\Controllers;

use App\Http\Requests\exercise_training_sheet\ExerciseTrainingSheetRequest;
use App\Services\ExerciseTrainingSheetService;

class ExerciseTrainingSheetController extends Controller
{
    private $exerciseTrainingSheetService;

    public function __construct(ExerciseTrainingSheetService $exerciseTrainingSheetService)
    {
        $this->exerciseTrainingSheetService = $exerciseTrainingSheetService;
    }

    public function index()
    {
        return $this->exerciseTrainingSheetService->getAllExerciseTrainingSheets();
    }

    public function store(ExerciseTrainingSheetRequest $request)
    {
        return $this->exerciseTrainingSheetService->createExerciseTrainingSheet($request);
    }

    public function show($id)
    {
        return $this->exerciseTrainingSheetService->getExerciseTrainingSheetById($id);
    }

    public function update(ExerciseTrainingSheetRequest $request, $id)
    {
        return $this->exerciseTrainingSheetService->updateExerciseTrainingSheet($request, $id);
    }

    public function destroy($id)
    {
        return $this->exerciseTrainingSheetService->deleteExerciseTrainingSheet($id);
    }
}
