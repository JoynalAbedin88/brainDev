<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner',
        'upper_img',
        'lower_img',
        'heading',
        'upper_pra',
        'lower_pra',
    ];
}
