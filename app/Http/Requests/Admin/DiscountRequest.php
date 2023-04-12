<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class DiscountRequest extends Request
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

        
        //    return [
        //     'name' => 'required',
        //     'store' => 'required',
        //     'discount_type_id' => 'required'
            
        // ];
        if(Request::get('discount_type_id') == 0){
           return [
            'name' => 'required',
            'store' => 'required',
            'discount_type_id' => 'required'
            
        ]; 
        }

        if(Request::get('discount_type_id') == 1){
           return [
            'name' => 'required',
            'store' => 'required',
            'discount_type_id' => 'required',
            'category1' => 'required',
            'product_id' => 'required',
            'product_per_percentage' => 'required'
            
        ]; 
        }
        if(Request::get('discount_type_id') == 2){
           return [
            'store' => 'required',
            'name' => 'required',
            'discount_type_id' => 'required',
            'category_fixprice' => 'required',
            'product_id' => 'required',
            'fixed_price_amount' => 'required'
            
        ]; 
        }

        if(Request::get('discount_type_id') == 3){
           return [
            'name' => 'required',
            'store' => 'required',
            'discount_type_id' => 'required',
            'discount_total_bill_amount' => 'required',
            'discount_total_bill_percent' => 'required'
            
        ]; 
        }

        if(Request::get('discount_type_id') == 4){
           return [
            'name' => 'required',
            'store' => 'required',
            'discount_type_id' => 'required',
            'category_priceoff' => 'required',
            'product_id' => 'required',
            'priceoff_bundel_amount' => 'required'
            
        ]; 
        }

        if(Request::get('discount_type_id') == 5){
           return [
            'name' => 'required',
            'store' => 'required',
            'discount_type_id' => 'required'
            // 'product_id' => 'required',
            // 'fixed_price_amount' => 'required'
            
        ]; 
        }

        if(Request::get('discount_type_id') == 6){
           return [
            'name' => 'required',
            'store' => 'required',
            'discount_type_id' => 'required',
            'categorywise' => 'required',
            'category_discount_type' => 'required'
            
        ];

            // if(Request::get('category_discount_type') == 1)
            // {
            //    return [
            //     'category_discount_percent' => 'required'
                
            //     ];  
            // }
            // else
            // {
            //    return [
            //     'category_discount_amount' => 'required'
                
            //     ];  
            // }
        }

        if(Request::get('discount_type_id') == 7){
           return [
            'name' => 'required',
            'store' => 'required',
            'discount_type_id' => 'required',
            'category_bulkorder' => 'required',
            'product_id' => 'required',
            'bulk_order_type' => 'required'
            
        ]; 
        }

        if(Request::get('discount_type_id') == 8){
           return [
            'name' => 'required',
            'store' => 'required',
            'discount_type_id' => 'required',
            'category_buy_getoffer' => 'required',
            'product_id' => 'required',
            'buy_quantity' => 'required',
            'get_product' => 'required'
            
        ]; 
        }

        if(Request::get('discount_type_id') == 9){
           return [
            'name' => 'required',
            'category_free' => 'required',
            'discount_type_id' => 'required',
            'product_id' => 'required'
            
        ]; 
        }

        if(Request::get('discount_type_id') == 10){
           return [
            'name' => 'required',
            'discount_type_id' => 'required',
            'category' => 'required',
            'product_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
            
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
            'name' => 'Discount Name ',
            'store' => 'Store Name ',
            'discount_type_id' => 'Discount Type ',
            'product_id' => 'Product  Name',
            'product_per_percentage' => 'Percentage Amount',
            'fixed_price_amount' => 'Fixed Price Amount',
            'discount_total_bill_amount' => 'Total Amount for Discount',
            'discount_total_bill_percent' => 'Percentage Amount for Total Bill Discount',
            'priceoff_bundel_amount' => 'Amount for Bundling of Product',
            'category_discount_type' => 'Type for Categorywise Discount',
            'bulk_order_type' => 'Discount Type for Bulk Order',
            'buy_quantity' => 'Buy Quantity for Buy n Get n Free',
            'get_product' => 'Get Quantity for Buy n Get n Free',
            'start_date' => 'Start Date for Deal Of The Day',
            'end_date' => 'End Date for Deal Of The Day',
            'category1' => 'Category for % Discount Productwise',
            'category_fixprice' => 'Category for Fixed Price Off',
            'category_priceoff' => 'Category for Bundling of Product',
            'categorywise' => 'Category for Categorywise Discount',
            'category_bulkorder' => 'Category for Bulk Order Discount',
            'category_buy_getoffer' => 'Category for Buy (n) get (n)',
            'category_free' => 'Category for Free Product',
            'category' => 'Category for Deal Of the Day '
        ];
    }
}
