<?php


use App\Models\Cinema;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++){
            Cinema::create([
                'name' => $faker->company,
                'location' => $faker->streetAddress,
                'total_seats'=>$faker->numberBetween(100,300),
            ]);
        }
    }
}
