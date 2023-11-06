<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function genre()  {
        return $this->belongsTo(Genre::class);
    }

    protected $fillable = [
        "ISBN",
        "name",
        "author",
        "type",
        "description",
        "genre_id",
        'book_cover'
    ] ;
    // public function getGenre() {
    //     return $this->genre->name;
    // }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function getTagBadges(){
        $_tags = "";

        if($this->tags->toArray()){
            foreach($this->tags as $tag){
                $_tags .= "<span class='badge mx-1' style='background-color:{$tag->color}'>{$tag->label}</span>";
            }  
        } else {
            $_tags .= "Senza tags";
        }


        return $_tags;
    }

}