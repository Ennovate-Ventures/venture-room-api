<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Goal;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Goal::create([
            'startup_id' => 1, 
            'amount' => 350000.00, 
            'goal_title' => 'Seed round', 
            'min_amount' => 100000.00
        ]);

        Goal::create([
            'startup_id' => 2, 
            'amount' => 400000.00, 
            'goal_title' => 'Series A', 
            'min_amount' => 100000.00
        ]);

        Goal::create([
            'startup_id' => 3, 
            'amount' => 500000.00, 
            'goal_title' => 'Series B', 
            'min_amount' => 100000.00
        ]);
    }
}
