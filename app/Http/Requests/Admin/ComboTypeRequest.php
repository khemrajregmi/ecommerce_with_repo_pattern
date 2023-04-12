<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 11/15/16
 * Time: 10:13 AM
 */
namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class ComboTypeRequest extends Request
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
            'name' =>'required',
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
        ];
    }
}