<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            CurrencySeeder::class,
            ProvinceSeeder::class,
            UsersPlansSeeder::class,
            ServicesSeeder::class,
            CalendarSeeder::class,
            RouteSeeder::class,
            RouteFrequencySeeder::class,
            ReservationSeeder::class,
            CalendarDayDisabledSeeder::class
        ]);
    }
}
