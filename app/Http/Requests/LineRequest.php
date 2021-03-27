<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LineRequest extends FormRequest
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
            'name_ar' => 'required|string|unique:lines,name_ar,'.$this->line.',id,deleted_at,NULL',
           'name_en' => 'required|string|unique:lines,name_en,'.$this->line.',id,deleted_at,NULL',     
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
