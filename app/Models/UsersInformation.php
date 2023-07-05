<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class UsersInformation extends Model
{
    use HasFactory, SoftDeletes, HasRoles;

    protected $guarded = [];

    /**
     * Get the user associated with the UsersInformation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilities(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Facilities::class, 'facility_id', 'facility');
    }

    /**
     * Get the user that owns the UsersInformation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'id')->withTrashed();
    }
}
