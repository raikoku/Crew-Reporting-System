<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Crew::create([
            'full_name' => 'Admin',
            'staff_number' => 'admin',
            'rank' => 'Admin',
            'nric' => 'N/A',
            'passport_number' => 'N/A',
            'issue_date' => now(),
            'expired_date' => now(),
            'issue_country' => 'N/A',
            'gender' => 'N/A',
            'flight_id' => null,
        ]);
    }
}
