<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AllOrdrsRequest extends FormRequest
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
            'num_phone' => 'required',
            'date_order' => 'required',
            'num_order' => 'required',
            'sales_channel' => 'required',
            'adress_clinte' => 'required|string',
            'name_clinte' => 'required|string',
            'profits' => 'required',
            'total_sales' => 'required',
            'customer_evaluation' => 'required',
            'nots' => 'required',
            'policy_number' => 'required',
            'cost_order' => 'required',
            'net_shipping' => 'required',
            'order_won' => 'required',
            'shipping_price' => 'required',
            'total_value_order' => 'required',
            'shipping_company' => 'required',
            'num_products' => 'required',
            'total_price_products' => 'required',
            'discount' => 'required',
            'status_order' => 'required',
            'components_order' => 'required',
            'gifts' => 'required',
        ];
    }
}
