<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Crew Print Document</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 30px;
            font-size: 13px;
            color: #111;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .section-title {
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 8px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
        }

        p {
            margin: 3px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .footer {
            margin-top: 30px;
            font-size: 11px;
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body onload="window.print()">

    <h2>Flight Crew Manifest</h2>
    <p><strong>Flight Number:</strong> {{ $flight->flight_number }}</p>
    <p><strong>Destination:</strong> {{ $flight->destination }}</p>

    <div class="section-title">Flight Details</div>
    <p><strong>Departure:</strong> {{ $flight->departure }}</p>
    <p><strong>Arrival:</strong> {{ $flight->arrival }}</p>
    <p><strong>Aircraft Type:</strong> {{ $flight->aircraft_type }}</p>
    <p><strong>Flight Time:</strong> {{ $flight->flight_time }}</p>

    <div class="section-title">Key Crew</div>
    <p><strong>Captain:</strong> {{ $crewList->firstWhere('rank', 'CAPTAIN')->full_name ?? '—' }}</p>
    <p><strong>First Officer:</strong> {{ $crewList->firstWhere('rank', 'FIRST OFFICER')->full_name ?? '—' }}</p>
    <p><strong>Inflight Supervisor:</strong> {{ $crewList->firstWhere('rank', 'INFLIGHT SUPERVISOR')->full_name ?? '—' }}</p>

    <div class="section-title">Cabin Crew List</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Rank</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 1; @endphp
            @foreach($crewList as $member)
                @php
                    $specialRanks = ['CAPTAIN', 'FIRST OFFICER', 'PURSER', 'INFLIGHT SUPERVISOR'];
                @endphp
                @if(!in_array(strtoupper($member->rank), $specialRanks))
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $member->full_name }}</td>
                        <td>{{ $member->rank }}</td>
                    </tr>
                @endif
            @endforeach
            @for($i = $index; $i <= 10; $i++)
                <tr><td>{{ $i }}</td><td>—</td><td>—</td></tr>
            @endfor
        </tbody>
    </table>

    <div class="footer">
        Printed by {{ session('full_name') }} ({{ session('rank') }}) on {{ now()->format('Y-m-d H:i') }}
    </div>

</body>
</html>
