<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_product_to_store')->delete();
        DB::table('kng_product_related')->delete();
        DB::table('kng_products')->delete();

        Product::insert([
            [
                'product_id'=>1,
                'name'=>'White Forest',
                'meta_title'=>'White Forest',
                'model'=>'White Forest',
                'slug'=>'white-forest',
                'price'=>'2000',
                'stock_status_id'=>'1',
                'manufacturer_id'=>'1',
                'weight_class_id'=>'1',
                'length_class_id'=>'1',
                'newarrival'=>'1',
                'quantity'=>'100',
                'status'=>'1',
                'image'=>'assets/home/images/products/product-1.jpg'
            ],
            [
                'product_id'=>2,
                'name'=>'Cups Cake',
                'meta_title'=>'Cups Cake',
                'model'=>'Cups Cake',
                'slug'=>'cups-cake',
                'price'=>'2500',
                'stock_status_id'=>'1',
                'manufacturer_id'=>'1',
                'weight_class_id'=>'1',
                'length_class_id'=>'1',
                'newarrival'=>'0',
                'quantity'=>'100',
                'status'=>'1',
                'image'=>'assets/home/images/products/product-2.jpg'
            ],
            [
                'product_id'=>3,
                'name'=>'Fruits Cake',
                'meta_title'=>'Fruits Cake',
                'model'=>'Fruits Cake',
                'slug'=>'fruits-cake',
                'price'=>'2500',
                'stock_status_id'=>'1',
                'manufacturer_id'=>'1',
                'weight_class_id'=>'1',
                'length_class_id'=>'1',
                'newarrival'=>'0',
                'quantity'=>'100',
                'status'=>'1',
                'image'=>'assets/home/images/products/product-3.jpg'
            ],
            [
                'product_id'=>4,
                'name'=>'Wayffy Cake',
                'meta_title'=>'Wayffy Cake',
                'model'=>'Wayffy Cake',
                'slug'=>'wayffy-cakes',
                'price'=>'1500',
                'stock_status_id'=>'1',
                'manufacturer_id'=>'1',
                'weight_class_id'=>'1',
                'length_class_id'=>'1',
                'newarrival'=>'1',
                'quantity'=>'100',
                'status'=>'1',
                'image'=>'assets/home/images/products/product-4.jpg'
            ],
        ]);


        DB::table('kng_product_to_store')->insert([
	        [
	        	'product_id'=>1,
	            'store_id' => 1
	        ],
	        [
	        	'product_id'=>2,
	            'store_id' => 1
	        ],
	        [
	        	'manufacturer_id'=>3,
	            'store_id' => 1
	        ],
        ]);

        DB::table('kng_product_related')->insert([
            [
                'product_id'=>3,
                'related_id' => 1
            ],
            [
                'product_id'=>1,
                'related_id' => 2
            ],
            [
                'product_id'=>2,
                'related_id' => 3
            ],
        ]);
    }
}