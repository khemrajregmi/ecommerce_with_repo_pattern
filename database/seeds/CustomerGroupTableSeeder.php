<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\CustomerGroup;

class CustomerGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_customer_groups')->delete();
        DB::table('kng_customergroup_store')->delete();

        CustomerGroup::insert([
            [
                'customer_group_id'=>1,
                'name'=>'Default'
            ],
            [
                'customer_group_id'=>2,
                'name'=>'Loyal'
            ],
        ]);

        DB::table('kng_customergroup_store')->insert([
            [
              'customer_group_id' => 1,
              'store_id' => 1
            ],
            [
                'customer_group_id'=>2,
                'store_id'=>1
            ],

        ]);

    }
}
