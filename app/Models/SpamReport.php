<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpamReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_id',
        'url',
        'ip_id',
        'reason',
    ];
}
