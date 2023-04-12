<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\State;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_states')->delete();

        State::insert([
            [
                'state_id'=>1,
                'country_id'=>1,
                'name'=>'Pradesh 1',
                'status'=>'1'
            ],
            [
                'state_id'=>2,
                'country_id'=>1,
                'name'=>'Pradesh 2',
                'status'=>'1'
            ],
            [
                'state_id'=>3,
                'country_id'=>1,
                'name'=>'Pradesh 3',
                'status'=>'1'
            ],
            [
                'state_id'=>4,
                'country_id'=>1,
                'name'=>'Pradesh 4',
                'status'=>'1'
            ],
            [
                'state_id'=>5,
                'country_id'=>1,
                'name'=>'Pradesh 5',
                'status'=>'1'
            ],
            [
                'state_id'=>6,
                'country_id'=>1,
                'name'=>'Pradesh 6',
                'status'=>'1'
            ],
            [
                'state_id'=>7,
                'country_id'=>1,
                'name'=>'Pradesh 7',
                'status'=>'1'
            ],

        ]);

    }
}
