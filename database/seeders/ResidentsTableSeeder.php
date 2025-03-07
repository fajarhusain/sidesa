<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ResidentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Insert 100 dummy data
        foreach (range(1, 100) as $index) {
            DB::table('residents')->insert([
                'nik' => $faker->numerify('3204##########'), // NIK 16 digit
                'name' => $faker->name,
                'gender' => $faker->randomElement(['L', 'P']),
                'birthplace' => $faker->city,
                'birthdate' => $faker->date('Y-m-d', '2000-01-01'),
                'address' => $faker->address,
                'rt' => $faker->numberBetween(1, 10),
                'rw' => $faker->numberBetween(1, 10),
                'religion' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'marital_status' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
                'work' => $faker->jobTitle,
                'phone' => $faker->phoneNumber,
                'status' => $faker->randomElement(['Aktif', 'Tidak Aktif']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
