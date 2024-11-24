<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Services\ClientService;
use App\Services\Shared\ApiResponseService;
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
        $client = $this->clientService->create($request);
        return ApiResponseService::success($client, 'Client Created', 201);
    }

    public function index(Request $request)
    {
        $clients = $this->clientService->getAll();
        return ApiResponseService::success($clients, 'Clients Retrieved');
    }

    public function show($id)
    {
        $client = $this->clientService->getById($id);

        if (!$client) {
            return ApiResponseService::error('Client not found', 404);
        }

        return ApiResponseService::success($client, 'Client Retrieved');
    }

    public function update(UpdateClientRequest $request, $id)
    {
        $client = $this->clientService->update($request, $id);

        if (!$client) {
            return ApiResponseService::error('Client not found', 404);
        }

        return ApiResponseService::success($client, 'Client Updated');
    }

    public function destroy($id)
    {
        $client = $this->clientService->delete($id);

        if (!$client) {
            return ApiResponseService::error('Client not found', 404);
        }

        return ApiResponseService::success(null, 'Client Deleted');
    }

    public function massDelete(Request $request)
    {
        $clients = $this->clientService->massDelete($request);

        if (!$clients) {
            return ApiResponseService::error('Clients not found', 404);
        }

        return ApiResponseService::success(null, 'Clients Deleted');
    }
}
