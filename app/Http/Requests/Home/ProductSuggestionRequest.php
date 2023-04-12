<?php

namespace Kerung\Http\Requests\Home;

use Kerung\Http\Requests\Request;

class ProductSuggestionRequest extends Request
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
            'product_name' => 'required',
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
            'product_name' => 'Product Name',
            'model' => 'Product Model',
            'brand' => 'Product Brand'
        ];
    }


}
