<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAcademyRequest extends Request
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
        $rules = [
            'name' => 'bail|required|between:3,50|unique:academies',
            'username' => 'bail|required|between:3,30|unique:academies',
            'email' => 'bail|required|between:3,100|email|unique:academies',
            'phone' => 'digits_between:6,22',
            'tags' => 'required',
            'slots.*.day' => 'in:0,1,2,3,4,5,6,7',
            'slots.*.slot_from' => 'date_format:h:i A',
            'slots.*.slot_to' => 'date_format:h:i A',
            'images.*' => 'mimes:jpeg,png'
        ];

        return $rules;
    }
}
