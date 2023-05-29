<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Albert Einstien',
            'email' => 'albert@gmail.com',
            'password' => '123456',
            'role' => 1
        ]);

        User::create([
            'username' => 'Tony Stark',
            'email' => 'tony@gmail.com',
            'password' => '123456',
            'role' => 1
        ]);

        User::create([
            'username' => 'Steve Rodgers',
            'email' => 'steve@gmail.com',
            'password' => '123456',
            'role' => 1
        ]);

        User::create([
            'username' => 'Boby Axlerod',
            'email' => 'bob@gmail.com',
            'password' => '123456',
            'role' => 2
        ]);
    }
}
