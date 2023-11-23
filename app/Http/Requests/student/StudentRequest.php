<?php

namespace App\Http\Requests\student;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'birth_date' => [
                'required',
                'date',
            ],
            'weight' => [
                'required',
                'numeric',
            ],
            'height' => [
                'required',
                'numeric',
            ],
            'training_goals' => [
                'required',
                'string',
            ],
            'training_frequency' => [
                'required',
                'integer',
            ],
            'health_restrictions' => [
                'nullable',
                'string',
            ],
        ];
    }
}
