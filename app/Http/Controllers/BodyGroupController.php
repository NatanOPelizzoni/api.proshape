<?php

namespace App\Http\Controllers;

use App\Http\Requests\BodyGroup\StoreBodyGroupRequest;
use App\Http\Requests\BodyGroup\UpdateBodyGroupRequest;
use App\Services\BodyGroupService;
use App\Services\Shared\ApiResponseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BodyGroupController extends Controller
{
    protected $bodyGroupService;

    public function __construct(BodyGroupService $bodyGroupService)
    {
        $this->bodyGroupService = $bodyGroupService;
    }

    public function store(StoreBodyGroupRequest $request): JsonResponse
    {
        $bodyGroup = $this->bodyGroupService->create($request);

        return ApiResponseService::success($bodyGroup, 'Body Group Created', 201);
    }

    public function index(Request $request)
    {
        $bodyGroups = $this->bodyGroupService->getAll();

        return ApiResponseService::success($bodyGroups, 'Body Groups Retrieved');
    }

    public function show($id)
    {
        $bodyGroup = $this->bodyGroupService->getById($id);

        if (!$bodyGroup) {
            return ApiResponseService::error('Body Group not found', 404);
        }

        return ApiResponseService::success($bodyGroup, 'Body Group Retrieved');
    }

    public function update(UpdateBodyGroupRequest $request, $id)
    {
        $bodyGroup = $this->bodyGroupService->update($request, $id);

        if (!$bodyGroup) {
            return ApiResponseService::error('Body Group not found', 404);
        }

        return ApiResponseService::success($bodyGroup, 'Body Group Updated');
    }

    public function destroy($id)
    {
        $bodyGroup = $this->bodyGroupService->delete($id);

        if (!$bodyGroup) {
            return ApiResponseService::error('Body Group not found', 404);
        }

        return ApiResponseService::success(null, 'Body Group Deleted');
    }

    public function massDelete(Request $request)
    {
        $bodyGroups = $this->bodyGroupService->massDelete($request);


        if (!$bodyGroups) {
            return ApiResponseService::error('Body Groups not found', 404);
        }

        return ApiResponseService::success(null, 'Body Groups Deleted');
    }
}
