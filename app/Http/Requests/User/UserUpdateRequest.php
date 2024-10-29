<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $userId = $this->route('id');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'string',
                'email',
                'max:255',
                'unique:users,email,' . $userId,
            ],
            'password' => [
                'string',
                'min:8',
            ],
            'status' => [
                'required',
                'string',
            ],
            'role' => [
                'required',
                'string',
            ],
        ];
    }
}
