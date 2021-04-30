<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillsRequest extends FormRequest
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
            'send_name' => 'required',
            'receiv_name' => 'required',
            'no_order' => 'required',
            'send_addres' => 'required',
            'receive_addres' => 'required|string',
            'payment_method' => 'required',
            'date_arrive' => 'required',
            'paymen_total' => 'required',
            'send_phone' => 'required',
            'receiv_phone' => 'required',

        ];
    }
}
