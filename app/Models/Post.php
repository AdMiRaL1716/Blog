<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable = [
        'cover',
        'title',
        'description',
        'id_user',
        'id_category',
    ];
}
