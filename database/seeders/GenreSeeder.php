<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_genres =[
            'giallo',
            'storico',
            'horror',
            'fantasy',
            'avventura',
            'Romance',
            'Thriller',
            'Biography',
            'Non-Fiction',
        
        ];

        foreach ($_genres as $_genre) {
            $genre= new Genre();
            $genre->name = $_genre;
            $genre->save();
        }  
    }
}