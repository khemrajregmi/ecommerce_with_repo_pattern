<?php

use Illuminate\Database\Seeder;
use Kerung\Models\LengthClass;

class LengthClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_length_classes')->delete();

        LengthClass::insert([
            [
                'length_class_id'=>1,
                'title'=>'Centimeter',
                'unit'=>'cm',
                'value'=>'1.00'
           ],
            [
                'length_class_id'=>2,
                'title'=>'Inch',
                'unit'=>'in',
                'value'=>'0.39'
            ],
            [
                'length_class_id'=>3,
                'title'=>'Millimeter',
                'unit'=>'mm',
                'value'=>'10'
            ],

        ]);
    }
}
