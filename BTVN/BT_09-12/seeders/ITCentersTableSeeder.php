<?php


use App\Models\It_Center;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ITCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++){
            It_Center::create([
                'name' => $faker->company,
                'location' => $faker->address,
                'contact_email'=> $faker->companyEmail,
            ]);
        }
    }
}
