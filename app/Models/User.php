<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    const Permission_types = ['dashboard','mail','new requests','project contracts','projects','reports','financial','settings'];
    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at', 'active', 'state_id', 'job_type_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['permissions'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function job()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function scopeEmp($query)
    {
        return $query->where('type', 'employee');
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
            return asset('uploads/users_images') . '/' . $image;
        }
        return asset('defaults/user_default.png');
    }

    public function getPermissionsAttribute($image)
    {
        return $this->role->permissions->pluck('name');
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $this->attributes['image'] = upload($image, 'users_images');
        }
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }


}
