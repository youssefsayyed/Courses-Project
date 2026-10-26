<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|Min:4',
            'age' => 'required|integer',
            'address' => 'required',
            'phone' => 'required|integer|digits:11',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name Field Reqiured',
            'name.Min' => 'must be more than 3 character',
            'age.required' => 'Age Field Reqiured',
            'age.integer' => 'Must be in numbers',
            'address.Min' => 'Address Field Reqiured',
            'phone.required' => 'Phone Field Required',
            'phone.integer' => 'Must be in numbers',
            'phone.digits' => 'Must be 11 numbers'
        ];
    }
}
