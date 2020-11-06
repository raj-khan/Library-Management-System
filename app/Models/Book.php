<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;


    public function publication(){
        return $this->belongsTo(Publication::class);
    }


    public function bookCopies(){
        return $this->hasMany(BookCopy::class);
    }

    public function bookGenres(){
        return $this->hasMany(BookGenre::class);
    }

    public function authorBooks(){
        return $this->hasMany(AuthorBook::class);
    }
}
