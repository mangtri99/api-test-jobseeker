<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CandidateStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:t_candidate,email',
            'phone_number' => 'nullable|unique:t_candidate,phone_number',
            'full_name' => 'required|string',
            'dob' => 'required|date_format:Y-m-d',
            'pob' => 'required|string',
            'gender' => 'required|in:M,F',
            'year_exp' => 'required',
            'last_salary' => 'nullable',
        ];
    }

}
