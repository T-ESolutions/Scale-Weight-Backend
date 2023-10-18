<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function sender()
    {
        return $this->morphTo('sender');
    }

    public function receiver()
    {
        return $this->morphTo('receiver');
    }

    public function scopeParent($q)
    {
        return $q->where('parent_id', null);
    }

    public function un_seen_client()
    {

        return $this->hasMany(Mail::class, 'parent_id')->where('receiver_type', Client::class)->where('receiver_seen', 0);
    }

    public function un_seen_admin()
    {

        return $this->hasMany(Mail::class, 'parent_id')->where('receiver_type', User::class)->where('receiver_seen', 0);
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
