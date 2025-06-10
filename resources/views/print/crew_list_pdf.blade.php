<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Flight Crew Boarding Pass</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
            color: #111;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #000;
        }
        .section-title {
            font-weight: bold;
            margin-top: 20px;
            border-bottom: 1px solid #444;
            padding-bottom: 5px;
        }
        .info {
            margin-top: 10px;
            line-height: 1.6;
        }
        .info p {
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }
        th, td {
            border: 1px solid #999;
            padding: 6px 8px;
            font-size: 13px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Flight Crew Boarding Document</h2>
        <p>Flight Number: <strong>{{ $flight->flight_number }}</strong></p>
    </div>

    <div class="section-title">Flight Information</div>
    <div class="info">
        <p><strong>Destination:</strong> {{ $flight->destination }}</p>
        <p><strong>Departure:</strong> {{ $flight->departure }}</p>
        <p><strong>Arrival:</strong> {{ $flight->arrival }}</p>
        <p><strong>Flight Time:</strong> {{ $flight->flight_time }}</p>
        <p><strong>Aircraft Type:</strong> {{ $flight->aircraft_type }}</p>
    </div>

    <div class="section-title">Key Flight Crew</div>
    <div class="info">
        <p><strong>Captain:</strong>
            {{ $crewList->firstWhere('rank', 'CAPTAIN')->full_name ?? '—' }}
        </p>
        <p><strong>First Officer:</strong>
            {{ $crewList->firstWhere('rank', 'FIRST OFFICER')->full_name ?? '—' }}
        </p>
        <p><strong>Purser:</strong>
            {{ $crewList->firstWhere('rank', 'PURSER')->full_name ?? '—' }}
        </p>
        <p><strong>Inflight Supervisor:</strong>
            {{ $crewList->firstWhere('rank', 'INFLIGHT SUPERVISOR')->full_name ?? '—' }}
        </p>
    </div>

    <div class="section-title">Cabin Crew List (Max 10)</div>
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
                <tr>
                    <td>{{ $i }}</td>
                    <td>—</td>
                    <td>—</td>
                </tr>
            @endfor
        </tbody>
    </table>

    <div class="footer">
        Printed by {{ session('full_name') }} ({{ session('rank') }}) on {{ now()->format('Y-m-d H:i') }}
    </div>

</body>
</html>
