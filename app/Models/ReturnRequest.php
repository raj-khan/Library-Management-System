<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnRequest extends Model
{
    use HasFactory, SoftDeletes;

    const CONDITION_PENDING = 'pending';
    const CONDITION_REJECTED = 'rejected';
    const CONDITION_APPROVED = 'approved';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookUsers()
    {
        return $this->hasMany(BookUser::class);
    }
}
