<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\CustomerFamilyType;

class CustomerFamilyTypeTableSeeder extends Seeder
{
    /**CustomerFamilyType
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_familysize_store')->delete();
        DB::table('kng_customer_family_types')->delete();

        CustomerFamilyType::insert([
            [
                'customer_family_type_id'=>1,
                'type_name'=>'2parent/1kid'
            ],
            [
                'customer_family_type_id'=>2,
                'type_name'=>'2parent/2kid'
            ],
            [
                'customer_family_type_id'=>3,
                'type_name'=>'2parent/3kid'
            ],
        ]);

        DB::table('kng_familysize_store')->insert([
	            [
	                'customer_family_type_id'=>1,
	                'store_id'=>'1'
	            ],
	            [
	                'customer_family_type_id'=>2,
	                'store_id'=>'1'
	            ],
	            [
	                'customer_family_type_id'=>3,
	                'store_id'=>'1'
	            ],
            ]);

    }
    
}

