<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crew;
use App\Models\Flight;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'staff_number' => 'required|string',
            'flight_number' => 'required|string',
        ]);

        // Admin bypass login
        if ($request->staff_number === 'admin' && $request->flight_number === 'admin') {
            session([
                'is_admin' => true,
                'staff_number' => 'admin',
                'full_name' => 'Admin'
            ]);
            return redirect('/admin');
        }

        $crew = Crew::where('staff_number', $request->staff_number)->first();
        $flight = Flight::where('flight_number', $request->flight_number)->first();

        if (!$crew) {
            return back()->withErrors(['login_error' => 'Crew not found. Please register first.']);
        }

        if (!$flight) {
            return back()->withErrors(['login_error' => 'Invalid flight number.']);
        }

        // Assign crew to flight if not already assigned
        if ($crew->flight_id === null) {
            $crew->flight_id = $flight->id;
            $crew->save();
        }

        // Ensure flight matches assigned one
        if ($crew->flight_id !== $flight->id) {
            return back()->withErrors(['login_error' => 'You are assigned to a different flight.']);
        }

        session([
            'staff_number' => $crew->staff_number,
            'full_name' => $crew->full_name,
            'rank' => $crew->rank,
            'flight_id' => $flight->id,
            'flight_number' => $flight->flight_number,
        ]);

        return redirect('/dashboard');
    }


    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
