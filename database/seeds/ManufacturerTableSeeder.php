<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\Manufacturer;

class ManufacturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_manufacturer_store')->delete();
        DB::table('kng_manufacturers')->delete();

        Manufacturer::insert([
            [
                'manufacturer_id'=>1,
                'name'=>'CG GrouNp'
            ],
            [
                'manufacturer_id'=>2,
                'name'=>'Patanjali'
            ],
            [
                'manufacturer_id'=>3,
                'name'=>'Britania'
            ],
            [
                'manufacturer_id'=>4,
                'name'=>'KL Dugar'
            ],
        ]);


        DB::table('kng_manufacturer_store')->insert([
	        [
	        	'manufacturer_id'=>1,
	            'store_id' => 1
	        ],
	        [
	        	'manufacturer_id'=>2,
	            'store_id' => 1
	        ],
	        [
	        	'manufacturer_id'=>3,
	            'store_id' => 1
	        ],
	        [
	        	'manufacturer_id'=>4,
	            'store_id' => 1
	        ],
        ]);
    }
}
