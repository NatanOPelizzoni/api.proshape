<?php

namespace App\Repositories;

use App\Models\BodyGroup;
use App\Services\Shared\ApiResponseService;

class BodyGroupRepository implements BodyGroupRepositoryInterface
{
    public function create(array $data)
    {
        $bodyGroup = BodyGroup::create(array_merge($data, [
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]));

        return ApiResponseService::success($bodyGroup, 'Body Group Created', 201);
    }

    public function getAll()
    {
        $bodyGroups = BodyGroup::all();

        return ApiResponseService::success($bodyGroups, 'Body Groups Retrieved');
    }

    public function getById($id)
    {
        $bodyGroup = BodyGroup::find($id);

        if (!$bodyGroup) {
            return ApiResponseService::error('Body Group not found', 404);
        }

        return ApiResponseService::success($bodyGroup, 'Body Group Retrieved');
    }

    public function update(array $data, $id)
    {
        $bodyGroup = BodyGroup::find($id);

        if (!$bodyGroup) {
            return ApiResponseService::error('Body Group not found', 404);
        }

        $bodyGroup->update(array_merge($data, [
            'updated_by' => auth()->id(),
        ]));

        return ApiResponseService::success($bodyGroup, 'Body Group Updated');
    }

    public function delete($id)
    {
        $bodyGroup = BodyGroup::find($id);

        if (!$bodyGroup) {
            return ApiResponseService::error('Body Group not found', 404);
        }

        $bodyGroup->delete();

        return ApiResponseService::success(null, 'Body Group Deleted');
    }

    public function massDelete($request)
    {
        $ids = $request->input('ids');
        $bodyGroups = BodyGroup::whereIn('id', $ids)->get();

        if ($bodyGroups->isEmpty()) {
            return ApiResponseService::error('Body Groups not found', 404);
        }

        BodyGroup::whereIn('id', $ids)->delete();

        return ApiResponseService::success(null, 'Body Groups Deleted');
    }
}
