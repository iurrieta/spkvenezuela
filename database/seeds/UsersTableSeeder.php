<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

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
                'id' => Uuid::generate(),
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('1234'),
                'type' => 'ADMINISTRATOR',
                'created_at' => '2018-05-16 00:00:00',
                'updated_at' => '2018-05-16 00:00:00'
            ]
        ]);
    }
}
