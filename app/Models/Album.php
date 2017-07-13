<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $incrementing = false;
    protected $dates = ['created_at', 'updated_at', 'published_at'];

    protected $fillable = [
        'id',
        'permalink',
        'published_at',
        'title',
        'image',
    ];
}