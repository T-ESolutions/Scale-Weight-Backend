<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelDetail extends Model
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

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    public function question()
    {
        return $this->belongsTo(QuestionType::class, 'question_type_id');
    }

    public function questionValues()
    {
        return $this->hasMany(QuestionValue::class, 'level_detail_id');
    }

    public function questionValuesActive()
    {
        return $this->hasMany(QuestionValue::class, 'level_detail_id')->where('active',1);
    }
}
