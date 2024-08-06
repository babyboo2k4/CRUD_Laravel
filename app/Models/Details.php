<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
protected $table='details_crud';
    protected $fillable = [
        'title',
        'author',
        'description',
        'cover_image_url',
        'release_date',
        'status',
    ];
}
