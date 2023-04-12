<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\ProductReturnAction;

class ReturnActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_product_return_actions')->delete();

        ProductReturnAction::insert([
            [
            	'product_return_action_id'=>1,	
            	'name'=>'Credit Issued'
            ],
            [
            	'product_return_action_id'=>2,	
            	'name'=>'Refunded'
            ],
            [
            	'product_return_action_id'=>3,
            	'name'=>'Replacement Sent	
'
            ],
        ]);
    }
}
