<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponentRequest extends FormRequest
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
            'name_ar' => 'required|string|unique:components,name_ar,'.$this->component.',id,deleted_at,NULL',
           'name_en' => 'required|string|unique:components,name_en,'.$this->component.',id,deleted_at,NULL',     
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
