<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner',
        'discussion_img_1',
        'discussion_img_2',
        'service_img',
        'discussion',
        'serviceCon',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
