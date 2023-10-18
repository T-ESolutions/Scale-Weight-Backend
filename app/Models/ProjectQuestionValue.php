<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectQuestionValue extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        if (\app()->getLocale() == "en") {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }

    public function projectLevelDetail()
    {
        return $this->belongsTo(ProjectLevelDetail::class, 'project_level_detail_id');
    }
}
