<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectQuestionnaire extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $appends = ['name', 'category_name'];


    public function getCategoryNameAttribute()
    {
        if (\app()->getLocale() == "en") {
            return $this->category_name_en;
        } else {
            return $this->category_name_ar;
        }
    }

    public function getNameAttribute()
    {
        if (\app()->getLocale() == "en") {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function question_type()
    {
        return $this->belongsTo(QuestionType::class, 'question_type_id');
    }
    public function answers()
    {
        return $this->hasMany(ProjectQuestionnaireAnswer::class, 'project_questionnaire_id');
    }
}
