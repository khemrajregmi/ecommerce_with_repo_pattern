<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class AreaRequest extends Request
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
            'state_id' =>'required',
            'city_id' =>'required',
            'name' => 'required|max:255',
            'zip_code' =>'required'
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
            'state_id' =>'State Name',
            'city_id' =>'City Name',
            'name' => 'Area  Name',
            'zip_code' => 'Zipcode '
        ];
    }
}
