<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'img_1',
        'img_2',
        'heading',
        'pragraph_1',
        'pragraph_2',
        'video',
        'section',
    ];
}
