<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Crew;

class AdminController extends Controller
{
    public function index()
    {
        if (session('staff_number') !== 'admin') {
            return redirect('/login');
        }

        $flights = Flight::with('crews')->get();

        return view('admin.dashboard', compact('flights'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'flight_number' => 'required|unique:flights',
            'destination' => 'required',
            'departure' => 'required|date',
            'arrival' => 'required|date|after:departure',
            'flight_time' => 'required',
            'aircraft_type' => 'required',
        ]);

        Flight::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Flight added.');
    }

    public function update(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);
        $flight->update($request->all());

        return redirect()->route('admin.index')->with('success', 'Flight updated.');
    }

    public function delete($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();

        return redirect()->route('admin.index')->with('success', 'Flight deleted.');
    }

    public function reset($id)
    {
        Crew::where('flight_id', $id)->update(['flight_id' => null]);

        return redirect()->route('admin.index')->with('success', 'Crew assignments reset.');
    }
}

