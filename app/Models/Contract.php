<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;


class Contract extends Model
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

    public function levels()
    {
        return $this->hasMany(Level::class, 'contract_id');
    }
    public function projects()
    {
        return $this->hasMany(Project::class, 'contract_id');
    }

    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Project::class)->where('payments.type','income');
    }
//    public function project_paid()
//    {
//        return $this->hasManyThrough(ProjectPaid::class, Project::class);
//    }

//    public function project_total_paid()
//    {
////        return $this->hasManyDeepFromRelations($this->projects(), (new Project())->project_paid());
//        return $this->hasManyDeep(ProjectPaid::class, [ Project::class]);
//
//    }

}
