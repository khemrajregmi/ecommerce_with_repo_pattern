<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_cities')->delete();

        City::insert([
            [	
            	'city_id'=>1,
                'state_id'=>7,
                'country_id'=>1,
                'name'=>'Dhangadi',
                'status'=>'1'
            ],
            [	
            	'city_id'=>2,
                'state_id'=>7,
                'country_id'=>1,
                'name'=>'Tikapur',
                'status'=>'1'
            ],
            [	
            	'city_id'=>3,
                'state_id'=>3,
                'country_id'=>1,
                'name'=>'Chabhil',
                'status'=>'1'
            ],
            [	
            	'city_id'=>4,
                'state_id'=>3,
                'country_id'=>1,
                'name'=>'Gairidhara',
                'status'=>'1'
            ],
            [	
            	'city_id'=>5,
                'state_id'=>3,
                'country_id'=>1,
                'name'=>'OldBaneshwor',
                'status'=>'1'
            ],
            [	
            	'city_id'=>6,
                'state_id'=>3,
                'country_id'=>1,
                'name'=>'NewBaneshwor',
                'status'=>'1'
            ],
        ]);

    }
}
