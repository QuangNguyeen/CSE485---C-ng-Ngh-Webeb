<?php


use App\Models\Book;
use App\Models\Library;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $libraryID = Library::pluck('id')->toArray();
        for($i = 0; $i < 10; $i++){
            Book::create([
                'title' => $faker->word,
                'author' => $faker->name,
                'publication_year'=>$faker->year,
                'genre'=>$faker->word,
                'library_id'=>$libraryID[array_rand($libraryID)],
            ]);
        }
    }
}
