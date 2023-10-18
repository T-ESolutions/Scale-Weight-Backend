<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectQuestionnaireAnswer extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function question()
    {
        return $this->belongsTo(ProjectQuestionnaire::class, 'project_questionnaire_id');
    }
}
