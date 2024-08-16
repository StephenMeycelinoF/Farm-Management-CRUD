<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BreedSeeder extends Seeder
{
    /**
     * Seed the breeds table.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $breeds = [];
        for ($i = 1; $i <= 20; $i++) {
            $breeds[] = [
                'name' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('breeds')->insert($breeds);
    }
}
