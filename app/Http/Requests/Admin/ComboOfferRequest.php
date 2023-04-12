<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class ComboOfferRequest extends Request
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
            'combo_type_id' => 'required|not_in:0',
            'combo_name' => 'required',
            'combo_price' => 'required|numeric',
            'category_id' => 'required|not_in:0',
            'product_id' => 'required|not_in:0'

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
            'name' => 'Combo Type  Name',
            'combo_name' => 'Combo Name',
            'combo_price' => 'Combo Price',
            'category_id' => 'Category',
            'product_id' => 'Product'
        ];
    }
}
