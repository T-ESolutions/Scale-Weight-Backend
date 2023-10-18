<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $appends = ['name'];

    const PENDING_STATUS = 1;
    const CONFIRMED_STATUS = 2;
    const ACCEPTED_STATUS = 3;
    const DELIVERED_STATUS = 4;
    const FINISHED_STATUS = 5;

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

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'state_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'state_id')->active();
    }
}
