<?php

namespace App\Http\Requests\exercise_training_sheet;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseTrainingSheetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'training_sheet_id' => [
                'required',
                'exists:training_sheets,id'
            ],
            'exercise_id' => [
                'required',
                'exists:exercises,id'
            ],
            'series' => [
                'required',
                'integer'
            ],
            'repetitions' => [
                'required',
                'integer'
            ],
            'weight' => [
                'required',
                'numeric'
            ],
            'order' => [
                'required',
                'integer'
            ],
        ];
    }
}
