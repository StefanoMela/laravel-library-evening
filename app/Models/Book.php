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
        "genre_id"
    ] ;
    // public function getGenre() {
    //     return $this->genre->name;
    // }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

}