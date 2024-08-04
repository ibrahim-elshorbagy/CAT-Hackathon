<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'code',
        'expire_at',
        'ForgetPasswordCode',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function generateRegisterCode()
    {
        $this->timestamps = false;
        $this->code = rand(1000, 9999);
        $this->code = 1234;                                         //delete on production
        $this->expire_at = now()->addMinutes(60);
        $this->save();
    }

    public function generateForgetPasswordCode()
    {
        $this->ForgetPasswordCode = rand(1000, 9999);
        $this->ForgetPasswordCode = 1234;                           //delete on production
        $this->save();
    }
}
