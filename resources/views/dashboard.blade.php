<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #08023b;
            padding: 30px;
        }

        .dashboard-box {
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            max-width: 900px;
            margin: auto;
        }

        h2,
        h4 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 1.25rem;
            margin-top: 25px;
            padding-bottom: 5px;
            border-bottom: 1px solid #ddd;
        }

        ul {
            padding-left: 18px;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .badge {
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 10px;
        }

        .section-title {
            background-color: #f8f9fa;
            padding: 8px 12px;
            border-left: 4px solid #007bff;
            border-radius: 4px;
            margin-top: 30px;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>

    <div class="dashboard-box">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Welcome, {{ ucwords(strtolower($crew->rank)) }} {{ ucwords($crew->full_name) }}</h2>
            </div>
            <div class="text-end">
                <span class="badge bg-primary fs-6 px-3 py-2">Flight No: {{ $flight->flight_number }}</span>
            </div>
        </div>

        <!-- Flight Info -->
        <div class="mb-4 p-3 bg-light border-start border-primary border-4 rounded">
            <h5 class="fw-semibold mb-3 border-bottom pb-2">Flight Information</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Destination:</strong> {{ $flight->destination }}</p>
                    <p><strong>Departure:</strong> {{ $flight->departure }}</p>
                    <p><strong>Arrival:</strong> {{ $flight->arrival }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Flight Time:</strong> {{ $flight->flight_time }}</p>
                    <p><strong>Aircraft Type:</strong> {{ $flight->aircraft_type }}</p>
                </div>
            </div>
        </div>

        <!-- Key Crew -->
        <div class="mb-4 p-3 bg-light border-start border-info border-4 rounded">
            <h5 class="fw-semibold mb-3 border-bottom pb-2 text-info">Key Flight Crew</h5>
            <div class="row row-cols-1 row-cols-md-2 g-2">
                <div><strong>Captain:</strong> {{ $roles['CAPTAIN'] ?? '—' }}</div>
                <div><strong>First Officer:</strong> {{ $roles['FIRST OFFICER'] ?? '—' }}</div>
                <div><strong>Inflight Supervisor:</strong> {{ $roles['INFLIGHT SUPERVISOR'] ?? '—' }}</div>
            </div>
        </div>

        <div class="section-title">Cabin Crew List (Max 10)</div>
        <table class="table table-bordered table-striped table-hover mt-3 align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Name</th>
                    <th>Rank</th>
                </tr>
            </thead>
            <tbody>
                @php $loggedInStaff = session('staff_number'); @endphp
                @forelse($cabinCrew as $index => $member)
                    @php
                        $isUser = strtolower($member['name']) === strtolower($crew->full_name);
                    @endphp
                    <tr @if ($isUser) style="background-color: #d1ecf1;" @endif>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            {{ $member['name'] }}
                            @if ($isUser)
                                <span class="badge bg-info text-dark ms-2">You</span>
                            @endif
                        </td>
                        <td>{{ $member['rank'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No crew assigned yet.</td>
                    </tr>
                @endforelse

                {{-- Fill remaining empty rows to 10 --}}
                @for ($i = count($cabinCrew) + 1; $i <= 10; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>—</td>
                        <td>—</td>
                    </tr>
                @endfor
            </tbody>
        </table>


        <div class="d-flex flex-wrap gap-2 justify-content-end mt-4">
            @if (in_array(strtoupper(session('rank')), ['CAPTAIN', 'FIRST OFFICER', 'INFLIGHT SUPERVISOR']))
                <a href="{{ route('print.crew') }}" class="btn btn-secondary px-4">Print Crew List</a>
            @endif
            <a href="/logout" class="btn btn-danger px-4">Logout</a>
        </div>
    </div>

</body>

</html>
