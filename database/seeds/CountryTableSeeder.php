<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_countries')->delete();

        Country::insert([
            [
                'country_id'=>1,
                'name'=>'Nepal',
                'iso'=>'NPl',
                'phone_code'=>'977',
                'currency_name'=>'Nepalese Rupee',
                'currency_code'=>'NPR',
                'currency_symbol'=>'Rs'
            ],
            [
                'country_id'=>2,
                'name'=>'India',
                'iso'=>'IND',
                'phone_code'=>'91',
                'currency_name'=>' Indian Rupee',
                'currency_code'=>'INR',
                'currency_symbol'=>'INR'
            ],

        ]);

    }
}
