<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
            'middleName' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
//            'role_id' => 'required|integer|exists:roles,id',
        ];
    }
}
