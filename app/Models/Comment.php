<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class); // every comment belongs to post
    }

    public function user()
    {
        return $this->belongsTo(User::class); // every comment belongs to user
    }
}
