<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'fname' => 'required|string|unique:customers,fname,'.$this->customer.',id,deleted_at,NULL',
            'lname' => 'required|string|unique:customers,lname,'.$this->customer.',id,deleted_at,NULL',
            'email' => 'nullable|email|unique:customers,email,'.$this->customer,
            'phone' =>'nullable|string|max:191|min:2',
			'region_id' => 'required'

        ];
    }

     public function attributes()
    {
        return [
            'fname' => __('First name'),
'lname' => __('Last name'),
            'email' => __('Email'),
            'phone' => __('Phone'),
            
            'region_id' => __('Region '),
           
        ];
    }


}
