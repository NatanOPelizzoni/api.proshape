<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:clients,email',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
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
            'fitness_goals' => [
                'required',
                'string',
                'max:255',
            ],
            'training_frequency' => [
                'required',
                'integer',
                'between:1,7',
            ],
            'health_restrictions' => [
                'nullable',
                'string',
                'max:255',
            ],
            'preferred_workout_type' => [
                'required',
                'string',
                'max:255',
            ],
            'exercise_history' => [
                'nullable',
                'string',
                'max:255',
            ],
            'current_fitness_level' => [
                'required',
                'string',
                'max:255',
            ],
            'injuries_or_surgeries' => [
                'nullable',
                'string',
                'max:255',
            ],
            'status' => [
                'required',
                'string',
            ],
            'personal_id' => [
                'integer',
                'exists:users,id',
            ]
        ];
    }
}
