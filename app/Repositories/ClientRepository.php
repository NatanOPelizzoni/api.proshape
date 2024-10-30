<?php

namespace App\Repositories;

use App\Models\Client;
use App\Services\Shared\ApiResponseService;

class ClientRepository implements ClientRepositoryInterface
{
    public function create(array $data)
    {
        $client = Client::create(array_merge($data, [
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]));

        return ApiResponseService::success($client, 'Client Created', 201);
    }

    public function getAll()
    {
        $clients = Client::all();

        return ApiResponseService::success($clients, 'Clients Retrieved');
    }

    public function getById($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return ApiResponseService::error('Client not found', 404);
        }

        return ApiResponseService::success($client, 'Client Retrieved');
    }

    public function update(array $data, $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return ApiResponseService::error('Client not found', 404);
        }

        $client->update(array_merge($data, [
            'updated_by' => auth()->id(),
        ]));

        return ApiResponseService::success($client, 'Client Updated');
    }

    public function delete($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return ApiResponseService::error('Client not found', 404);
        }

        $client->delete();

        return ApiResponseService::success(null, 'Client Deleted');
    }

    public function massDelete($request)
    {
        $ids = $request->input('ids');
        $clients = Client::whereIn('id', $ids)->get();

        if ($clients->isEmpty()) {
            return ApiResponseService::error('Clients not found', 404);
        }

        Client::whereIn('id', $ids)->delete();

        return ApiResponseService::success(null, 'Clients Deleted');
    }
}
