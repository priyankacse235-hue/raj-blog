<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SpamReport;
use App\Models\Comment;

class Blog extends Model
{
    protected $table = 'blogs';
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'slug',
        'title',
        'image',
        'image_alt',
        'active', 
        'short_desc', 
        'defination', 
        'meta_title', 
        'meta_keywords', 
        'meta_desc', 
        'position', 
        'created_by', 
        'view_count', 
        'is_blocked',
        'activation_request',
    ];

    
    public function spamReports()
    {
        return $this->hasMany(SpamReport::class, 'blog_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id');
    }
}
