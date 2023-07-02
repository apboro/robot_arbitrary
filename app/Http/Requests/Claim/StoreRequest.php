<?php

namespace App\Http\Requests\Claim;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'student_id' => 'required|integer|exists:users,id',
            'teacher_id' => 'required|integer|exists:users,id',
            'comment' => 'nullable|string',
            'claim_file' => 'required|file',
        ];
    }
}
