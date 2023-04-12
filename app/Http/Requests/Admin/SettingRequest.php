<?php

namespace Kerung\Http\Requests\Admin;

use Kerung\Http\Requests\Request;

class SettingRequest extends Request
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
            'config_meta_title' => 'required|min:3|max:200',
            'config_name' => 'required|min:3|max:200',
            'config_email' => 'required|email',
            'config_telephone' => 'required',
            'config_category_image_height' => 'required|numeric',
            'config_category_image_width' => 'required|numeric',
            'config_product_image_width' => 'required|numeric',
            'config_product_image_height' => 'required|numeric',
            'config_product_thumb_image_height' => 'required|numeric',
            'config_product_thumb_image_width' => 'required|numeric',
            'config_product_list_image_width' => 'required|numeric',
            'config_product_list_image_height' => 'required|numeric',
            'config_related_product_image_height' => 'required|numeric',
            'config_related_product_image_width' => 'required|numeric',
            'config_compare_image_width' => 'required|numeric',
            'config_compare_image_height' => 'required|numeric',
            'config_wish_list_image_height' => 'required|numeric',
            'config_wish_list_image_width' => 'required|numeric',
            'config_cart_image_width' => 'required|numeric',
            'config_cart_image_height' => 'required|numeric',
            'config_store_image_height' => 'required|numeric',
            'config_store_image_width' => 'required|numeric',
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
            'config_url' => 'Store Url',
            'config_meta_title' => 'Meta Title',
            'config_name' => 'Store Name',
            'config_owner' => 'Store Owner',
            'config_email' => 'Email',
            'config_telephone' => 'Telephone',
            'config_category_image_height' => 'Category Image Height',
            'config_category_image_width' => 'Category Image Width',
            'config_product_image_width' => 'Product Image Width',
            'config_product_image_height' => 'Product Image Height',
            'config_product_thumb_image_height' => 'Product Thumb Image Height',
            'config_product_thumb_image_width' => 'Product Thumb Image Width',
            'config_product_list_image_width' => 'Product List Image Width',
            'config_product_list_image_height' => 'Product List Image Height',
            'config_related_product_image_height' => 'Related Product Image Height',
            'config_related_product_image_width' => 'Related Product Image Width',
            'config_compare_image_width' => 'Product Compare Image Width',
            'config_compare_image_height' => 'Product Compare Image Height',
            'config_wish_list_image_height' => 'Wish List Image Height',
            'config_wish_list_image_width' => 'Wish List Image Width',
            'config_cart_image_width' => 'Cart Image Width',
            'config_cart_image_height' => 'Cart Image Height',
            'config_store_image_height' => 'Store Image Height',
            'config_store_image_width' => 'Store Image Width',
        ];
    }
}
