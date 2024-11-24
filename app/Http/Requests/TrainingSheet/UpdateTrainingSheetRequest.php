<?php

namespace App\Http\Requests\TrainingSheet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingSheetRequest extends FormRequest
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
            'client_id' => [
                'integer',
                'exists:clients,id',
            ],
            'start_date' => [
                'date',
            ],
            'end_date' => [
                'date',
                'after_or_equal:start_date',
            ],
            'status' => [
                'string',
            ],
            'exercises' => [
                'json',
            ]
        ];
    }
}
