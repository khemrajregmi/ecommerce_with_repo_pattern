<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class CountryRequest extends Request
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
            'name' => 'required|max:255',
            'iso' => 'required',
            'phone_code'=> 'required',
            'currency_name' => 'required',
            'currency_code' => 'required',
            'currency_symbol' => 'required'
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
            'name' => 'Country  Name',
            'iso' => 'Country ISO',
            'phone_code'=> 'Country Phone Code',
            'currency_name' => 'Country Currency Name',
            'currency_code' => 'Country Currency Code',
            'currency_symbol' => 'Country Currency Symbol'
        ];
    }
}
