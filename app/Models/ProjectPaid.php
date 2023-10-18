<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPaid extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function project_active()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
