<?php

namespace Database\Seeders;

use App\Models\UserPlan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UsersPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('datos/user_plans.json'));
        
        $data = json_decode($json, true);

        foreach ($data['user_plans'] as $plan) {
            UserPlan::create($plan);
        }
    }
}
