<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class ProductReturnRequest extends Request
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
            'order_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'product_id' => 'required',
            'model' => 'required'
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
            'order_id' => 'Oder ID',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'product_id' => 'Product Name',
            'model' => 'Model'
        ];
    }
}
