<?php

namespace App\Services;

use App\Http\Requests\TrainingSheet\StoreTrainingSheetRequest;
use App\Http\Requests\TrainingSheet\UpdateTrainingSheetRequest;
use App\Repositories\TrainingSheetRepositoryInterface;

class TrainingSheetService
{
    protected $trainingSheetRepository;

    public function __construct(
        TrainingSheetRepositoryInterface $trainingSheetRepository
    ) {
        $this->trainingSheetRepository = $trainingSheetRepository;
    }

    public function create(StoreTrainingSheetRequest $request)
    {
        $data = $request->validated();
        return $this->trainingSheetRepository->create($data);
    }

    public function getAll()
    {
        return $this->trainingSheetRepository->getAll();
    }

    public function getById($id)
    {
        return $this->trainingSheetRepository->getById($id);
    }

    public function update(UpdateTrainingSheetRequest $request, $id)
    {
        $data = $request->validated();
        return $this->trainingSheetRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->trainingSheetRepository->delete($id);
    }

    public function massDelete($request)
    {
        return $this->trainingSheetRepository->massDelete($request);
    }
}
