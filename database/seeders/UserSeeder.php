<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
// use Database\Seeders\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Salman Zahid Bro',
            'email' => 'Salman@gmail.com',
            'password' => '123456',
            'profile_picture'=>'dummy.jpg',
            'bio'=>'I am Salman And I am a final year student of GCU. This platform is my FYP and I want to provide a platform that enables users to rent our their stuff in a secure environment',
            'user_type'=>'user',
            'phone_no'=>'090078601',
            'user_name'=>'Salman Zahid'
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '123456',
            'profile_picture'=>'dummy.jpg',
            'bio'=>'Admin Of The Site',
            'user_type'=>'admin',
            'phone_no'=>'090078601',
            'user_name'=>'Admin'
        ]);
        //
    }
}
