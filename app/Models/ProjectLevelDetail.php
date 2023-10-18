<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLevelDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
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
        return $this->belongsTo(ProjectLevel::class, 'level_id');
    }

    public function question()
    {
        return $this->belongsTo(QuestionType::class, 'question_type_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'emp_id')->withDefault([
            'name'=>''
        ]);
    }

    public function ProjectQuestionValues()
    {
        return $this->hasMany(ProjectQuestionValue::class, 'project_level_detail_id')->where('active',1);
    }


    public function getAnswerFileAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/project_answer_files') . '/' . $image;
        }
//        return asset('defaults/user_default.png');
    }

    public function setAnswerFileAttribute($image)
    {
        if (is_file($image)) {
            $img_name = 'answer_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/project_answer_files/'), $img_name);
            $this->attributes['answer_file'] = $img_name;
        }
    }
}
