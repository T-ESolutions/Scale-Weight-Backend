<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function level()
    {
        return $this->belongsTo(ProjectLevel::class, 'level_id');
    }

    public function sender()
    {
        return $this->morphTo('sender');
    }

    public function getFileAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/mail_files') . '/' . $image;
        } else {
            return null;
        }
    }

    public function setFileAttribute($image)
    {
        if (is_file($image)) {
            $this->attributes['file'] = upload($image, 'mail_files');
            $this->attributes['file_extension'] = $image->getClientOriginalExtension();
            $this->attributes['is_file'] = 1;
        }
    }
}
