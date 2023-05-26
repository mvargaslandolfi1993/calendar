<?php

namespace Database\Seeders;

use App\Models\RouteFrequency;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class RouteFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('datos/route_data.json'));
        
        $data = json_decode($json, true);

        foreach ($data['routes_data'] as $frequency) {
            RouteFrequency::create($frequency);
        }
    }
}
