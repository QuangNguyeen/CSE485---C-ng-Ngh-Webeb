<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        for($i = 1; $i < 11; $i++){
            Post::create([
                'title' => "Post number: ".$i,
                'content' => $faker->text($maxNbChars = 200),
            ]);
        }
    }
}
// Phan trang
// Validate du lieu
// Du lieu Media

