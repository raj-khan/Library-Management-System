<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BookGenre extends Pivot
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }


    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
