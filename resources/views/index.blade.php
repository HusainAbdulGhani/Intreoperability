<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h2 class="mb-4">Daftar Karyawan</h2>
        
        <a href="{{ url('/create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Gaji</th>
                        <th>Umur</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $emp)
                    <tr>
                        <td>{{ $emp['id'] }}</td>
                        <td>{{ $emp['employee_name'] }}</td>
                        <td>{{ $emp['employee_salary'] }}</td>
                        <td>{{ $emp['employee_age'] }}</td>
                        <td>
                            <a href="{{ url('/detail/' . $emp['id']) }}" class="btn btn-info btn-sm text-white">View</a>
                            <a href="{{ url('/edit/' . $emp['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <a href="{{ url('/delete/' . $emp['id']) }}" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                               Delete
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data (Atau API sedang Limit)</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>