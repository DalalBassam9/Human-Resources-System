<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEmployeeRequest extends FormRequest
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
            'name' => 'required|string',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'department_id' => 'required|integer|exists:departments,id'
        ];
    }


    protected function failedValidation(Validator $validator)
    { 

        throw new HttpResponseException(response()->json($validator->errors(),422));

    }

}
