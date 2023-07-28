<?php

namespace App\Http\Requests\Robot\Arbitrary;

use Illuminate\Foundation\Http\FormRequest;

class ShowRobotArbitraryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'group_id' => 'required',
            'from_date' => 'date',
            'to_date' => 'date',
        ];
    }

}
