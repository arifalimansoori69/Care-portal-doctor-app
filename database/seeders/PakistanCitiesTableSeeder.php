<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PakistanCitiesTableSeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['name' => 'Karachi', 'province' => 'Sindh'],
            ['name' => 'Lahore', 'province' => 'Punjab'],
            ['name' => 'Islamabad', 'province' => 'ICT'],
            ['name' => 'Rawalpindi', 'province' => 'Punjab'],
            ['name' => 'Faisalabad', 'province' => 'Punjab'],
            ['name' => 'Multan', 'province' => 'Punjab'],
            ['name' => 'Hyderabad', 'province' => 'Sindh'],
            ['name' => 'Peshawar', 'province' => 'KPK'],
            ['name' => 'Quetta', 'province' => 'Balochistan'],
            ['name' => 'Sialkot', 'province' => 'Punjab'],
        ];

        DB::table('cities')->insert($cities);
    }
}
