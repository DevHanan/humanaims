<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BillRequest extends FormRequest
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

            'date' => 'required|date',
            'expire_on' =>'required|date',
            'po_so' =>'nullable|string',
            'subheading' =>'nullable|string|max:191',
            'footer' =>'nullable|string|max:191',
            'customer_id' =>'required|integer',
            "products.*" => 'required|array',
            "products.*.product_id" => 'required|integer',
            "products.*.description" => 'required|string|max:191',
            "products.*.quantity" => 'required|numeric',
            "products.*.price" => 'required|numeric'
        ];
    }

     public function attributes()
    {
        return [
            'name' => __('Full name'),
            'email' => __('Email'),
            'phone' => __('Phone'),
            'contact1'=> __('Contact 1'),
            'contact2'=> __('Contact 2'),
            'currency_id'=> __('Currency'),
            'billing_country_id'=> __('Country'),
            'billing_state_id'=>__('State'),
            'billing_address1' => __('Address 1'),
            'billing_address2' =>__('Address 2'),
            'billing_city' => __('City'),
            'billing_postal_code' => __('Postal code'),
            'has_shipping'=> __('Has shipping ?'),
            'shipping_country_id'=> __('Country'),
            'shipping_state_id'=>__('State'),
            'shipping_address1' => __('Address 1'),
            'shipping_address2' => __('Address 2'),
            'shipping_city' => __('City'),
            'shipping_postal_code' => __('Postal code'),
            'shipping_phone' => __('Phone'),
            'shipping_ instructions' => __('Shipping instructions'),
            'account_number' => __('Account number'),
            'fax' => __('Fax'),
            'mobile' => __('Mobile'),
            'toll_free' => __('Toll free'),
            'website' => __('Website'),
            'notes' => __('Notes'),
        ];
    }


}
