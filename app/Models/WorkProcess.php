<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'content',
        'heading_bn',
        'content_bn',
    ];
}
