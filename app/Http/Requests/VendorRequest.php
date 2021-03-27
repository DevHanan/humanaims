<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'name' => 'required|string|unique:vendors,name,'.$this->vendor.',id,deleted_at,NULL',
            'email' => 'nullable|email|unique:vendors,email,'.$this->vendor,
            'fname' =>'nullable|string|min:2|max:191',
            'lname' => 'nullable|string|min:2|max:191',
            'currency_id' => 'nullable|integer',
            'country_id' =>'nullable|integer',
            'postal_code' =>'nullable|integer',
        ];
    }

     public function attributes()
    {
        return [
            'name' => __('Full name'),
            'email' => __('Email'),
            'fname' => __('First Name'),
            'lname'  => __('Last Name'),
            'postal_code' => __('Postal Code'),
            'currency_id' => __('Currency'),
            'country_id'  => __('Country')
        ];
    }


}
