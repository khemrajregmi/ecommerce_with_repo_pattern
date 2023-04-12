<?php

namespace Kerung\Http\Requests\Home;

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
        $key = 'g-recaptcha-response';
        $check = array_keys(Request::all());
        if(in_array($key,$check)) 
           { 
            return [
                       'author' => 'required',
                       'g-recaptcha-response' => 'required|captcha',
                       'text' => 'required',
                       'rating'  => 'required'
                   ];
            }
        else
            {
            return [
                'author' => 'Customer Name',
                'text' => 'Comment',
                'rating'  => 'Rating'
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
    return [
                'name' => 'Customer Name',
                'text' => 'Comment',
                'rating'  => 'Rating',
                'g-recaptcha-response' => 'Captcha Verification',
            ]; 
    }
}
