<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class VoucherRequest extends Request
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
            'voucher_theme_id' => 'required',
            'from_name' => 'required|min:3|max:255',
            'code' => 'required',
            'from_email' => 'required|email',
            'to_name' => 'required',
            'to_email' => 'required|email',
            'amount' => 'required'
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
            'voucher_theme_id' => 'Theme',
            'from_name' => 'Voucher from Name',
            'code' => 'Voucher Code ',
            'from_email' => 'Voucher From Email ',
            'to_name' => 'Voucher to Name ',
            'to_email' => 'Voucher to E-mail ',
            'amount' => 'Voucher Amount '
        ];
    }
}
