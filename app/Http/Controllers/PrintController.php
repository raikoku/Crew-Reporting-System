<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crew;
use App\Models\Flight;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function show(Request $request)
    {
        if (!session()->has('staff_number')) {
            return redirect('/login');
        }

        $allowedRanks = ['CAPTAIN', 'FIRST OFFICER', 'INFLIGHT SUPERVISOR'];
        $userRank = strtoupper(session('rank'));

        if (!in_array($userRank, $allowedRanks)) {
            return redirect('/dashboard')->withErrors(['access' => 'Unauthorized to print.']);
        }

        $crew = Crew::where('staff_number', session('staff_number'))->first();
        $flight = Flight::find(session('flight_id'));
        $allCrew = Crew::where('flight_id', $flight->id)->get();

        return view('print.crew_list', [
            'crew' => $crew,
            'flight' => $flight,
            'crewList' => $allCrew,
        ]);
    }

    public function exportPDF()
    {
        if (!session()->has('staff_number')) {
            return redirect('/login');
        }

        $allowedRanks = ['CAPTAIN', 'FIRST OFFICER', 'INFLIGHT SUPERVISOR'];
        $userRank = strtoupper(session('rank'));

        if (!in_array($userRank, $allowedRanks)) {
            return redirect('/dashboard')->withErrors(['access' => 'Unauthorized to print.']);
        }

        $crew = \App\Models\Crew::where('staff_number', session('staff_number'))->first();
        $flight = \App\Models\Flight::find(session('flight_id'));
        $allCrew = \App\Models\Crew::where('flight_id', $flight->id)->get();

        $pdf = Pdf::loadView('print.crew_list_pdf', [
            'crew' => $crew,
            'flight' => $flight,
            'crewList' => $allCrew,
        ]);

        return $pdf->download('crew-list-' . $flight->flight_number . '.pdf');
    }
}
