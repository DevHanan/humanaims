<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecializationRequest extends FormRequest
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
            'name_ar' => 'required|string|unique:specializations,name_ar,'.$this->specialization.',id,deleted_at,NULL',
           'name_en' => 'required|string|unique:specializations,name_en,'.$this->specialization.',id,deleted_at,NULL',     
                  'parent_id' =>'nullable|integer',
        ];
    }

     public function attributes()
    {
        return [
            'name_ar' => __('Arabic name'),
            'name_en' => __('English name'),
            'parent_id'  => __('Specialization')
        ];
    }


}
