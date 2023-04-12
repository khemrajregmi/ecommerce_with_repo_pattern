<?php

namespace Kerung\Http\Requests\Login;

use Kerung\Http\Requests\Request;

class SignUpRequest extends Request
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
        $key = 'g-recaptcha-response';
        $check = array_keys(Request::all());
        if(in_array($key,$check)) 
           { 
            return [
                       'firstname' => 'required',
                       'g-recaptcha-response' => 'required|captcha',
                       'lastname' => 'required',
                       'email' => 'required|email',
                       'telephone' => 'required|numeric',
                       'password'  => 'required',
                       'password_confirm' => 'required|same:password'
                   ];
            }
        else
            {
            return [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'telephone' => 'required|numeric',
                'password'  => 'required',
                'password_confirm' => 'required|same:password'
            ]; 
        }
         
    }

    /**
     * Get the Validation attributes that apply the request.
     *
     * @return array
     */
    public function attributes()
    {
        return[
            'firstname' => 'Fistname',
            'lastname' => ' Lastname',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'g-recaptcha-response' => 'Captha verification',
        ];
    }
}
