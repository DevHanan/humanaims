<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_ar' => 'required|string|min:2|max:191',
            'name_en' => 'required|string|min:2|max:191',
            'description_ar' =>'string|nullable|min:3|max:1000',
            'description_en' =>'string|nullable|min:3|max:1000',
            'price' => 'numeric'
        ];
    }

     public function attributes()
    {
        return [
            'name_ar' => __('Arabic Name'),
            'name_en' => __('English Name'),
            'description_ar' => __('Arabic Description'),
            'description_en' => __('English Description'),
            'price' => __('Price')
            ];
    }

   

}
