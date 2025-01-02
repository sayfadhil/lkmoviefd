<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'synopsis', 'poster', 'year', 'available', 'genre_id'];

    // Relasi: Satu Movie memiliki satu Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
