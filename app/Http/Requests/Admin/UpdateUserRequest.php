<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            'email' => 'required|max:255|email|unique:users,email,'.$this->route('user'),
            'role_id' => 'required|not_in:0',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'image' => 'required',
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
            'email' => 'User Email',
            'first_name' => 'User First Name',
            'last_name' => 'User Last Name',
            'image' => 'User Image',
            'role_id' => 'Role',
            'password' => 'Password',
        ];
    }
}
