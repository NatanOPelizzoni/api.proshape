<?php

namespace App\Repositories;

interface ExerciseRepositoryInterface
{
    public function create(array $data);

    public function getAll();

    public function getById($id);

    public function update(array $data, $id);

    public function delete($id);

    public function massDelete($request);
}
