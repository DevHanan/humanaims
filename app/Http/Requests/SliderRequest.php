<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title_ar' => 'required|string|unique:pages,title_ar,'.$this->page.',id,deleted_at,NULL',
           'title_en' => 'required|string|unique:pages,title_en,'.$this->page.',id,deleted_at,NULL',     
            'body_ar'   => 'required',
            'body_en'   => 'required',
             'thumbnail'      => 'image|max:1000|mimes:jpeg,jpg,png',


        ];
    }

     public function attributes()
    {
        return [
            'title_ar' => __('Arabic Title'),
            'title_en' => __('English Title'),
        ];
    }


}
