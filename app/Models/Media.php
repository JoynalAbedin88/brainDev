<?php

namespace App\Models;

use Illuminate\Support\Str;
use Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    static function imgUpload($img, $path, $width, $height)
    {
        $name = time().Str::random(10).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize($width, $height)->save(public_path($path.$name));
        return $path.$name;
    }
}
