<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fa;
            padding: 30px;
        }

        .section-card {
            background: #fff;
            border-left: 6px solid #0d6efd;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .flight-card {
            border-left: 5px solid #198754;
            background: #fcfcfc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.04);
            margin-bottom: 20px;
        }

        .flight-header {
            font-weight: 600;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .assigned-crew ul {
            padding-left: 18px;
            margin-bottom: 0;
        }

        .btn-sm {
            padding: 6px 12px;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn {
            border-radius: 8px;
        }

        .card-footer-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="section-card">
        <h2 class="mb-3">Admin Dashboard</h2>
        <h5 class="mb-3">Add New Flight</h5>
        <form action="{{ route('admin.flight.create') }}" method="POST">
            @csrf
            <div class="row g-2">
                <div class="col-md-2"><input name="flight_number" placeholder="Flight No" class="form-control" required></div>
                <div class="col-md-3"><input name="destination" placeholder="Destination" class="form-control" required></div>
                <div class="col-md-3"><input type="datetime-local" name="departure" class="form-control" required></div>
                <div class="col-md-3"><input type="datetime-local" name="arrival" class="form-control" required></div>
                <div class="col-md-3 mt-2"><input name="flight_time" placeholder="Flight Time" class="form-control" required></div>
                <div class="col-md-3 mt-2"><input name="aircraft_type" placeholder="Aircraft Type" class="form-control" required></div>
                <div class="col-md-3 mt-2">
                    <button class="btn btn-primary w-100">Add Flight</button>
                </div>
            </div>
        </form>
    </div>

    <div class="section-card">
        <h5 class="mb-3">All Flights</h5>
        @foreach($flights as $flight)
            <div class="flight-card">
                <div class="flight-header">
                    <div>{{ $flight->flight_number }} → {{ $flight->destination }}</div>
                    <form action="{{ route('admin.flight.delete', $flight->id) }}" method="POST" onsubmit="return confirm('Delete this flight?')">
                        @csrf
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>

                <form action="{{ route('admin.flight.update', $flight->id) }}" method="POST">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md-3"><input name="destination" value="{{ $flight->destination }}" class="form-control"></div>
                        <div class="col-md-2"><input name="flight_time" value="{{ $flight->flight_time }}" class="form-control"></div>
                        <div class="col-md-3"><input type="datetime-local" name="departure" value="{{ \Carbon\Carbon::parse($flight->departure)->format('Y-m-d\TH:i') }}" class="form-control"></div>
                        <div class="col-md-3"><input type="datetime-local" name="arrival" value="{{ \Carbon\Carbon::parse($flight->arrival)->format('Y-m-d\TH:i') }}" class="form-control"></div>
                        <div class="col-md-3 mt-2"><input name="aircraft_type" value="{{ $flight->aircraft_type }}" class="form-control"></div>
                        <div class="col-md-3 mt-2">
                            <button class="btn btn-success w-100">Update</button>
                        </div>
                    </div>
                </form>

                <form action="{{ route('admin.flight.reset', $flight->id) }}" method="POST" class="mt-3">
                    @csrf
                    <button class="btn btn-warning">Reset Crew Assignments</button>
                </form>

                <div class="assigned-crew mt-3">
                    <strong>Assigned Crew:</strong>
                    <ul>
                        @forelse($flight->crews as $crew)
                            <li>{{ $crew->full_name }} ({{ $crew->rank }})</li>
                        @empty
                            <li><em>No crew assigned.</em></li>
                        @endforelse
                    </ul>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-end mt-4">
            <a href="/logout" class="btn btn-dark">Logout</a>
        </div>
    </div>

</body>
</html>
