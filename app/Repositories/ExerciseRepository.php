<?php

namespace App\Repositories;

use App\Models\Exercise;

class ExerciseRepository implements ExerciseRepositoryInterface
{
    public function create(array $data)
    {
        return Exercise::create(array_merge($data, [
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]));
    }

    public function getAll()
    {
        return Exercise::all();
    }

    public function getById($id)
    {
        return Exercise::find($id);
    }

    public function update(array $data, $id)
    {
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return null;
        }

        $exercise->update(array_merge($data, [
            'updated_by' => auth()->id(),
        ]));

        return $exercise;
    }

    public function delete($id)
    {
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return false;
        }

        $exercise->delete();

        return true;
    }

    public function massDelete($request)
    {
        $ids = $request->input('ids');
        $exercises = Exercise::whereIn('id', $ids)->get();

        if ($exercises->isEmpty()) {
            return false;
        }

        Exercise::whereIn('id', $ids)->delete();

        return true;
    }
}
