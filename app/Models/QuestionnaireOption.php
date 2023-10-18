<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireOption extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function getNameAttribute()
    {
        if (\app()->getLocale() == "en") {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_id');
    }
}
