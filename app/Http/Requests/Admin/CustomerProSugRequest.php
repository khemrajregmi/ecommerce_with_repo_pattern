<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class CustomerProSugRequest extends Request
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
            'product_name' => 'required|min:3|max:255',
            'model' => 'required',
            'brand' => 'required'
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
            'name' => 'Customer Group Name',
            'model' => 'Model',
            'brand' => 'Brnad Name'
        ];
    }
}
