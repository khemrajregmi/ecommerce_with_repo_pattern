<?php

namespace Kerung\Http\Requests\Home\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class Billing extends FormRequest
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
            'payment_firstname' => 'required',
            'payment_lastname' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'payment_company' => 'required',
            'payment_address_1' => 'required',
            'payment_country_id' => 'required|not_in:0',
            'payment_state_id' => 'required|not_in:0',
            'payment_city_id' => 'required|not_in:0',
            'payment_area_id' => 'required|not_in:0',
        ];
    }

    public function wantsJson()
    {
        return true;
    }

    public function response(array $errors)
    {
        return response()->json(['error'=>$errors]);
    }

    /**
     * Get the Validation attributes that apply the request.
     *
     * @return array
     */
    public function attributes()
    {
    return [
            'payment_firstname' => 'First Name for Billing',
            'payment_lastname' => 'Last Name for Billing',
            'payment_address_1' => 'Address for Billing',
            'email' => 'Email for Billing',
            'telephone' => 'Phone Contact for Billing',
            'payment_company' => 'Company Name for Billing',
            'payment_country_id' => ' Country',
            'payment_state_id' => ' State',
            'payment_city_id' => ' City',
            'payment_area_id' => ' Location',
        ];
    }
} 
