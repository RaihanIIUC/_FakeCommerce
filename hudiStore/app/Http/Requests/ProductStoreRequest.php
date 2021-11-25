<?php

namespace App\Http\Requests;

use App\Http\Traits\ApiResponser;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ProductStoreRequest extends FormRequest
{
    use ApiResponser;
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
            'name' => 'required',
            'description' => 'required'
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
         $response = new Response(['error' => $validator->errors()->first()], 422);
        throw new ValidationException($validator, $response);
     }
    public function messages() //OPTIONAL
    {
        return [
            'name.required' => 'name is required',
            'description.required' => 'Description is not correct'
        ];
    }
}
