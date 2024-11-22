<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingSheet\StoreTrainingSheetRequest;
use App\Http\Requests\TrainingSheet\UpdateTrainingSheetRequest;
use App\Services\TrainingSheetService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrainingSheetController extends Controller
{
    protected $trainingSheetService;

    public function __construct(TrainingSheetService $trainingSheetService)
    {
        $this->trainingSheetService = $trainingSheetService;
    }

    public function store(StoreTrainingSheetRequest $request): JsonResponse
    {
        return $this->trainingSheetService->create($request);
    }

    public function index(Request $request)
    {
        return $this->trainingSheetService->getAll();
    }

    public function show($id)
    {
        return $this->trainingSheetService->getById($id);
    }

    public function update(UpdateTrainingSheetRequest $request, $id)
    {
        return $this->trainingSheetService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->trainingSheetService->delete($id);
    }

    public function massDelete(Request $request)
    {
        return $this->trainingSheetService->massDelete($request);
    }

    public function generateTrainingSheet(Request $request)
    {
        return $this->trainingSheetService->generateTrainingSheet($request);
    }
}
