<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesMember extends Model
{
    protected $fillable = [
        'users_id',
        'dues_categories_id',
        'registration_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function duesCategory()
    {
        return $this->belongsTo(DuesCategory::class, 'dues_categories_id');
    }
}
