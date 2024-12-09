<?php


use App\Models\Hardware_Device;
use App\Models\It_Center;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HardwareDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $IDCenters = It_Center::all()->pluck('id')->toArray();
        for($i = 0; $i < 10; $i++){
            Hardware_Device::create([
                'device_name'=> $faker->company,
                'type'=>$faker->randomElement(['Mouse','Keyboard', 'Headset']),
                'status'=>$faker->boolean,
                'center_id' => $faker->randomElement($IDCenters)
            ]);
        }
    }
}
