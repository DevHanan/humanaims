<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'site_name_ar' => 'required|string',
           'site_name_en' => 'required|string', 
           'email'  => 'required|email' ,
           'facebook'  => 'required|url',
           'twitter'  => 'required|url',   
                      'youtube'  => 'required|url',   

           'instagram'  => 'required|url',
           'andriod' =>'url',
           'ios' => 'url'   

        ];
    }

     public function attributes()
    {
        return [
            'site_name_ar' => __('back.Arabic Site Name'),
            'site_name_en' => __('back.English  Site Name'),
            'email'        => __('back.Email'),
            'facebook'    => __('back.Facebook'),
            'twitter'    => __('back.Twitter'),
            'youtube'    => __('back.Youtube'),
            'instagram'    => __('back.Instagram'),

        ];
    }


}
