<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Startup;

class StartupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Startup::create([
            'name' => 'Gojo', 
            'description' => 'Gojo is a media startup', 
            'employee_count' => 5,
            'revenue' => 10000.00, 
            'approved' => true, 
            'user_id' => 1
        ]);

        Startup::create([
            'name' => 'Twitter', 
            'description' => 'It is a social media startup', 
            'employee_count' => 5,
            'revenue' => 10000.00, 
            'approved' => true, 
            'user_id' => 2
        ]);

        Startup::create([
            'name' => 'BlueSky', 
            'description' => 'It is a social media startup', 
            'employee_count' => 5,
            'revenue' => 10000.00, 
            'approved' => true, 
            'user_id' => 3
        ]);
    }
}
