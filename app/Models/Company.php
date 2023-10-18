<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    protected $appends = ['name'];
    public function getNameAttribute()
    {
        if (\app()->getLocale() == "en") {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'company_percentages', 'company_id', 'category_id');
    }



    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/companies') . '/' . $image;
        }
        return asset('defaults/default_category.png');
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $img_name = upload($image, 'companies');
            $this->attributes['image'] = $img_name;
        } else {
            $this->attributes['image'] = $image;
        }
    }

}
