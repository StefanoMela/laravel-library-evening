<?php

namespace Database\Seeders;

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
    {

        for ($i=0; $i < 10; $i++) { 
            $newBook = new Book();
            $newBook->ISBN= $faker->numerify("#############");
            $newBook->name= $faker->word();
            $newBook->author= $faker->words(2, true);
            $newBook->type= $faker->randomElement(["sci-fi", "horror", "fantasy", "thriller"]);
            $newBook->description= $faker->text(100);
            $newBook->save();
        }
        
    }
}