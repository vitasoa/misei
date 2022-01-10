<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
		$employee = request()->route('employee');
		
        return [
            'name' => 'required',
            'work_email' => 'required|email|unique:employees,work_email,'.$employee->id,
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
            'date_of_birth'  => 'nullable|date',
            'city_of_bith'  => 'nullable',
            'country_of_birth'  => 'nullable',
            'marital'  => 'nullable',
            'spouse_complete_name'  => 'nullable',
            'spouse_birthdate'  => 'nullable|date',
            'children_nbr'  => 'nullable',
            'study_field'  => 'nullable',
            'study_school'  => 'nullable',
            'user_id'  => 'nullable'
        ];
    }
}
