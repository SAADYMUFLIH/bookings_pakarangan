<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HousekeepingEmployee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class HousekeepingEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            HousekeepingEmployee::create([
                'name' => $faker->name,
            ]);
        }
    }
}
