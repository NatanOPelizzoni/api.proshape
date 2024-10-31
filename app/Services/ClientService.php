<?php

namespace App\Services;

use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Repositories\ClientRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientService
{
    protected $clientRepository;
    protected $userService;

    public function __construct(
        ClientRepositoryInterface $clientRepository,
        UserService $userService
    ) {
        $this->clientRepository = $clientRepository;
        $this->userService = $userService;
    }

    public function create(StoreClientRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();

        try {
            $randomPassword = Str::random(10);

            $user = $this->userService->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $randomPassword,
                'status' => 'A',
                'role' => 'C',
            ]);

            $user = json_decode($user->content())->data;

            $data['user_id'] = $user->id;

            $client = $this->clientRepository->create($data);

            DB::commit();

            return $client;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage().": ".$e->getLine()." - ".$e->getTraceAsString());
        }
    }

    public function getAll()
    {
        return $this->clientRepository->getAll();
    }

    public function getById($id)
    {
        return $this->clientRepository->getById($id);
    }

    public function update(UpdateClientRequest $request, $id)
    {
        $data = $request->validated();
        return $this->clientRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->clientRepository->delete($id);
    }

    public function massDelete($request)
    {
        return $this->clientRepository->massDelete($request);
    }
}
