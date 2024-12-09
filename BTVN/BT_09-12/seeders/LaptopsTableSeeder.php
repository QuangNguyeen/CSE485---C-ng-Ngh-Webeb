<?php


use App\Models\Laptop;
use App\Models\Renter;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $renterIds = Renter::all()->pluck('id')->toArray();
        for($i = 0; $i < 10; $i++){
            Laptop::create([
                'brand' => $faker->word,
                'model' => $faker->word,
                'specifications'=>$faker->sentence,
                'rental_status'=>$faker->boolean,
                'renter_id'=>$faker->randomElement($renterIds),
            ]);
        }
    }
}
