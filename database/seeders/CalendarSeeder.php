<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('datos/calendar.json'));
        
        $data = json_decode($json, true);

        foreach ($data['calendar'] as $calendar) {
            Calendar::create($calendar);
        }
    }
}
