@extends('admin')


@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <form action="{{ route('dashboard') }}" method="GET" id="yearFilterForm">
            <div class="form-group">
                <label for="year">Pilih Tahun:</label>
                <select name="year" id="year" class="form-control" onchange="document.getElementById('yearFilterForm').submit()">
                    @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                        <option value="{{ $i }}" {{ request('year', date('Y')) == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
        </form>
        <canvas id="rentChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('rentChart').getContext('2d');
        const rentalChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: `Jumlah Penyewaan - Tahun {{ $selectedYear }}`,
                    data: @json($chartData),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
    
@endsection
