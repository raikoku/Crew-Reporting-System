<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #08023b;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .register-box {
            background: #fff;
            padding: 35px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            max-width: 600px;
            width: 100%;
        }

        .register-box h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .logo-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-header img {
            height: 60px;
        }

        .btn-register {
            background-color: #007bff;
            border: none;
        }

        .btn-back {
            background-color: #6c757d;
            border: none;
        }

        @media (max-width: 576px) {
            .register-box {
                padding: 25px 20px;
            }

            .logo-header img {
                height: 50px;
            }
        }
    </style>
</head>
<body>

    <div class="register-box">

        <div class="logo-header">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo">
        </div>

        <h2>Crew Registration</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Staff Number</label>
                <input type="text" name="staff_number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Rank</label>
                <select name="rank" class="form-control" required>
                    <option value="">-- Select Rank --</option>
                    <option>FLIGHT STEWARD</option>
                    <option>FLIGHT STEWARDESS</option>
                    <option>LEADING STEWARD</option>
                    <option>LEADING STEWARDESS</option>
                    <option>INFLIGHT SUPERVISOR</option>
                    <option>CAPTAIN</option>
                    <option>FIRST OFFICER</option>
                </select>
            </div>

            <div class="mb-3">
                <label>NRIC</label>
                <input type="text" name="nric" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Passport Number</label>
                <input type="text" name="passport_number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Issue Date</label>
                <input type="date" name="issue_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Expired Date</label>
                <input type="date" name="expired_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Issue Country</label>
                <input type="text" name="issue_country" class="form-control" required>
            </div>

            <div class="mb-4">
                <label>Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="">-- Select Gender --</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>

            <div class="d-flex justify-content-between gap-2">
                <button type="submit" class="btn btn-register w-50 text-white">Register</button>
                <a href="{{ route('login.show') }}" class="btn btn-back w-50 text-white text-center">Back to Login</a>
            </div>
        </form>
    </div>

</body>
</html>
