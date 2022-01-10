<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required',
            'lastname'  => 'nullable',
            'work_email' => 'required|email|unique:employees,work_email',
            'job_title' => 'required',
            'photo'  => 'nullable',
            'mobile_phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'work_phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'work_location'  => 'nullable',
            'parent_id'  => 'nullable',
            'departement'  => 'nullable',
            'street'  => 'nullable',
            'city'  => 'nullable',
            'country'  => 'nullable',
            'gender'  => 'nullable',
            'date_of_birth'  => 'nullable',
            'city_of_bith'  => 'nullable',
            'country_of_birth'  => 'nullable',
            'marital'  => 'nullable',
            'spouse_complete_name'  => 'nullable',
            'spouse_birthdate'  => 'nullable',
            'children_nbr'  => 'nullable',
            'study_field'  => 'nullable',
            'study_school'  => 'nullable',
            'user_id'  => 'nullable'
        ];
    }
}
