<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'users_id',
        'nominal',
        'period',
        'dues_categories_id',
        'petugas',
        'jumlah_tagihan',
        'nominal_tagihan',
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
