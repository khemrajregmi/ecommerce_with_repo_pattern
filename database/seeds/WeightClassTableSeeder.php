<?php

use Illuminate\Database\Seeder;
use Kerung\Models\WeightClass;

class WeightClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_weight_classes')->delete();

        WeightClass::insert([
            [
                'weight_class_id'=>1,
                'title'=>'Gram',
                'unit'=>'g',
                'value'=>'1000'
            ],
            [
                'weight_class_id'=>2,
                'title'=>'Kilogram',
                'unit'=>'kg',
                'value'=>'1.0'
            ],
        ]);
    }
}
