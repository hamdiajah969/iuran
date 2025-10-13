<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesCategory extends Model
{
    protected $fillable = [
        'period',
        'nominal',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'dues_categories_id');
    }

    public function duesMembers()
    {
        return $this->hasMany(DuesMember::class, 'dues_categories_id');
    }
}
