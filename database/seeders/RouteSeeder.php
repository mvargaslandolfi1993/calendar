<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('datos/routes.json'));
        
        $data = json_decode($json, true);

        foreach ($data['routes'] as $route) {
            Route::create($route);
        }
    }
}
