<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crew;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'staff_number' => 'required|string|max:255|unique:crews',
            'rank' => 'required|string',
            'nric' => 'required|string|max:20',
            'passport_number' => 'required|string|max:50',
            'issue_date' => 'required|date',
            'expired_date' => 'required|date|after_or_equal:issue_date',
            'issue_country' => 'required|string|max:100',
            'gender' => 'required|string',
        ]);

        Crew::create($request->all());

        return redirect()->route('login.show')->with('success', 'Registration successful. Please login.');
    }
}