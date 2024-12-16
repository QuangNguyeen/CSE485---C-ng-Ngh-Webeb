<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Computer;
class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++) {
            Computer::create([
                'computer_name' => $faker->company,
                'model' => $faker->company,
                'operating_system' => $faker->company,
                'processor' => $faker->company,
                'memory' => $faker->randomFloat($nbMaxDecimals = 2, $min = 4, $max = 128),
                'available' => $faker->boolean,
            ]);
        }
    }
}
