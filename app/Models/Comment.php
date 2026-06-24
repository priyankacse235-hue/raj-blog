<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'user_id',
        'parent_id',
        'comment',
    ];
    // 101926322882
    // MMwAwe#&#057

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
