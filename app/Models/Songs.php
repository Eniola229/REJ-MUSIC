<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    use HasFactory;
        protected $table = "songs";

       protected $fillable = [
        'title', 
        'artist', 
        'category',
        'album', 
        'genre', 
        'release_date', 
        'file_path',
        'coverPath',
        'discription',
    ];
}
