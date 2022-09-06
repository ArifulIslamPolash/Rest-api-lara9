<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[

            ['name'=>'ariful', 'email'=>'ariful@gmail.com','password'=>'1234556'],
            ['name'=>'islam', 'email'=>'islam@gmail.com','password'=>'1234556'],
            ['name'=>'polash', 'email'=>'polash@gmail.com','password'=>'1234556'],

        ];
        User::insert($users);
    }
}
