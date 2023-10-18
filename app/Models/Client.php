<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Client extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at', 'active', 'state_id', 'branch_id'];

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }


    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/clients_images') . '/' . $image;
        }
        return asset('defaults/client_default.png');
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $this->attributes['image'] = upload($image, 'clients_images');;
        }
    }
}
