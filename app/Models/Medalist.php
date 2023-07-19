<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medalist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'birthday', 'weight', 'competitions', 'total_score'
    ];

    protected $casts = [
        'competitions' => 'array'
    ];
}
