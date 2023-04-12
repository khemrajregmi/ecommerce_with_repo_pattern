<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class OrderRequest extends Request
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
            'store' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'telephone' => 'required|numeric',
            'payment_firstname' => 'required',
            'payment_lastname' => 'required',
            'payment_address_1' => 'required',
            'payment_country_id' => 'required',
            'payment_state_id' => 'required',
            'payment_city_id' => 'required',
            'payment_area_id' => 'required',
            'shipping_firstname' => 'required',
            'shipping_lastname' => 'required',
            'shipping_address_1' => 'required',
            'shipping_country_id' => 'required',
            'shipping_state_id' => 'required',
            'shipping_city_id' => 'required',
            'shipping_area_id' => 'required',
            'shipping_method' => 'required',
            'payment_method' => 'required',
            'customer_id'=> 'required',
            'customer_group_id'=> 'required',
            'order_status_id'=> 'required'
        ];
    }

     /**
     * Get the Validation attributes that apply the request.
     *
     * @return array
     */
    public function attributes()
    {
        return[
            'store' => 'Store Name',
            'firstname' => 'Customer First Name ',
            'lastname' => 'Customer Last Name',
            'email' => 'Customer Email',
            'telephone' => 'Customer Telephone',
            'payment_firstname' => 'First Name for Payment',
            'payment_lastname' => 'Last Name for Payment',
            'payment_address_1' => 'Address for Payment',
            'payment_country_id' => 'Payment Country',
            'payment_state_id' => 'Payment State',
            'payment_city_id' => 'Payment City',
            'payment_area_id' => 'Payment Area',
            'shipping_firstname' => 'First Name for Shipping Detail ',
            'shipping_lastname' => 'Last Name for Shipping Detail',
            'shipping_address_1' => 'Address for Shipping Detail',
            'shipping_country_id' => 'Shipping Country',
            'shipping_state_id' => 'Shipping State',
            'shipping_city_id' => 'Shipping City',
            'shipping_area_id' => 'Shipping Area',
            'shipping_method' => 'Shipping Method ',
            'payment_method' => 'Payment Method ',
            'customer_id'=> 'Customer',
            'customer_group_id'=> 'Customer Group',
            'order_status_id'=> 'Order Status'
        ];
    }
}
