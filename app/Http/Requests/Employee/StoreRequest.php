<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|min:3|max:25',
            'last_name' => 'required|string|min:3|max:25',
            'date_of_birth' => 'required|date|after:1950-01-01|before:2004-01-01',
            'passport' => 'required|integer',
            'post' => 'required|string',
            'work_experience' => 'required|integer|between:0,50',
            'salary' => 'required|integer|min:500',
            'company_id' => ''
        ];

    }
}
