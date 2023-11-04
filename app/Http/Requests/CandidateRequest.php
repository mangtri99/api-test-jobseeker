<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
        $emailRule = 'required|email|unique:t_candidate,email';
        $phoneRule = 'nullable|unique:t_candidate,phone_number';

        // when update data, ignore unique email and phone number of current candidate
        if(request()->isMethod('PUT')){
            $emailRule = 'required|email|unique:t_candidate,email,'.$this->candidate->candidate_id . ',candidate_id';
            $phoneRule = 'nullable|unique:t_candidate,phone_number,'.$this->candidate->candidate_id . ',candidate_id';
        }
        return [
            'email' => $emailRule,
            'phone_number' => $phoneRule,
            'full_name' => 'required|string',
            'dob' => 'required|date_format:Y-m-d',
            'pob' => 'required|string',
            'gender' => 'required|in:M,F',
            'year_exp' => 'required',
            // can nullable, but if not null, must be numeric
            'last_salary' => 'nullable|numeric',
        ];
    }
}
