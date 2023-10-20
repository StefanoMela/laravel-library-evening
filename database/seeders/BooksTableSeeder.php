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
            $Book = new Book();
            $Book->ISBN= $faker->numerify("#############");
            $Book->name= $faker->word();
            $Book->author= $faker->words(2, true);
            $Book->type= $faker->randomElement(["sci-fi", "horror", "fantasy", "thriller"]);
            $Book->description= $faker->text(100);
            $Book->save();
        }
        
    }
}