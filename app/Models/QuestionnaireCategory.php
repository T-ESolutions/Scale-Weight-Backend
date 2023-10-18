<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireCategory extends Model
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

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class, 'category_id');
    }

    public function questionnaires_active()
    {
        return $this->hasMany(Questionnaire::class, 'category_id')->where('active',1);
    }
}
