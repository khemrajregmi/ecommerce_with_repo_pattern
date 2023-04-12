<?php

namespace Kerung\Http\Requests\Home;

use Kerung\Http\Requests\Request;

class CheckoutRequest extends Request
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'shipping_method' => 'required',
            'payment_method' => 'required'
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
            'firstname' => 'Customer First Name ',
            'lastname' => 'Customer Last Name',
            'email' => 'Customer Email',
            'shipping_method' => 'Shipping Method ',
            'payment_method' => 'Payment Method '
        ];
    }
}
