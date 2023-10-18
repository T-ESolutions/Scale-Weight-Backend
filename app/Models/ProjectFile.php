<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['file_path'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getFilePathAttribute()
    {
        if (!empty($this->file)) {
            return asset('uploads/project_files') . '/' . $this->file;
        }else{
            return $this->file;
        }
    }
}
