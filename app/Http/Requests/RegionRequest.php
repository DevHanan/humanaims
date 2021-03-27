<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionRequest extends FormRequest
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
            'name_ar' => 'required|string|unique:regions,name_ar,'.$this->region.',id,deleted_at,NULL',
           'name_en' => 'required|string|unique:regions,name_en,'.$this->region.',id,deleted_at,NULL',     
                  'parent_id' =>'nullable|integer',
        ];
    }

     public function attributes()
    {
        return [
            'name_ar' => __('Arabic name'),
            'name_en' => __('English name'),
            'parent_id'  => __('region')
        ];
    }


}
