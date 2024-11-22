<?php

namespace App\Repositories;

use App\Models\BodyGroup;
use App\Services\Shared\ApiResponseService;

class BodyGroupRepository implements BodyGroupRepositoryInterface
{
    public function create(array $data)
    {
        return BodyGroup::create(array_merge($data, [
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]));
    }

    public function getAll()
    {
        return BodyGroup::all();
    }

    public function getById($id)
    {
        $bodyGroup = BodyGroup::find($id);

        if (!$bodyGroup) {
            return null;
        }

        return $bodyGroup;
    }

    public function update(array $data, $id)
    {
        $bodyGroup = BodyGroup::find($id);

        if (!$bodyGroup) {
            return null;
        }

        $bodyGroup->update(array_merge($data, [
            'updated_by' => auth()->id(),
        ]));

        return $bodyGroup;
    }

    public function delete($id)
    {
        $bodyGroup = BodyGroup::find($id);

        if (!$bodyGroup) {
            return false;
        }

        $bodyGroup->delete();

        return true;
    }

    public function massDelete($request)
    {
        $ids = $request->input('ids');
        $bodyGroups = BodyGroup::whereIn('id', $ids)->get();

        if ($bodyGroups->isEmpty()) {
            return false;
        }

        BodyGroup::whereIn('id', $ids)->delete();

        return true;
    }
}
