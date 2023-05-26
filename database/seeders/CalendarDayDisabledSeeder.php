<?php

namespace Database\Seeders;

use App\Models\CalendarDayDisabled;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CalendarDayDisabledSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('datos/calendar_days_disabled.json'));
        
        $data = json_decode($json, true);

        foreach ($data['calendar_days_disabled'] as $calendar) {
            CalendarDayDisabled::create($calendar);
        }
    }
}
