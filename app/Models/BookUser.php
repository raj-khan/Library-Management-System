<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BookUser extends Pivot
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bookCopy(){
        return $this->belongsTo(BookCopy::class);
    }

    public function loanRequest(){
        return $this->belongsTo(LoanRequest::class);
    }

    public function returnRequest(){
        return $this->belongsTo(ReturnRequest::class);
    }
}
