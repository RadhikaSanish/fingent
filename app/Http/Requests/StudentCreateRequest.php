<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required',
            'age'                   => 'required|numeric',
            'gender'                => 'required',
            'reporting_teacher_id'  => 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The Name field is required.',
            'age.required' => 'The Age field is required.',
            'age.numeric' => 'The Age must be a number.',
            'gender.required' => 'The Gender field is required.',
            'reporting_teacher_id.required' => 'The Reporting Teacher field is required.'
        ];
    }
}