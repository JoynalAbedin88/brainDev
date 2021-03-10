<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        'email',
        'phone',
        'company',
        'save',
        'blog_id',
        'comment_id',
        'user_id',
    ];
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
