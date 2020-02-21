<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'User',
                'last_name' => '1',
                'username' => 'user1',
                'password' => Hash::make('qwerty123'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'first_name' => 'User',
                'last_name' => '2',
                'username' => 'user2',
                'password' => Hash::make('qwerty123'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'first_name' => 'User',
                'last_name' => '3',
                'username' => 'user3',
                'password' => Hash::make('qwerty123'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'first_name' => 'User',
                'last_name' => '4',
                'username' => 'user4',
                'password' => Hash::make('qwerty123'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'first_name' => 'User',
                'last_name' => '5',
                'username' => 'user5',
                'password' => Hash::make('qwerty123'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
