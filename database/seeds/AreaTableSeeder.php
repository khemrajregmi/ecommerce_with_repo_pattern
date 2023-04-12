<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\Area;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_areas')->delete();

        Area::insert([
            [
            	'area_id'=>1,	
            	'city_id'=>1,
                'state_id'=>7,
                'name'=>'LN Chowk',
                'status'=>'1'
            ],
            [
            	'area_id'=>2,	
            	'city_id'=>2,
                'state_id'=>7,
                'name'=>'Balbhadra Chowk',
                'status'=>'1'
            ],
            [
            	'area_id'=>3,	
            	'city_id'=>4,
                'state_id'=>3,
                'name'=>'Tangal',
                'status'=>'1'
            ],
            [
            	'area_id'=>4,	
            	'city_id'=>5,
                'state_id'=>3,
                'name'=>'Basuki Marg',
                'status'=>'1'
            ],
            [
            	'area_id'=>5,	
            	'city_id'=>6,
                'state_id'=>3,
                'name'=>'Thapagaun',
                'status'=>'1'
            ],
            [
            	'area_id'=>6,	
            	'city_id'=>3,
                'state_id'=>3,
                'name'=>'Ganeshthan',
                'status'=>'1'
            ],
        ]);
    }
}
