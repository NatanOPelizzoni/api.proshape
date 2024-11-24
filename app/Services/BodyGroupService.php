<?php

namespace App\Services;

use App\Http\Requests\BodyGroup\StoreBodyGroupRequest;
use App\Http\Requests\BodyGroup\UpdateBodyGroupRequest;
use App\Repositories\BodyGroupRepositoryInterface;

class BodyGroupService
{
    protected $bodyGroupRepository;

    public function __construct(
        BodyGroupRepositoryInterface $bodyGroupRepository
    ) {
        $this->bodyGroupRepository = $bodyGroupRepository;
    }

    public function create(StoreBodyGroupRequest $request)
    {
        $data = $request->validated();
        return $this->bodyGroupRepository->create($data);
    }

    public function getAll()
    {
        return $this->bodyGroupRepository->getAll();
    }

    public function getById($id)
    {
        return $this->bodyGroupRepository->getById($id);
    }

    public function update(UpdateBodyGroupRequest $request, $id)
    {
        $data = $request->validated();
        return $this->bodyGroupRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->bodyGroupRepository->delete($id);
    }

    public function massDelete($request)
    {
        return $this->bodyGroupRepository->massDelete($request);
    }
}
