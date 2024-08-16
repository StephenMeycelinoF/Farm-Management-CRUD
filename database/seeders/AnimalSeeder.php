<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AnimalSeeder extends Seeder
{
    /**
     * Seed the animals table.
     *
     * @return void
     */
    public function run()
    {
        $animals = [];
        for ($i = 1; $i <= 20; $i++) {
            $animals[] = [
                'name' => 'Animal ' . $i,
                'species' => 'Species ' . $i,
                'age' => rand(1, 15),
                'description' => 'Description for Animal ' . $i,
            ];
        }

        DB::table('animals')->insert($animals);
    }
}
