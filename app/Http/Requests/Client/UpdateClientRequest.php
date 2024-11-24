<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
                'string',
                'email',
                'max:255',
                'unique:clients,email',
            ],
            'name' => [
                'string',
                'max:255',
            ],
            'birth_date' => [
                'date',
            ],
            'weight' => [
                'numeric',
            ],
            'height' => [
                'numeric',
            ],
            'fitness_goals' => [
                'string',
                'max:255',
            ],
            'training_frequency' => [
                'integer',
                'between:1,7',
            ],
            'health_restrictions' => [
                'nullable',
                'string',
                'max:255',
            ],
            'preferred_workout_type' => [
                'string',
                'max:255',
            ],
            'exercise_history' => [
                'nullable',
                'string',
                'max:255',
            ],
            'current_fitness_level' => [
                'string',
                'max:255',
            ],
            'injuries_or_surgeries' => [
                'nullable',
                'string',
                'max:255',
            ],
            'status' => [
                'string',
            ],
            'instructor_id' => [
                'integer',
                'exists:users,id',
            ]
        ];
    }
}
