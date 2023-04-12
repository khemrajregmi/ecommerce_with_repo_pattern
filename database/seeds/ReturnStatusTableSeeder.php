<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\ProductReturnStatus;

class ReturnStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('kng_product_return_statuses')->delete();

        ProductReturnStatus::insert([
            [
            	'product_return_status_id'=>1,	
            	'name'=>'Awaiting Products (Default)'
            ],
            [
            	'product_return_status_id'=>2,	
            	'name'=>'Complete'
            ],
            [
            	'product_return_status_id'=>3,
            	'name'=>'Pending'
            ],
        ]);
    }
}
