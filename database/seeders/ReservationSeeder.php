<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\Reservation;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('datos/reservations.json'));
        
        $data = json_decode($json, true);

        foreach ($data['reservations'] as $calendar) {
            Reservation::create($calendar);
        }
    }
}
