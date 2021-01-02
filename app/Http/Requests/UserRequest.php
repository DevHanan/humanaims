<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
//            'username' => 'required|string',
//            'email' => 'required|email|unique:users,email,'.$this->user.',id,deleted_at,NULL',
            'email' => 'required|email|unique:users,email,'.$this->user,
//            'phone' => 'required|numeric|digits_between:10,25|unique:users,id,'.$this->user,
            'password' => 'nullable|required_without:_method|confirmed',
//            'role' =>'nullable',

//            'image' =>'nullable|image'

        ];
    }

    public function attributes()
    {
        return [
            'full_name' => __('Full name'),
            'email' => __('Email'),
            'password' => __('Password'),
        ];
    }
}
