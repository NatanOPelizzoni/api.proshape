<?php

namespace App\Services;

use App\Http\Requests\Exercise\StoreExerciseRequest;
use App\Http\Requests\Exercise\UpdateExerciseRequest;
use App\Repositories\ExerciseRepositoryInterface;

class ExerciseService
{
    protected $exerciseRepository;

    public function __construct(
        ExerciseRepositoryInterface $exerciseRepository
    ) {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function create(StoreExerciseRequest $request)
    {
        $data = $request->validated();
        return $this->exerciseRepository->create($data);
    }

    public function getAll()
    {
        return $this->exerciseRepository->getAll();
    }

    public function getById($id)
    {
        return $this->exerciseRepository->getById($id);
    }

    public function update(UpdateExerciseRequest $request, $id)
    {
        $data = $request->validated();
        return $this->exerciseRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->exerciseRepository->delete($id);
    }

    public function massDelete($request)
    {
        return $this->exerciseRepository->massDelete($request);
    }
}
