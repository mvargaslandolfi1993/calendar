<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('datos/services.json'));
        
        $data = json_decode($json, true);

        foreach ($data['services'] as $service) {
            Service::create($service);
        }
    }
}
