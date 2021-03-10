<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'what', 'pragraph', 'icon', 'status'];
    
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
    public function service()
    {
        return $this->hasMany(Service::class);
    }
    
    public function serviceInfo()
    {
        return $this->hasOne(ServiceContent::class);
    }
}
