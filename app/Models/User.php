<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the UsersInformation associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usersinformation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UsersInformation::class, 'id', 'id');
    }

    /**
     * Get the Facilities associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilities(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Facilities::class, 'facility_id', 'facility');
    }
}
