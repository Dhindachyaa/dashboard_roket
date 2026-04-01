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

    <div class="row g-4 mb-4">
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

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 rounded-4 h-100">
                <h6 class="fw-bold mb-4 text-uppercase text-secondary" style="font-size: 0.85rem; letter-spacing: 0.5px;">Detail Sensor & Rekomendasi</h6>
                <p class="fw-bold mb-1">Korelasi Partikulat & Gas</p>
                <p class="text-muted small mb-4">(Data dari Sensor MQ-2 & PM2.5)</p>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary">Gas (PPM):</span>
                    <h6 class="fw-bold mb-0" id="detailGas">0 ppm</h6>
                </div>
                <div class="d-flex justify-content-between align-items-center border-bottom pb-4 mb-3">
                    <span class="text-secondary">PM2.5 (µg/m³):</span>
                    <h6 class="fw-bold mb-0" id="detailPm25">0 µg/m³</h6>
                </div>
                <p class="text-muted small mb-0 fw-bold" id="detailKorelasiText">(Menunggu data...)</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 rounded-4 h-100">
                <h6 class="fw-bold mb-4 text-uppercase text-secondary" style="font-size: 0.85rem; letter-spacing: 0.5px;">Rekomendasi Sistem AI</h6>
                <div id="rekomendasiBox" class="p-4 rounded-3 bg-light border-start border-4 border-secondary mt-2">
                    <div class="d-flex align-items-center mb-2">
                        <i id="rekomendasiIcon" class="bi bi-info-circle-fill fs-5 me-2 text-secondary"></i>
                        <h6 class="fw-bold mb-0" id="rekomendasiTitle">Memeriksa Status...</h6>
                    </div>
                    <p class="mb-0 small" id="rekomendasiText">Menghubungkan ke database sensor untuk menyusun rekomendasi AI...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // 1. GAUGE CHARTS
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

    // 2. HISTORICAL CHART
    const ctxHistorical = document.getElementById('chartHistorical');
    let historicalChart = new Chart(ctxHistorical, {
        type: 'line',
        data: {
            labels: [], 
            datasets: [
                { label: 'PM2.5 (µg/m³)', data: [], borderColor: '#198754', backgroundColor: 'rgba(25, 135, 84, 0.1)', fill: true, tension: 0.4 },
                { label: 'Gas CO (ppm)', data: [], borderColor: '#ffc107', backgroundColor: 'rgba(255, 193, 7, 0.1)', fill: true, tension: 0.4 }
            ]
        },
        options: { maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
    });

    function fetchHistoricalData() {
        fetch('/api/get-history')
            .then(r => r.json())
            .then(data => {
                if (data && data.length > 0) {
                    historicalChart.data.labels = data.map(item => {
                        let t = new Date(item.updated_at || item.created_at);
                        return t.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
                    });
                    historicalChart.data.datasets[0].data = data.map(i => i.pm25);
                    historicalChart.data.datasets[1].data = data.map(i => i.gas);
                    historicalChart.update();
                }
            });
    }

    // 3. PEAK TIME ANALYSIS
    const ctxPeakTime = document.getElementById('chartPeakTime');
    let peakChart = new Chart(ctxPeakTime, {
        type: 'bar',
        data: {
            labels: [], 
            datasets: [
                { label: 'Rata-rata PM2.5', data: [], backgroundColor: '#3b82f6', borderRadius: 5 },
                { label: 'Frekuensi Asap', type: 'line', data: [], borderColor: '#ef4444', tension: 0.3 }
            ]
        },
        options: { maintainAspectRatio: false }
    });

    function fetchPeakTimeData() {
        fetch('/api/get-peak-time').then(r => r.json()).then(data => {
            if (data && data.labels.length > 0) {
                peakChart.data.labels = data.labels;
                peakChart.data.datasets[0].data = data.pm25;
                peakChart.data.datasets[1].data = data.bahaya;
                peakChart.update();
            }
        });
    }

    // 4. AI PREDICTION
    const ctxPrediction = document.getElementById('chartPrediction');
    let predictionChart = new Chart(ctxPrediction, {
        type: 'line',
        data: {
            labels: [], 
            datasets: [{ label: 'Predicted AQI (PM2.5)', data: [], borderColor: '#0ea5e9', backgroundColor: 'rgba(14, 165, 233, 0.2)', fill: true, tension: 0.5 }]
        },
        options: { maintainAspectRatio: false }
    });

    function fetchPredictionData() {
        fetch('/api/get-prediction').then(r => r.json()).then(data => {
            if (data && data.labels.length > 0) {
                predictionChart.data.labels = data.labels;
                predictionChart.data.datasets[0].data = data.data;
                predictionChart.update();
            }
        });
    }

    // 5. SENSOR DETAIL & RECOMMENDATION
    function fetchSensorDetail() {
        fetch('/api/get-sensor').then(r => r.json()).then(data => {
            if (data) {
                document.getElementById('detailGas').innerText = data.gas + ' ppm';
                document.getElementById('detailPm25').innerText = data.pm25 + ' µg/m³';
                
                let kText = document.getElementById('detailKorelasiText');
                let rBox = document.getElementById('rekomendasiBox');
                let rIcon = document.getElementById('rekomendasiIcon');
                let rTitle = document.getElementById('rekomendasiTitle');
                let rText = document.getElementById('rekomendasiText');

                if (data.ai_status_asap === 'BAHAYA') {
                    kText.innerText = "(Tinggi / Tidak Stabil)";
                    kText.className = "small mb-0 fw-bold text-danger";
                    rBox.className = "p-4 rounded-3 bg-danger bg-opacity-10 border-start border-4 border-danger mt-2 text-danger";
                    rIcon.className = "bi bi-exclamation-triangle-fill fs-5 me-2";
                    rTitle.innerText = "Peringatan Sistem!";
                    rText.innerText = "Terdeteksi kadar asap tinggi! Rekomendasi AI: Segera nyalakan kipas exhaust di area Kalikesek.";
                } else {
                    kText.innerText = "(Stabil / Rendah)";
                    kText.className = "small mb-0 fw-bold text-success";
                    rBox.className = "p-4 rounded-3 bg-success bg-opacity-10 border-start border-4 border-success mt-2 text-success";
                    rIcon.className = "bi bi-check-circle-fill fs-5 me-2";
                    rTitle.innerText = "Status Sistem Aman";
                    rText.innerText = "Kondisi ideal. Kualitas udara bersih dan nyaman untuk pengunjung.";
                }
            }
        });
    }

    // INITIAL LOAD & AUTO REFRESH
    fetchHistoricalData(); fetchPeakTimeData(); fetchPredictionData(); fetchSensorDetail();
    setInterval(fetchHistoricalData, 5000);
    setInterval(fetchSensorDetail, 3000);
</script>
@endsection