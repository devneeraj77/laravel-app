<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - FlightFlareMart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3>Welcome, {{ session('admin_name') }}</h3>
        <p>This is your admin dashboard.</p>
        <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
    </div>
</div>

</body>
</html>
