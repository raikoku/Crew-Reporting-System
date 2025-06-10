<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crew;
use App\Models\Flight;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (!session()->has('staff_number')) {
            return redirect('/login');
        }

        // Admin goes to admin page
        if (session('staff_number') === 'admin') {
            return redirect('/admin');
        }

        $crew = Crew::where('staff_number', session('staff_number'))->first();
        $flight = Flight::find(session('flight_id'));

        if (!$crew || !$flight) {
            return redirect('/login')->withErrors(['session_error' => 'Session expired or data missing.']);
        }

        $specialRoles = ['CAPTAIN', 'FIRST OFFICER', 'INFLIGHT SUPERVISOR'];
        $allCrew = Crew::where('flight_id', $flight->id)->get();

        $roleAssignments = [
            'CAPTAIN' => null,
            'FIRST OFFICER' => null,
            'INFLIGHT SUPERVISOR' => null,
        ];

        $cabinCrew = [];

        foreach ($allCrew as $member) {
            $rank = strtoupper($member->rank);

            if (in_array($rank, array_keys($roleAssignments))) {
                // Assign special role if not already taken
                if ($roleAssignments[$rank] === null) {
                    $roleAssignments[$rank] = $member->full_name;
                }
            } else {
                $cabinCrew[] = [
                    'name' => $member->full_name,
                    'rank' => $member->rank,
                ];
            }
        }

        return view('dashboard', [
            'crew' => $crew,
            'flight' => $flight,
            'roles' => $roleAssignments,
            'cabinCrew' => $cabinCrew,
        ]);
    }
}
