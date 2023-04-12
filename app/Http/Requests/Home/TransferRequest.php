<?php

namespace Kerung\Http\Requests\Home;

use Kerung\Http\Requests\Request;

class TransferRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'amount'=>'required|integer',

        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'amount.required' => 'Amount is required',
        ];
    }
}
