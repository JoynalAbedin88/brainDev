<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'icon',
        'description',
        'category_id',
        'special'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
