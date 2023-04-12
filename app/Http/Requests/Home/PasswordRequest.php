<?php

namespace Kerung\Http\Requests\Home;

use Kerung\Http\Requests\Request;

class PasswordRequest extends Request
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
            'old_password'         => 'required',
            'password'         => 'required',
            'password_confirm' => 'required|same:password'
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
            'old_password'         => 'Old Password',
            'password'         => 'Password',
            'password_confirm' => 'Confirm Password'
        ];
    }


}
