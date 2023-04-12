<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class CustomerUpdateRequest extends Request
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
            'email' => 'required|email',
            'telephone' => 'required'
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
            'firstname' => 'Customer Fistname',
            'lastname' => 'Customer Lastname',
            'email' => 'Email',
            'telephone' => 'Customer Telephone',
        ];
    }
}
