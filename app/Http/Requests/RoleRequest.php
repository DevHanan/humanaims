<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name_ar' => 'required|string|unique:roles,name_ar,'.$this->role.',id,deleted_at,NULL',
           'name_en' => 'required|string|unique:roles,name_en,'.$this->role.',id,deleted_at,NULL',  
           'permissions.*' => [
                'integer',
            ],
            'permissions'   => [
                'required',
                'array',
            ],   
        ];
    }

     public function attributes()
    {
        return [
            'name_ar' => __('Arabic Name'),
            'name_en' => __('English Name'),
            'permissions'  => __('Permissions'),
        ];
    }


}
