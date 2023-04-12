<?php

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Kerung\Helpers\Helper;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();

        $role = [
          'id' => 1,
          'name' =>  'Super Admin',
          'slug' =>  'administrator',
            'permissions' => [
                'admin' => true
            ]
        ];

        $adminRole = Sentinel::getRoleRepository()->createModel()->fill($role)->save();

        $admin = [
            'email' => 'khemrr067@gmail.com',
            'first_name' => 'Khem Raj',
            'last_name' => 'Regmi',
            'password' => 'password',
        ];

        $adminUser = Sentinel::registerAndActivate($admin);

        $adminUser->roles()->attach($adminRole);
    }

    
}
