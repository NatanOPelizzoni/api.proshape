<?php

namespace App\Http\Controllers;

use App\Http\Requests\training_sheet\TrainingSheetRequest;
use App\Services\TrainingSheetService;

class TrainingSheetController extends Controller
{
    private $trainingSheetService;

    public function __construct(TrainingSheetService $trainingSheetService)
    {
        $this->trainingSheetService = $trainingSheetService;
    }

    public function index()
    {
        return $this->trainingSheetService->getAllTrainingSheets();
    }

    public function store(TrainingSheetRequest $request)
    {
        return $this->trainingSheetService->createTrainingSheet($request);
    }

    public function show($id)
    {
        return $this->trainingSheetService->getTrainingSheetById($id);
    }

    public function update(TrainingSheetRequest $request, $id)
    {
        return $this->trainingSheetService->updateTrainingSheet($request, $id);
    }

    public function destroy($id)
    {
        return $this->trainingSheetService->deleteTrainingSheet($id);
    }
}
