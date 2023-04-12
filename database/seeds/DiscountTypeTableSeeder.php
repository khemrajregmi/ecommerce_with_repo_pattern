<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\DiscountType;

class DiscountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_discounttype_store')->delete();
        DB::table('kng_discount_types')->delete();

        DiscountType::insert([
            [
                'discount_type_id'=>1,
                'name'=>'% Discount Product Wise',
                'status'=>'1'
            ],
            [
                'discount_type_id'=>2,
                'name'=>'Fix Price Off (e.g. Rs 20 Off)',
                'status'=>'1'
            ],
            [
                'discount_type_id'=>3,
                'name'=>'% Discount on Total Bill',
                'status'=>'1'
            ],
            [
                'discount_type_id'=>4,
                'name'=>'Price Off: Bundling of Product
',
                'status'=>'1'
            ],
            [
                'discount_type_id'=>5,
                'name'=>'Create Your Discount List',
                'status'=>'1'
            ],
            [
                'discount_type_id'=>6,
                'name'=>'Category Discount',
                'status'=>'1'
            ],
            [
                'discount_type_id'=>7,
                'name'=>'Bulk Order Discount',
                'status'=>'1'
            ],
            [
                'discount_type_id'=>8,
                'name'=>'Buy 1 Get 1 Free',
                'status'=>'1'
            ],
            [
                'discount_type_id'=>9,
                'name'=>'Free Product',
                'status'=>'1'
            ],
            [
                'discount_type_id'=>10,
                'name'=>'Deal of the Day',
                'status'=>'1'
            ],
        ]);

        DB::table('kng_discounttype_store')->insert([
        [
          'discount_type_id' => 1,
          'store_id' => 1
        ],
        [
          'discount_type_id' => 2,
          'store_id' => 1
        ],
        [
          'discount_type_id' => 3,
          'store_id' => 1
        ],
        [
          'discount_type_id' => 4,
          'store_id' => 1
        ],
        [
          'discount_type_id' => 5,
          'store_id' => 1
        ],
        [
          'discount_type_id' => 6,
          'store_id' => 1
        ],
        [
          'discount_type_id' => 7,
          'store_id' => 1
        ],
        [
          'discount_type_id' => 8,
          'store_id' => 1
        ],
        [
          'discount_type_id' => 9,
          'store_id' => 1
        ],
        [
          'discount_type_id' => 10,
          'store_id' => 1
        ],
        ]);


    }
}
