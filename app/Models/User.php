<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Bills;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, mixed>
     */
    protected $fillable = [
        'Firstname',
        'Lastname',
        'Username',
        'Phone',
        'email',
        'password',
        'role',
        'status',
        'avatar',
        'two_factor',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function bills()
    {
        return $this->belongsToMany(Bills::class, 'bill_mappings', 'user_id', 'bill_id');
    }

    public function hasRole($role = null)
    {
        if ($role == null) {
            return $this->role;
        } else {
            true;
        }
    }

    public function hasVerifiedEmail()
    {
        if ($this->email_verified_at !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function active()
    {
        if ($this->status == 'active') {
            return true;
        } else {
            return false;
        }
    }
}
