<?php

namespace App\Http\Requests\Truancies;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TruancyStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:users,id',
            'group_id' => 'required|exists:group_user,group_id',
            'item_id' => 'required|exists:items,id',
            'couple' => 'required',
            'count_hours' => 'required|array',
        ];
    }
}
