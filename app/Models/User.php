<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    const ROLE_USER = '2';
    const ROLE_LIBRARIAN = '1';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'string_role',
        'string_status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public function getStringRoleAttribute()
    {
        switch ($this->role) {
            case 1:
                return 'Librarian';
            case 2:
                return 'User';
        }
    }

    /**
     * @return string
     */
    public function getStringStatusAttribute()
    {
        switch ($this->is_banned) {
            case 0:
                return 'Un-Ban/Active';
            case 1:
                return 'Ban';
        }
    }

    public function userType()
    {
        switch ($this->role) {
            case 1:
                return 'Librarian';
            case 2:
                return 'User';
        }
    }

    public function bookCopies()
    {
        return $this->hasMany(BookCopy::class);
    }

    public function loanRequests()
    {
        return $this->hasMany(LoanRequest::class);
    }

    public function returnRequests()
    {
        return $this->hasMany(ReturnRequest::class);
    }

    public function bookUsers()
    {
        return $this->hasMany(BookUser::class);
    }
}
