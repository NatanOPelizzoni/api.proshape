<?php

namespace App\Services;

use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Repositories\ClientRepositoryInterface;

class ClientService
{
    protected $clientRepository;

    public function __construct(
        ClientRepositoryInterface $clientRepository
    ) {
        $this->clientRepository = $clientRepository;
    }

    public function create(StoreClientRequest $request)
    {
        $data = $request->validated();
        return $this->clientRepository->create($data);
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
