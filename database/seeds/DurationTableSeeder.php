<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\Duration;

class DurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_duration_store')->delete();
        DB::table('kng_durations')->delete();

        Duration::insert([
            [
                'duration_id'=>1,
                'name'=>'1 Month'
            ],
            [
                'duration_id'=>2,
                'name'=>'2 Months'
            ],
            [
                'duration_id'=>3,
                'name'=>'3 Months'
            ],
            [
                'duration_id'=>4,
                'name'=>'6 Months'
            ],
            [
                'duration_id'=>5,
                'name'=>'1 Years'
            ],
        ]);

        DB::table('kng_duration_store')->insert([
	            [
	                'duration_id'=>1,
	                'store_id'=>'1'
	            ],
	            [
	                'duration_id'=>2,
	                'name'=>'1'
	            ],
	            [
	                'duration_id'=>3,
	                'name'=>'1'
	            ],
	            [
	                'duration_id'=>4,
	                'name'=>'1'
	            ],
	            [
	                'duration_id'=>5,
	                'name'=>'1'
	            ],
            ]);

    }
    
}
