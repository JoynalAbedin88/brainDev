<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'phone_1',
        'phone_2',
        'email_1',
        'email_2',
        'address',
        'map',
    ];
}
