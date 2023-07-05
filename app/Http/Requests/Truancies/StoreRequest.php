<?php

namespace App\Http\Requests\Truancies;

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
            'student_id' => 'required|array|exists:users,id',
            'teacher_id' => 'required|array|exists:users,id',
            'group_id' => 'required|array|exists:group_user,group_id',
            'item_id' => 'required|array|exists:items,id',
            'couple' => 'required|array',
            'count_hours' => 'required|array',
        ];
    }
}
//'student_id' => 'required|array',
//            'teacher_id' => 'required|array',
//            'group_id' => 'required|array',
//            'item_id' => 'required|array',
//            'couple' => 'required|array',
//            'count_hours' => 'required|array',
//            'student_id.*' => 'integer|exists:users,id',
//            'teacher_id.*' => 'integer|exists:users,id',
//            'group_id.*' => 'integer|exists:group_user,group_id',
//            'item_id.*' => 'integer|exists:items,id',
//            'couple.*' => 'required|integer',
//            'count_hours.*' => 'required|integer',
