<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleasedPatients extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'release_date'
    ];
}
