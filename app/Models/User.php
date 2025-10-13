<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Payment;
use App\Models\Officer;
use App\Models\DuesMember;

class User extends Authenticatable
{
    // /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'nohp',
        'address',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'users_id');
    }

    public function officer()
    {
        return $this->hasOne(Officer::class, 'users_id');
    }

    public function duesMembers()
    {
        return $this->hasMany(DuesMember::class, 'users_id');
    }
}
