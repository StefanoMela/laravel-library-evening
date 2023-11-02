<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BookTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run( Faker $faker)
    {
        $books = Book::all();
        $tags = Tag::all()->pluck('id')->toArray();

        foreach($books as $book) {
            $book
            ->tags()
            ->attach($faker->randomElements($tags, random_int(0, 2)));
        }
    }
}