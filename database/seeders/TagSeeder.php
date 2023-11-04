<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $_tags = ["Copertina rigida", "E-book", "Tascabile", "Audio Libro"];

        foreach($_tags as $_tag) {
        $tag = new Tag();
        $tag->label = $_tag;
        $tag->color = $faker->hexColor() ;
        
        $tag->save();
        }
    }
}