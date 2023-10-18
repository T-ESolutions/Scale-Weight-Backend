<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $hidden = ['created_at','updated_at'];

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/settings') . '/' . $image;
        }
//        return asset('defaults/default_category.png');
        return null;
    }
}
