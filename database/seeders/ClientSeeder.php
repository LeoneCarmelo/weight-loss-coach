<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Model fillable ['first_name', 'last_name', 'date_of_birth', 'length_cm', 'email', 'photo']
        $faker = Faker::create();

        $numberOfClients = 10;

        // Seed clients
        for ($i = 0; $i < $numberOfClients; $i++) {
            Client::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'length_cm' => $faker->numberBetween($min = 140, $max = 200), // Assuming height in cm
                'email' => $faker->unique()->safeEmail,
                'photo' => $faker->imageUrl($width = 200, $height = 200, 'people') // Generate a fake image URL
            ]);
        }
    }
}
