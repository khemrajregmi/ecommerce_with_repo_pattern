<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class DiscountTypeRequest extends Request
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
            'name' => 'required|min:3|max:20'
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
            'name' => 'Discount Type '
        ];
    }
}
