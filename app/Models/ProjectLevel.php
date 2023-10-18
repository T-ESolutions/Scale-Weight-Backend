<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLevel extends Model
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

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function type()
    {
        return $this->belongsTo(LevelType::class, 'type_id');
    }

    public function unread_messages()
    {
        return $this->hasMany(Message::class, 'level_id')->where('is_seen_admin',0);
    }

    public function unread_client_messages()
    {
        return $this->hasMany(Message::class, 'level_id')->where('is_seen_client',0);
    }
}
