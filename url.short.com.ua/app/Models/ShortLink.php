<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;


    protected $fillable = [
        'code',
        'link',
        'limit_request',
        'life_time_in_minute',
        'is_active',
        'is_infinite'
    ];
}
