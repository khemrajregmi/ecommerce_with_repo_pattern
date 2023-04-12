<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Kerung\Models\Banner;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kng_banners')->delete();
         DB::table('kng_banner_images')->delete();


        Banner::insert([
            [
            'banner_id' => '1',
		        'name' => 'First Banner',
		        'status' =>'1'
            ],
            [
            'banner_id' => '2',
		        'name' => 'Second Banner',
		        'status' => '1'
            ],
            [
            'banner_id' => '3',
		        'name' => 'Third Banner',
		        'status' => '1'
            ],
            [
            'banner_id' => '4',
		        'name' => 'Fourth Banner',
		        'status' => '1'
            ],

        ]);

         DB::table('kng_banner_images')->insert([
            [
              'banner_image_id' => 1,
              'banner_id' => 1,
              'image' => "uploads/banner/banner2.jpg"
            ],
            [
                'banner_image_id'=>2,
                'banner_id'=>2,
             	'image' => "uploads/banner/banner1.jpg"
            ],
            [
                'banner_image_id'=>3,
                'banner_id'=>3,
              	'image' => "uploads/banner/banner3.jpeg"
            ],
            [
                'banner_image_id'=>4,
                'banner_id'=>4,
               	'image' => "uploads/banner/Banner3.jpg"
            ],

        ]);

    }
}
