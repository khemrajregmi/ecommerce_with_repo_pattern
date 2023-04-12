<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class StoreUserRoleRequest extends Request
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
            'name' => 'required|max:255|unique:roles',
            'slug' => 'max:255|unique:roles',
            'permissions' => 'array',
        ];
    }
}
