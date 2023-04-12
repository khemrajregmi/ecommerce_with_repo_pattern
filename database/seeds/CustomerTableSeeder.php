<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_customer_store')->delete();
        DB::table('kng_customers')->delete();

        Customer::insert([
            [
                'customer_id'=>1,
                'customer_group_id'=>1,
                'store_id'=>1,
                'language_id'=>1,
                'firstname'=>'Default',
                'lastname'=>'Customer',
                'email'=>'guest@cakify.com',
                'password'=>bcrypt('password'),
                'telephone'=>79878798787,
                'newsletter'=>0,
                'address_id'=>1,
                'status'=>1,
                'approved'=>1,
                'safe'=>1,
                'image'=>'',
                'remember_token'=>''
            ],
        ]);

        DB::table('kng_customer_store')->insert(
            [
                'customer_id'=>1,
                'store_id' => 1
            ]);

    }
}
