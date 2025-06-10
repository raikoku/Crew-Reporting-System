<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'staff_number',
        'rank',
        'nric',
        'passport_number',
        'issue_date',
        'expired_date',
        'issue_country',
        'gender',
        'flight_id', // optional, can be null on registration
    ];
}
