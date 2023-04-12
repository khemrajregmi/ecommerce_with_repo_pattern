<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
           'config_name' => 'Cakify',
           'config_logo' => '',
           'config_address' => 'kathmandu',
           'config_email' => 'khemrr067@gmail.com',
           'config_telephone' => '1234567890',
           'config_fax' => '1234567890',
           'config_meta_title' => 'Cakify',
           'config_meta_title' => 'Cakify',
           'config_about' => 'Cakify',
           'config_meta_keyword' => 'Cakify',
           'config_meta_description' => 'Cakify',
           'config_category_image_height' => '100',
           'config_category_image_width' => '100',
           'config_product_image_height' => '100',
           'config_product_image_width' => '100',
           'config_product_thumb_image_height' => '100',
           'config_product_thumb_image_width' => '100',
           'config_product_list_image_height' => '100',
           'config_product_list_image_width' => '100',
           'config_related_product_image_height' => '100',
           'config_related_product_image_width' => '100',
           'config_compare_image_height' => '100',
           'config_compare_image_width' => '100',
           'config_wish_list_image_height' => '100',
           'config_wish_list_image_width' => '100',
           'config_cart_image_height' => '100',
           'config_cart_image_width' => '100',
           'config_store_image_height' => '100',
           'config_store_image_width' => '100',
           'config_about' => 'kathmandu',
           'config_privacy_policy' => 'kathmandu',
           'config_terms_condition' => 'kathmandu',
           'config_extra' => 'kathmandu',
           'config_captcha_page' => array()

        ];
        $code = 'config';
        DB::table('kng_settings')->delete();
       foreach($data as $key=>$value) {
            if (substr($key, 0, strlen($code)) == $code) {
                if (!is_array($value)) {
                    DB::table('kng_settings')->insert(['code' => $code, 'key' => $key, 'value' => $value]);
                } else {
                    DB::table('kng_settings')->insert(['code' => $code, 'key' => $key, 'value' => json_encode($value),'serialized' =>1]);
                }
            }
        }
    }
}
