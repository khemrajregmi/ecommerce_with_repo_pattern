<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\Store;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('kng_store_user')->delete();
        DB::table('kng_stores')->delete();

        $store = Store::insert([
            [
                'store_id'=>1,
		        'contact_name'=>'Mohon Panthi',
		        'contact_phone'=>'9840000000',
		        'contact_email'=>'contact.kerung@gmail.com',
		        'street'=>'Buddha Nagar',
		        'store_name'=>'Kerung Store(Default)',
		        'store_phone'=>'014444444',
		        'store_logo'=>'store.png',
		        'state_id'=>'7',
		        'city_id'=>'6',
		        'location_id'=>'5',
		        'dispatch'=>'1',
		        'collection'=>'1',
		        'delivery'=>'1',
		        'about_store'=>'This is our First kerung Store',
		        'email_order'=>'1',
		        'order_email'=>'kerung.service@gmail.com',
		        'sms_option'=>'1',
		        'phone'=>'9789878733',
		        'automatic_order_assign'=>'1',
		        'commission'=>'1',
		        'invoice_period'=>'15',
		        'meta_titles'=>'kerung',
		        'meta_keywords'=>'kerung',
		        'meta_description'=>'kerung',
		        'status'=>'1'
            ],
        ]);

        DB::table('kng_store_user')->insert(
        [
          'store_id' => 1,
          'user_id' => 1
        ]);
    }
}
