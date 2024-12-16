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
        $computerIds = Computer::all()->pluck('id')->toArray();
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++) {
            Issue::create([
                'computer_id' => $faker->randomElement($computerIds),
                'reported_by' => $faker->name(),
                'reported_date' => $faker->date(),
                'description' => $faker->text(),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            ]);
        }
    }
}
