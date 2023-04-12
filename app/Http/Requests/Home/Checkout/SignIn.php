<?php

namespace Kerung\Http\Requests\Home\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class SignIn extends FormRequest
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

     public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function wantsJson()
    {
        return true;
    }

    public function response(array $errors)
    {
        return response()->json(['error'=>$errors]);
    }

    /**
     * Get the Validation attributes that apply the request.
     *
     * @return array
     */
    public function attributes()
    {
    return [
            'email' => 'Email ',
            'password' => 'Passowrd',
        ];
    }
}
