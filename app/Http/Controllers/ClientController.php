<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function store(StoreClientRequest $request): JsonResponse
    {
        return $this->clientService->create($request);
    }

    public function index(Request $request)
    {
        return $this->clientService->getAll();
    }

    public function show($id)
    {
        return $this->clientService->getById($id);
    }

    public function update(UpdateClientRequest $request, $id)
    {
        return $this->clientService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->clientService->delete($id);
    }

    public function massDelete(Request $request)
    {
        return $this->clientService->massDelete($request);
    }
}
