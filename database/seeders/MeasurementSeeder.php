<?php

namespace Database\Seeders;

use App\Models\Measurement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //weight_kg fat_percentage blood_pressure
        $faker = Faker::create();

        // Generate sample measurements
        for ($i = 1; $i < 11; $i++) {
            Measurement::create([
                'weight_kg' => $faker->randomFloat(1, 50, 150), 
                'fat_percentage' => $faker->randomFloat(1, 5, 30), 
                'blood_pressure' => $faker->numberBetween(9000, 16000),
                'client_id' => $i
            ]);
        }
    }
}
