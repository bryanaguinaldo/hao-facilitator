<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the facilities
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usersInformation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UsersInformation::class, 'facility', 'facility_id');
    }

    /**
     * Get the user that owns the facilities
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'facility_id', 'facility');
    }
}
