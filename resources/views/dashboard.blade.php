<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Global Institute</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- Tambahkan menu navbar di sini jika diperlukan -->
                </ul>
                <div class="d-flex align-items-center">
                    <!-- Gambar Profile -->
                    <img src="{{ asset('images/kobo.png') }}" alt="Logo" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                    <!-- Tombol Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="profile">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Profile Image">
            <h4>Global Institute</h4>
        </div>
        <ul>
            <li><i class="fas fa-tachometer-alt"></i> <a href="#">Dashboard</a></li>
            <li>
                <i class="fas fa-user"></i> Karyawan
                <ul class="submenu">
                    <li><a href="#">Dosen</a></li>
                    <li><a href="#">Staff</a></li>
                </ul>
            </li>
            <li>
                <i class="fas fa-info-circle"></i> Informasi
                <ul class="submenu">
                    <li><a href="#">Agenda</a></li>
                    <li><a href="#">Jadwal</a></li>
                </ul>
            </li>
            <li>
                <i class="fas fa-building"></i> Gedung
                <ul class="submenu">
                    <li><a href="#">Kelas</a></li>
                    <li><a href="#">Ruangan</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container mt-4">
            <h2 class="text-center mb-4">Dashboard</h2>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Mahasiswa</h5>
                            <p>Laki-laki: {{ $data_mahasiswa['laki'] }}</p>
                            <p>Perempuan: {{ $data_mahasiswa['perempuan'] }}</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Kehadiran</h5>
                            <p>Hadir: {{ $data_kehadiran['Hadir'] ?? 0 }}</p>
                            <p>Izin: {{ $data_kehadiran['Izin'] ?? 0 }}</p>
                            <p>Sakit: {{ $data_kehadiran['Sakit'] ?? 0 }}</p>
                            <p>Tanpa Keterangan: {{ $data_kehadiran['Tanpa Keterangan'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Chart -->
            <div class="chart-container mt-4">
                <canvas id="kehadiranChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('kehadiranChart').getContext('2d');
        var kehadiranChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Hadir', 'Izin', 'Sakit', 'Tanpa Keterangan'],
                datasets: [{
                    label: 'Jumlah Kehadiran',
                    data: [{{ $kehadiran_chart['Hadir'] }}, {{ $kehadiran_chart['Izin'] }}, {{ $kehadiran_chart['Sakit'] }}, {{ $kehadiran_chart['Tanpa Keterangan'] }}],
                    backgroundColor: ['#4CAF50', '#FF9800', '#F44336', '#9E9E9E'],
                    borderColor: ['#388E3C', '#F57C00', '#D32F2F', '#757575'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
