<!DOCTYPE html>
<html>
<head>
    <title>Detail Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container" style="max-width: 600px;">
        <div class="card">
            <div class="card-header bg-info text-white">
                Detail Data Karyawan
            </div>
            <div class="card-body">
                @if($employee)
                    <p><strong>ID:</strong> {{ $employee['id'] }}</p>
                    <p><strong>Nama:</strong> {{ $employee['employee_name'] }}</p>
                    <p><strong>Gaji:</strong> {{ $employee['employee_salary'] }}</p>
                    <p><strong>Umur:</strong> {{ $employee['employee_age'] }}</p>
                    <p><strong>Profile Image:</strong> {{ $employee['profile_image'] ?: '-' }}</p>
                @else
                    <p class="text-danger">Data tidak ditemukan atau API Error.</p>
                @endif
                
                <a href="{{ url('/') }}" class="btn btn-primary mt-3">Kembali ke List</a>
            </div>
        </div>
    </div>
</body>
</html>