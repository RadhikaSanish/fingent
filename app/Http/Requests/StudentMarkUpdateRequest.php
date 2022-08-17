<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentMarkUpdateRequest extends FormRequest
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
            'student_id'            => 'required',
            'maths'                 => 'required|numeric',
            'history'               => 'required|numeric',
            'science'               => 'required|numeric',
            'term'                  =>  [
                                            'required',
                                            Rule::unique('student_marks')->where(function($query) {
                                                $query->where('term',$this->term)
                                                ->where(['student_id' => $this->student_id]);
                                            })->ignore($this->id, 'id')
                                        ],
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
            'student_id.required' => 'The Student field is required.',
            'maths.required' => 'The Maths Mark field field is required.',
            'maths.numeric' => 'The Maths Mark must be a number.',
            'history.required' => 'The History Mark field field is required.',
            'history.numeric' => 'The History Mark must be a number.',
            'science.required' => 'The Science Mark field field is required.',
            'science.numeric' => 'The Science Mark must be a number.',
            'term.required' => 'The Term field field is required.',
        ];
    }
}