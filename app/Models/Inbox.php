<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['name', 'comment'];

    public function getNameAttribute()
    {
        if (\app()->getLocale() == "en") {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }

    public function getCommentAttribute()
    {
        if (\app()->getLocale() == "en") {
            return $this->comment_en;
        } else {
            return $this->comment_ar;
        }
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function target()
    {
        return $this->morphTo('target');
    }
}
