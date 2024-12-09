<?php

namespace Database\Seeders;

use App\Models\Computer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Issue;
class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computerId = Computer::pluck('id')->toArray();
        for($i = 0; $i < 10; $i++) {
            Issue::create([
                'computer_id' => $faker->randomElement($computerId),
                'reported_by' => $faker->firstName,
                'reported_date' => $faker->date(),
                'description' => $faker->sentence(),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Process', 'Resolved']),
            ]);
        }
    }
}
