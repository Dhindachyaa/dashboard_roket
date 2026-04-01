@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h4 class="fw-bold mb-1">Laporan Monitoring Lingkungan</h4>
                <p class="text-muted small mb-0">Analisis data historis sensor ROKET di Desa Kalikesek.</p>
            </div>
            <div class="d-flex gap-2">
                <input type="date" class="form-control rounded-pill px-3 shadow-sm border-0">
                <button class="btn btn-success px-4 rounded-pill shadow-sm fw-bold">
                    <i class="bi bi-download me-2"></i> Export PDF
                </button>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                <h6 class="text-muted mb-2">Rata-rata AQI (7 Hari Terakhir)</h6>
                <h2 class="fw-bold text-success mb-0">42</h2>
                <small class="text-success fw-bold">Status: Baik</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                <h6 class="text-muted mb-2">Waktu Polusi Tertinggi</h6>
                <h2 class="fw-bold text-danger mb-0">14:00</h2>
                <small class="text-muted">Kecenderungan siang hari</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                <h6 class="text-muted mb-2">Total Log Perangkat</h6>
                <h2 class="fw-bold text-primary mb-0">1,240</h2>
                <small class="text-muted">Data tersinkronisasi</small>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Waktu</th>
                        <th>Device ID</th>
                        <th>PM2.5 (µg/m³)</th>
                        <th>CO (ppm)</th>
                        <th>Suhu (°C)</th>
                        <th class="text-center">Kualitas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4">06 Feb 2024, 08:00</td>
                        <td>ROKET-ST-01</td>
                        <td>12.5</td>
                        <td>0.8</td>
                        <td>24.5</td>
                        <td class="text-center"><span class="badge bg-success rounded-pill px-3">Bagus</span></td>
                    </tr>
                    <tr>
                        <td class="ps-4">06 Feb 2024, 10:00</td>
                        <td>ROKET-ST-01</td>
                        <td>35.2</td>
                        <td>2.5</td>
                        <td>28.1</td>
                        <td class="text-center"><span class="badge bg-warning text-dark rounded-pill px-3">Sedang</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection