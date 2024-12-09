<?php


use App\Models\Cinema;
use App\Models\Movie;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker  = Faker::create();
        $cinemas = Cinema::all()->pluck('id')->toArray();
        for($i = 0; $i < 10; $i++){
            Movie::create([
                'title' => $faker->sentence,
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(20,300),
                'cinema_id' => $faker->randomElement($cinemas),
            ]);
        }
    }
}
