<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicalRecordSeeder extends Seeder
{
    /**
     * Seed the medical_records table.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $animals = DB::table('animals')->pluck('id')->toArray();

        $medicalRecords = [];
        foreach ($animals as $animalId) {
            for ($i = 1; $i <= 5; $i++) {
                $medicalRecords[] = [
                    'animal_id' => $animalId,
                    'date' => $faker->date(),
                    'description' => $faker->sentence,
                    'treatment' => $faker->sentence,
                    'veterinarian' => $faker->name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('medical_records')->insert($medicalRecords);
    }
}
