<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\ProductReturnReason;

class ReturnReasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_product_return_reasons')->delete();

        ProductReturnReason::insert([
            [
            	'product_return_reason_id'=>1,	
            	'name'=>'Dead On Arrival'
            ],
            [
            	'product_return_reason_id'=>2,	
            	'name'=>'Faulty, please supply details'
            ],
            [
            	'product_return_reason_id'=>3,
            	'name'=>'Order Error'
            ],
            [
            	'product_return_reason_id'=>4,	
            	'name'=>'	Received Wrong Item'
            ],
        ]);
    }
}
