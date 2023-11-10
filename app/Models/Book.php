<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;
    public function genre()
    {
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
    ];
    // public function getGenre() {
    //     return $this->genre->name;
    // }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getTagBadges()
    {
        $_tags = "";

        if ($this->tags->toArray()) {
            foreach ($this->tags as $tag) {
                $_tags .= "<span class='badge mx-1' style='background-color:{$tag->color}'>{$tag->label}</span>";
            }
        } else {
            $_tags .= "Senza tags";
        }


        return $_tags;
    }

    public function getDescriptionIndex($chars = 50)
    {
        return strlen($this->description) > $chars ? substr($this->description, 0, $chars) . "..." : $this->description;
    }

    public function getAbsUriImage()
    {
        return $this->book_cover ? Storage::url($this->book_cover) : null;
    }
}
