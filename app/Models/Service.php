<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'price_min',
        'price_max',
        'is_featured',
    ];
}
