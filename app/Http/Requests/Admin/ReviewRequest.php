<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class ReviewRequest extends Request
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
            'author' => 'required|min:3|max:255',
            'product_id' => 'required',
            'text' => 'required',
            'rating' => 'required',
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
            'store' => 'Store',
            'author' => 'Author ',
            'product_id' => 'Product for Review',
            'text' => 'Review Text',
            'rating' => 'Review Rating'
        ];
    }
}
