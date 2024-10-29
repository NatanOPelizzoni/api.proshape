<?php

namespace App\Http\Controllers;

use App\Http\Requests\BodyGroup\StoreBodyGroupRequest;
use App\Http\Requests\BodyGroup\UpdateBodyGroupRequest;
use App\Services\BodyGroupService;
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
        return $this->bodyGroupService->create($request);
    }

    public function index(Request $request)
    {
        return $this->bodyGroupService->getAll();
    }

    public function show($id)
    {
        return $this->bodyGroupService->getById($id);
    }

    public function update(UpdateBodyGroupRequest $request, $id)
    {
        return $this->bodyGroupService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->bodyGroupService->delete($id);
    }

    public function massDelete(Request $request)
    {
        return $this->bodyGroupService->massDelete($request);
    }
}
