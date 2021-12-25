<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'fullname',
        'username',
        'email',
        'password',
        'phone',
        'address',
        'token',
        'google_id',
        'facebook_id',
        'avatar',
        'province_id',
        'district_id',
        'ward_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders(){
        return $this->hasManyThrough(
            Order::class, 
            Transaction::class,
            'user_id',
            'transaction_id',
            'id',
            'id',
        );
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    public function checkPermissionAccess($permission_check)
    {
        $roles = Auth::user()->roles;
        foreach($roles as $role)
        {
            $permissions = $role->permissions;
            if($permissions->contains('key_code', $permission_check))
            {
                return true;
            }
        }

        return false;
    }
}
