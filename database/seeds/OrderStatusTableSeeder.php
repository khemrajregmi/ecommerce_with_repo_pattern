<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\OrderStatus;
use Kerung\Models\StockStatus;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_order_statuses')->delete();

        OrderStatus::insert([
            [
                'order_status_id'=>1,
                'name'=>'Pending (Default)'
            ],
            [
                'order_status_id'=>2,
                'name'=>'Canceled Reversal  
'
            ],
            [
                'order_status_id'=>3,
                'name'=>'Chargeback'
            ],
            [
                'order_status_id'=>4,
                'name'=>'Complete'
            ],
            [
                'order_status_id'=>5,
                'name'=>'Denied'
            ],
            [
                'order_status_id'=>6,
                'name'=>'Failed'
            ],
            [
                'order_status_id'=>7,
                'name'=>'Canceled'
            ],
            [
                'order_status_id'=>8,
                'name'=>'Processed'
            ],
            [
                'order_status_id'=>9,
                'name'=>'Processing'
            ],
            [
                'order_status_id'=>10,
                'name'=>'Refunded'
            ],
            [
                'order_status_id'=>11,
                'name'=>'Reversed'
            ],
            [
                'order_status_id'=>12,
                'name'=>'Shipped'
            ],
            [
                'order_status_id'=>13,
                'name'=>'Voided'
            ],
            [
                'order_status_id'=>14,
                'name'=>'Expired'
            ],
        ]);

    }
}
