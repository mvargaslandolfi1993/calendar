<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('datos/users.json'));
        
        $data = json_decode($json, true);

        foreach ($data['users'] as $user) {
            User::create($user);
        }
    }
}
