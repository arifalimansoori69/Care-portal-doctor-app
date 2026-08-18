<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            [
                'name' => 'Dr. Ayesha Khan',
                'email' => 'ayesha@example.com',
                'password' => Hash::make('password'),
                'role' => 'doctor',
                'specialization' => 'Cardiologist',
                'city_id' => 1, // Karachi
            ],
            [
                'name' => 'Dr. Bilal Ahmed',
                'email' => 'bilal@example.com',
                'password' => Hash::make('password'),
                'role' => 'doctor',
                'specialization' => 'Dermatologist',
                'city_id' => 2, // Lahore
            ],
        ];

        foreach ($doctors as $doctor) {
            User::create($doctor);
        }
    }
}
