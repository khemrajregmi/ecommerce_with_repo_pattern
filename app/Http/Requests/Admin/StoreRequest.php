<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class StoreRequest extends Request
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
        if(Request::get('email_order') != 0){
            $email_order = 'required';
        }
        else{
            $email_order = '';
        }

        if(Request::get('sms_option') != 0)
        {
            $sms_option = 'required|numeric';
        }
        else{
            $sms_option = '';
        }
        return [
            'contact_name' => 'required|max:255',
            'contact_phone' => 'required|max:255',
            'contact_email' => 'required|max:255',
            'street' => 'required|max:255',
            'state_id' =>'required|not_in:0',
            'city_id' =>'required|not_in:0',
            'location_id' =>'required|not_in:0',
            'store_name' => 'required',
            'store_phone' => 'required',
            'order_email' => $email_order,
            'phone' => $sms_option
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
            'contact_name' => 'Contact  Name',
            'contact_phone' => 'Contact  Phone',
            'contact_email' => 'Contact  Email',
            'street' => 'Street',
            'state_id' => 'State  Name',
            'city_id' => 'City Name',
            'location_id' => 'Area  Name',
            'store_name' => 'Store  Name',
            'store_phone' => 'Store  Phone',
            'order_email' => 'Order Email',
            'phone' => 'Phone',
        ];
    }
}
