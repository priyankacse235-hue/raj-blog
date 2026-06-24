<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'title',
        'slug',
        'content',
        'status',
        'html',
        'css',
        'js',
        'json_data',
        'thumbnail',
        'created_at',
        'updated_at',
    ];
}
