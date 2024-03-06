<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'published_at',
        'isbn',
        'description',
        'price',
        'cover_url'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];
}
