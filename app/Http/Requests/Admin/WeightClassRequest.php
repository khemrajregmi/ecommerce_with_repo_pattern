<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class WeightClassRequest extends Request
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
            'title' => 'required|min:3|max:32',
            'unit' => 'required'
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
            'title' => 'Weight Title',
            'unit' => 'Weight Unit'
        ];
    }
}
