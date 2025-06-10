<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Flight extends Model
{
    // Allow mass assignment
    protected $fillable = [
        'flight_number',
        'destination',
        'departure',
        'arrival',
        'flight_time',
        'aircraft_type',
    ];

    // Relationship: One flight has many crew members
    public function crews(): HasMany
    {
        return $this->hasMany(Crew::class);
    }
}
