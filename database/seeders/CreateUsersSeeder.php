<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=> bcrypt('123'),
                'isAdmin'=>'1'
            ],
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'password'=> bcrypt('123'),
                'isAdmin'=>'0'
            ]
            ];
            foreach($user as $key => $value){
                User::create($value);
            }
    }
}
