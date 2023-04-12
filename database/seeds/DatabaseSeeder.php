<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        // $this->call(UserTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        // $this->call(LengthClassTableSeeder::class);
        // $this->call(OrderStatusTableSeeder::class);
        // $this->call(StockStatusTableSeeder::class);
        // $this->call(WeightClassTableSeeder::class);
        // $this->call(DiscountTypeTableSeeder::class);
        // $this->call(CountryTableSeeder::class);
        // $this->call(StateTableSeeder::class);
        // $this->call(CityTableSeeder::class);
        // $this->call(AreaTableSeeder::class);
        // $this->call(ReturnActionTableSeeder::class);
        // $this->call(ReturnReasonTableSeeder::class);
        // $this->call(ReturnStatusTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(StoreTableSeeder::class);
        // $this->call(CustomerGroupTableSeeder::class);
        // $this->call(ManufacturerTableSeeder::class);
        // $this->call(CustomerTableSeeder::class);
        // $this->call(ProductTableSeeder::class);
        // $this->call(DurationTableSeeder::class);
        // $this->call(CustomerFamilyTypeTableSeeder::class);
        // $this->call(BannerTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
