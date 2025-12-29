<!DOCTYPE html>
<html>
<head>
    <title>{{ $action == 'create' ? 'Tambah' : 'Edit' }} Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container" style="max-width: 600px;">
        <h2 class="mb-4">{{ $action == 'create' ? 'Tambah Data Baru' : 'Edit Data' }}</h2>

        <form action="{{ $action == 'create' ? url('/store') : url('/update/' . ($data['id'] ?? '')) }}" method="POST">
            
            <div class="mb-3">
                <label>Nama Karyawan</label>
                <input type="text" name="name" class="form-control" required 
                       value="{{ $data['employee_name'] ?? '' }}">
            </div>
            
            <div class="mb-3">
                <label>Gaji</label>
                <input type="number" name="salary" class="form-control" required 
                       value="{{ $data['employee_salary'] ?? '' }}">
            </div>
            
            <div class="mb-3">
                <label>Umur</label>
                <input type="number" name="age" class="form-control" required 
                       value="{{ $data['employee_age'] ?? '' }}">
            </div>

            <button type="submit" class="btn btn-success">
                {{ $action == 'create' ? 'Submit' : 'Save Edit' }}
            </button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>