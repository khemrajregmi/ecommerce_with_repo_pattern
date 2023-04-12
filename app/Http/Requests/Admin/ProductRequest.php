<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class ProductRequest extends Request
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
            'category'=>'required',
            'store'=>'required',
            'price'=>'required',
            'name' => 'required|min:3|max:255',
            'meta_title' => 'required',
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
            'category'=>'Category',
            'store'=>'Store',
            'price'=>'Product Price',
            'name' => 'Product Name ',
            'meta_title' => 'Product Meta Tag Title',
            'model' => 'Product Model '
        ];
    }
}
