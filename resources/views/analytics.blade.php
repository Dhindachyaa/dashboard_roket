@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 rounded-4 h-100">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <p class="text-success fw-bold mb-1">AI Performance</p>
                        <h4 class="fw-bold mb-0">SVM (Smoke Detection)</h4>
                        <small class="text-danger">False Positives: 2%</small>
                    </div>
                    <div class="text-center">
                        <div style="width: 120px; height: 60px; position: relative;">
                            <canvas id="gaugeSVM"></canvas>
                            <div style="position: absolute; top: 70%; left: 50%; transform: translate(-50%, -50%);">
                                <h4 class="fw-bold mb-0">98%</h4>
                                <small class="text-muted" style="font-size: 10px;">Accuracy</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 rounded-4 h-100">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <p class="text-success fw-bold mb-1">AI Performance</p>
                        <h4 class="fw-bold mb-0">Decision Tree (AQI Classifier)</h4>
                        <small class="text-success">Consistent High Performance</small>
                    </div>
                    <div class="text-center">
                        <div style="width: 120px; height: 60px; position: relative;">
                            <canvas id="gaugeDT"></canvas>
                            <div style="position: absolute; top: 70%; left: 50%; transform: translate(-50%, -50%);">
                                <h4 class="fw-bold mb-0">96%</h4>
                                <small class="text-muted" style="font-size: 10px;">Accuracy</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm p-4 rounded-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0">Historical Air Quality Trends</h5>
                    <div class="btn-group btn-group-sm rounded-pill border p-1 bg-light">
                        <button class="btn btn-white rounded-pill shadow-sm px-3">Daily</button>
                        <button class="btn btn-transparent px-3">Weekly</button>
                        <button class="btn btn-transparent px-3">Monthly</button>
                    </div>
                </div>
                <div style="height: 300px;">
                    <canvas id="chartHistorical"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 rounded-4">
                <h5 class="fw-bold mb-4">Peak Time Analysis</h5>
                <div style="height: 250px;">
                    <canvas id="chartPeakTime"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 rounded-4">
                <h5 class="fw-bold mb-1">AI Prediction (24h Forecast)</h5>
                <p class="text-muted small">Tomorrow's Air Quality Prediction</p>
                <div style="height: 250px;">
                    <canvas id="chartPrediction"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // --- GAUGE CHARTS (Baris 1) ---
    const gaugeOptions = (value, color) => ({
        type: 'doughnut',
        data: {
            datasets: [{
                data: [value, 100 - value],
                backgroundColor: [color, '#e9ecef'],
                borderWidth: 0,
                circumference: 180,
                rotation: 270,
                cutout: '80%'
            }]
        },
        options: { plugins: { tooltip: { enabled: false } }, maintainAspectRatio: false }
    });

    new Chart(document.getElementById('gaugeSVM'), gaugeOptions(98, '#198754'));
    new Chart(document.getElementById('gaugeDT'), gaugeOptions(96, '#198754'));

    // --- HISTORICAL CHART (Baris 2) ---
    new Chart(document.getElementById('chartHistorical'), {
        type: 'line',
        data: {
            labels: ['00:00', '02:00', '04:00', '06:00', '08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '22:00'],
            datasets: [
                {
                    label: 'PM2.5 (µg/m³)',
                    data: [20, 18, 15, 25, 45, 30, 55, 35, 45, 20, 30, 25],
                    borderColor: '#198754',
                    backgroundColor: 'rgba(25, 135, 84, 0.1)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'CO (ppm)',
                    data: [12, 10, 8, 15, 20, 18, 30, 32, 5, 8, 12, 10],
                    borderColor: '#ffc107',
                    backgroundColor: 'rgba(255, 193, 7, 0.1)',
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: { maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
    });

    // --- PEAK TIME ANALYSIS (Baris 3 Kiri) ---
    new Chart(document.getElementById('chartPeakTime'), {
        type: 'bar',
        data: {
            labels: ['06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
            datasets: [
                { label: 'Visitor Traffic', data: [5, 10, 13, 14, 12, 8], backgroundColor: '#3b82f6', borderRadius: 5 },
                { label: 'AQI Decline', type: 'line', data: [1, 2, 8, 10, 15, 5], borderColor: '#ef4444', tension: 0.3 }
            ]
        },
        options: { maintainAspectRatio: false }
    });

    // --- AI PREDICTION (Baris 3 Kanan) ---
    new Chart(document.getElementById('chartPrediction'), {
        type: 'line',
        data: {
            labels: [0, 3, 6, 9, 12, 15, 18, 21, 24],
            datasets: [{
                label: 'Predicted AQI',
                data: [60, 45, 30, 50, 80, 110, 120, 90, 70],
                borderColor: '#0ea5e9',
                backgroundColor: 'rgba(14, 165, 233, 0.2)',
                fill: true,
                tension: 0.5
            }]
        },
        options: { 
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endsection