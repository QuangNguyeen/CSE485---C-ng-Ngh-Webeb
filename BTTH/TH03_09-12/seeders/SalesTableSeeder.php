<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Sale;
class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $medicineIds = \App\Models\Medicine::pluck('medicine_id')->toArray();
        for($i = 0; $i < 10; $i++){
            Sale::create([
                'medicine_id' => $faker->randomElement($medicineIds),
                'quantity' => $faker->numberBetween(1, 20),
                'sale_date' => $faker->dateTimeThisYear(),
                'customer_phone' => $faker->numerify('##########'),
            ]);
        }
    }
}
