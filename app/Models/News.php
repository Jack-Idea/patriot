<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imgs', 'img', 'title', 'description', 'club', 'federation',
    ];

    protected $casts = [
        'imgs' => 'array'
    ];
}
