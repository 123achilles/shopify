<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@mail.ru',
                'password' => Hash::make('adminadmin'), // secret
//                'remember_token' => str_random(10),
                'role' => ConstUserRole::ADMIN,
            ],
        ]);
    }
}
