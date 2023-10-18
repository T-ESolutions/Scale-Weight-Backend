<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionValue extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    protected $appends = ['name'];
    protected $hidden = ['created_at','updated_at'];
    public function getNameAttribute()
    {
        if (\app()->getLocale() == "en") {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }
    public function levelDetail()
    {
        return $this->belongsTo(LevelDetail::class, 'level_detail_id');
    }

}
