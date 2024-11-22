<?php

namespace App\Repositories;

use App\Models\Client;
use App\Services\Shared\ApiResponseService;

class ClientRepository implements ClientRepositoryInterface
{
    public function create(array $data)
    {
        return Client::create(array_merge($data, [
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]));
    }

    public function getAll()
    {
        return Client::all();
    }

    public function getById($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return null;
        }

        return $client;
    }

    public function update(array $data, $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return null;
        }

        $client->update(array_merge($data, [
            'updated_by' => auth()->id(),
        ]));

        return $client;
    }

    public function delete($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return false;
        }

        $client->delete();

        return true;
    }

    public function massDelete($request)
    {
        $ids = $request->input('ids');
        $clients = Client::whereIn('id', $ids)->get();

        if ($clients->isEmpty()) {
            return false;
        }

        Client::whereIn('id', $ids)->delete();

        return true;
    }
}
