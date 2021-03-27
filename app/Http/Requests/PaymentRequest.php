<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'date' => 'required|string',
            'note' => 'required|string|max:191',
            'amount' => 'required|numeric',
            'payment_method_id' => 'required|integer',
            'account_id' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [

            'date' => __('Date'),
            'note' => __('Note'),
            'amount' => __('Amount'),
            'payment_method_id' => __('Payment method'),
            'account_id' => __('Account'),
        ];
    }
}
