<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #08023b;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
        }

        .login-box h2 {
            margin-bottom: 25px;
            font-weight: 600;
            text-align: center;
            color: #333;
        }

        .logo-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-header img {
            height: 60px;
        }

        .btn-primary {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
    </style>
</head>
<body>

    <div class="login-box">

        <div class="logo-header">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo">
        </div>

        <h2>Crew Login</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->has('login_error'))
            <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
        @endif

        <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Staff Number</label>
                <input type="text" name="staff_number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Flight Number</label>
                <input type="text" name="flight_number" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between gap-2 mt-3">
                <button type="submit" class="btn btn-primary w-50">Login</button>
                <a href="{{ route('register.show') }}" class="btn btn-success w-50 text-center">Register</a>
            </div>
        </form>
    </div>

</body>
</html>
