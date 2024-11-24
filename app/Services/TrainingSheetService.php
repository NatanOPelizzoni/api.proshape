<?php

namespace App\Services;

use App\Http\Requests\TrainingSheet\StoreTrainingSheetRequest;
use App\Http\Requests\TrainingSheet\UpdateTrainingSheetRequest;
use App\Repositories\ClientRepository;
use App\Repositories\ExerciseRepository;
use App\Repositories\TrainingSheetRepositoryInterface;
use App\Services\Shared\ApiResponseService;

class TrainingSheetService
{
    protected $trainingSheetRepository;
    protected $clientRepository;
    protected $bodyGroupService;
    protected $exerciseRepository;
    protected $openAIService;

    public function __construct(
        TrainingSheetRepositoryInterface $trainingSheetRepository,
        ClientRepository $clientRepository,
        BodyGroupService $bodyGroupService,
        ExerciseRepository $exerciseRepository,
        OpenAIService $openAIService
    ) {
        $this->trainingSheetRepository = $trainingSheetRepository;
        $this->clientRepository = $clientRepository;
        $this->bodyGroupService = $bodyGroupService;
        $this->exerciseRepository = $exerciseRepository;
        $this->openAIService = $openAIService;
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

    public function generateTrainingSheet($request)
    {
        $clientData = $this->clientRepository->getById($request->client_id);

        if (!$clientData) {
            return ApiResponseService::error('Client id not founded or provided', 404);
        }

        $clientData = $clientData->only([
            'name',
            'birth_date',
            'weight',
            'height',
            'fitness_goals',
            'training_frequency',
            'health_restrictions',
            'preferred_workout_type',
            'exercise_history',
            'current_fitness_level',
            'injuries_or_surgeries',
        ]);

        $bodyGroupsData = $this->bodyGroupService->getAll()->pluck('name', 'id')->toArray();
        $exercises = $this->exerciseRepository->getAll();

        $exerciseData = [];
        foreach ($exercises as $exercise) {
            $exerciseData[] = [
                'id' => $exercise->id,
                'name' => $exercise->name,
                'body_group_name' => $bodyGroupsData[$exercise->body_group_id],
            ];
        }

        $data = [
            'client' => $clientData,
            'exercises' => $exerciseData,
        ];

        $response = $this->openAIService->generateTrainingSheet($data);

        if ($response) {
            return ApiResponseService::success($response, 'Exercises generated', 201);
        } else {
            return ApiResponseService::error(null, 'Error on generate exercises', 500);
        }
    }
}
