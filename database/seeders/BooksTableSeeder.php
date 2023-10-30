<?php

namespace Database\Seeders;
use App\Models\Genre;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {        $genres_id=Genre::all()->pluck('id');


        for ($i = 0; $i < 10; $i++) {
            $newBook = new Book();
            $newBook->genre_id = $faker ->randomElement($genres_id);
            $newBook->ISBN = $faker->isbn13();
            $newBook->name = $faker->word();
            $newBook->author = $faker->words(2, true);
            $newBook->type = $faker->randomElement(["sci-fi", "horror", "fantasy", "thriller"]);
            $newBook->description = $faker->text(100);
            $newBook->save();
        }
    }
}