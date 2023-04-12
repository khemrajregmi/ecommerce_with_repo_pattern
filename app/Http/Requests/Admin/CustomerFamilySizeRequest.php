<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class CustomerFamilySizeRequest extends Request
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
            'type_name' => 'required|max:255',
            'store'=>'required'
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
            'type_name' => 'Family Size ',
            'store' => 'Store Name'
        ];
    }
}
