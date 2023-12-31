<?php

namespace App\Http\Requests\exercise;

use Illuminate\Foundation\Http\FormRequest;

class ExercisesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'muscular_group_id' => [
                'required',
                'exists:muscular_groups,id',
            ],
        ];
    }
}
