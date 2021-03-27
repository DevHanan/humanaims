<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactTypeRequest extends FormRequest
{
    /**
     * Determine if the user is anuthorized to make this request.
     *
     * @return bool
     */
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar' => 'required|string|unique:contact_msg_types,name_ar,'.$this->contact.',id,deleted_at,NULL',
           'name_en' => 'required|string|unique:contact_msg_types,name_en,'.$this->contact.',id,deleted_at,NULL',     

        ];
    }

     public function attributes()
    {
        return [
            'name_ar' => __('Arabic name'),
            'name_en' => __('English name'),

        ];
    }


}
