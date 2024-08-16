<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OwnerSeeder extends Seeder
{
    /**
     * Seed the owners table.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $owners = [];
        for ($i = 1; $i <= 20; $i++) {
            $owners[] = [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('owners')->insert($owners);
    }
}
