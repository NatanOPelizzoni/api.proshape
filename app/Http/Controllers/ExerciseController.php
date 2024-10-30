<?php

namespace App\Http\Controllers;

use App\Http\Requests\Exercise\StoreExerciseRequest;
use App\Http\Requests\Exercise\UpdateExerciseRequest;
use App\Services\ExerciseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    protected $exerciseService;

    public function __construct(ExerciseService $exerciseService)
    {
        $this->exerciseService = $exerciseService;
    }

    public function store(StoreExerciseRequest $request): JsonResponse
    {
        return $this->exerciseService->create($request);
    }

    public function index(Request $request)
    {
        return $this->exerciseService->getAll();
    }

    public function show($id)
    {
        return $this->exerciseService->getById($id);
    }

    public function update(UpdateExerciseRequest $request, $id)
    {
        return $this->exerciseService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->exerciseService->delete($id);
    }

    public function massDelete(Request $request)
    {
        return $this->exerciseService->massDelete($request);
    }
}
