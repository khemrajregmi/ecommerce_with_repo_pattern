<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\StockStatus;

class StockStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_stock_statuses')->delete();

        StockStatus::insert([
            [
                'stock_status_id'=>1,
                'name'=>'In Stock'
            ],
            [
                'stock_status_id'=>2,
                'name'=>'2-3 Days'
            ],
            [
                'stock_status_id'=>3,
                'name'=>'Out Of Stock'
            ],
            [
                'stock_status_id'=>4,
                'name'=>'Pre-Order'
            ],
        ]);

    }
}
