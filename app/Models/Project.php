<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    const ADDRESS_TYPES = ['url', 'map'];

    const TYPE = ['project', 'contract'];

    const ACTIVE_PROJECT = ['pending', 'active', 'inactive'];

    protected $appends = ['name', 'is_started'];


    public function getIsStartedAttribute()
    {
        if (Carbon::now()->format('Y-m-d') < $this->confirm_date) {
            return true;
        } else {
            return false;
        }
    }

    public function getProgressPercentAttribute()
    {
        $total_days = $this->project_levels->sum('level_time');
        $complete_levels_days = $this->complete_levels->sum('level_time');
        if($total_days > 0){
            return $complete_levels_days / $total_days  * 100;
        }else{
            return 0 ;
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

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function general_supervisor()
    {
        return $this->belongsTo(User::class, 'general_supervisor_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function knownUs()
    {
        return $this->belongsTo(ProjectKnowUs::class, 'know_us_id');
    }

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class, 'type_id');
    }

    public function area()
    {
        return $this->belongsTo(ProjectArea::class, 'area_id');
    }

    public function duration()
    {
        return $this->belongsTo(ProjectDuration::class, 'duration_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    public function ProjectContract()
    {
        return $this->hasOne(ProjectContract::class, 'project_id');
    }

    public function projectPaids()
    {
        return $this->hasOne(ProjectPaid::class, 'project_id');
    }

    public function ProjectInstallment()
    {
        return $this->hasMany(ProjectInstallment::class, 'project_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function project_paid()
    {
        return $this->hasMany(ProjectPaid::class, 'project_id');
    }

    public function project_levels()
    {
        return $this->hasMany(ProjectLevel::class, 'project_id');
    }

    public function not_complete_levels()
    {
        return $this->hasMany(ProjectLevel::class, 'project_id')->where('is_completed',0);
    }

    public function complete_levels()
    {
        return $this->hasMany(ProjectLevel::class, 'project_id')->where('is_completed',1);
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'project_id');
    }

   public function questionnaire()
    {
        return $this->hasMany(ProjectQuestionnaire::class, 'project_id');
    }

    public function unread_messages()
    {
        return $this->hasMany(Message::class, 'project_id')->where('is_seen_admin',0);
    }

    public function unread_client_messages()
    {
        return $this->hasMany(Message::class, 'project_id')->where('is_seen_client',0);
    }


    public function Payments()
    {
        return $this->hasMany(Payment::class, 'project_id')->where('type', 'income');
    }

    public function scopeArchived($query)
    {
        $query->where('is_archived', 1);
    }
    public function scopeNot_archived($query)
    {
        $query->where('is_archived', 0);
    }
    public function scopeActive($query)
    {
        $query->where('active', 1)->where('is_deleted',0);
    }
    public function scopeNot_deleted($query)
    {
        $query->where('is_deleted',0);
    }
    public function scopeIs_deleted($query)
    {
        $query->where('is_deleted',1);
    }

    public function scopeInactive($query)
    {
        $query->where('active', 0);
    }
    public function scopeAccepted($query)
    {
        $query->where('accept_date','!=',null);
    }
}
