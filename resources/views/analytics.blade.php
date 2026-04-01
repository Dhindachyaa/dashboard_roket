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

<<<<<<< HEAD
    <div class="row g-4 mb-4">
=======
    <div class="row g-4">
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
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
<<<<<<< HEAD

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
                    <p class="mb-0 small" id="rekomendasiText">
                        Menghubungkan ke database sensor untuk menyusun rekomendasi AI...
                    </p>
                </div>
            </div>
        </div>
    </div>
=======
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
<<<<<<< HEAD
    // ==========================================
    // 1. GAUGE CHARTS (Baris 1 - Statis)
    // ==========================================
=======
    // --- GAUGE CHARTS (Baris 1) ---
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
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

<<<<<<< HEAD

    // ==========================================
    // 2. HISTORICAL CHART (Baris 2 - DINAMIS)
    // ==========================================
    const ctxHistorical = document.getElementById('chartHistorical');
    let historicalChart = new Chart(ctxHistorical, {
        type: 'line',
        data: {
            labels: [], 
            datasets: [
                {
                    label: 'PM2.5 (µg/m³)',
                    data: [], 
=======
    // --- HISTORICAL CHART (Baris 2) ---
    new Chart(document.getElementById('chartHistorical'), {
        type: 'line',
        data: {
            labels: ['00:00', '02:00', '04:00', '06:00', '08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '22:00'],
            datasets: [
                {
                    label: 'PM2.5 (µg/m³)',
                    data: [20, 18, 15, 25, 45, 30, 55, 35, 45, 20, 30, 25],
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
                    borderColor: '#198754',
                    backgroundColor: 'rgba(25, 135, 84, 0.1)',
                    fill: true,
                    tension: 0.4
                },
                {
<<<<<<< HEAD
                    label: 'Gas CO (ppm)',
                    data: [], 
=======
                    label: 'CO (ppm)',
                    data: [12, 10, 8, 15, 20, 18, 30, 32, 5, 8, 12, 10],
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
                    borderColor: '#ffc107',
                    backgroundColor: 'rgba(255, 193, 7, 0.1)',
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: { maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
    });

<<<<<<< HEAD
    function fetchHistoricalData() {
        fetch('/api/get-history')
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    let newLabels = [];
                    let pm25Data = [];
                    let gasData = [];

                    data.forEach(item => {
                        let timeObj = new Date(item.updated_at || item.created_at);
                        let timeString = timeObj.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
                        newLabels.push(timeString);
                        pm25Data.push(item.pm25);
                        gasData.push(item.gas);
                    });

                    historicalChart.data.labels = newLabels;
                    historicalChart.data.datasets[0].data = pm25Data;
                    historicalChart.data.datasets[1].data = gasData;
                    historicalChart.update();
                }
            })
            .catch(error => console.error('Gagal history:', error));
    }


    // ==========================================
    // 3. PEAK TIME ANALYSIS (Baris 3 Kiri - DINAMIS)
    // ==========================================
    const ctxPeakTime = document.getElementById('chartPeakTime');
    let peakChart = new Chart(ctxPeakTime, {
        type: 'bar',
        data: {
            labels: [], 
            datasets: [
                { label: 'Rata-rata PM2.5', data: [], backgroundColor: '#3b82f6', borderRadius: 5 },
                { label: 'Frekuensi Asap (BAHAYA)', type: 'line', data: [], borderColor: '#ef4444', tension: 0.3 }
=======
    // --- PEAK TIME ANALYSIS (Baris 3 Kiri) ---
    new Chart(document.getElementById('chartPeakTime'), {
        type: 'bar',
        data: {
            labels: ['06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
            datasets: [
                { label: 'Visitor Traffic', data: [5, 10, 13, 14, 12, 8], backgroundColor: '#3b82f6', borderRadius: 5 },
                { label: 'AQI Decline', type: 'line', data: [1, 2, 8, 10, 15, 5], borderColor: '#ef4444', tension: 0.3 }
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
            ]
        },
        options: { maintainAspectRatio: false }
    });

<<<<<<< HEAD
    function fetchPeakTimeData() {
        fetch('/api/get-peak-time')
            .then(response => response.json())
            .then(data => {
                if (data && data.labels.length > 0) {
                    peakChart.data.labels = data.labels;
                    peakChart.data.datasets[0].data = data.pm25;
                    peakChart.data.datasets[1].data = data.bahaya;
                    peakChart.update();
                }
            })
            .catch(error => console.error('Gagal peak time:', error));
    }


    // ==========================================
    // 4. AI PREDICTION (Baris 3 Kanan - DINAMIS)
    // ==========================================
    const ctxPrediction = document.getElementById('chartPrediction');
    let predictionChart = new Chart(ctxPrediction, {
        type: 'line',
        data: {
            labels: [], 
            datasets: [{
                label: 'Predicted AQI (PM2.5)',
                data: [], 
=======
    // --- AI PREDICTION (Baris 3 Kanan) ---
    new Chart(document.getElementById('chartPrediction'), {
        type: 'line',
        data: {
            labels: [0, 3, 6, 9, 12, 15, 18, 21, 24],
            datasets: [{
                label: 'Predicted AQI',
                data: [60, 45, 30, 50, 80, 110, 120, 90, 70],
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
                borderColor: '#0ea5e9',
                backgroundColor: 'rgba(14, 165, 233, 0.2)',
                fill: true,
                tension: 0.5
            }]
        },
<<<<<<< HEAD
        options: { maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
    });

    function fetchPredictionData() {
        fetch('/api/get-prediction')
            .then(response => response.json())
            .then(data => {
                if (data && data.labels.length > 0) {
                    predictionChart.data.labels = data.labels;
                    predictionChart.data.datasets[0].data = data.data;
                    predictionChart.update();
                }
            })
            .catch(error => console.error('Gagal prediksi:', error));
    }

    // ==========================================
    // 5. REKOMENDASI SISTEM & DETAIL SENSOR (BARU)
    // ==========================================
    function fetchSensorDetail() {
        // Menggunakan API get-sensor yang sama dengan Dashboard utama
        fetch('/api/get-sensor')
            .then(response => response.json())
            .then(data => {
                if (data) {
                    // Update Angka Kiri
                    document.getElementById('detailGas').innerText = data.gas + ' ppm';
                    document.getElementById('detailPm25').innerText = data.pm25 + ' µg/m³';

                    let korelasiText = document.getElementById('detailKorelasiText');
                    let rekBox = document.getElementById('rekomendasiBox');
                    let rekIcon = document.getElementById('rekomendasiIcon');
                    let rekTitle = document.getElementById('rekomendasiTitle');
                    let rekText = document.getElementById('rekomendasiText');

                    // Logika Rekomendasi Berdasarkan Status AI
                    if (data.ai_status_asap === 'BAHAYA') {
                        // Jika BAHAYA -> Merah
                        korelasiText.innerText = "(Tinggi / Tidak Stabil)";
                        korelasiText.className = "small mb-0 fw-bold text-danger";
                        
                        rekBox.className = "p-4 rounded-3 bg-danger bg-opacity-10 border-start border-4 border-danger mt-2 text-danger";
                        rekIcon.className = "bi bi-exclamation-triangle-fill fs-5 me-2";
                        rekTitle.innerText = "Peringatan Sistem!";
                        rekText.innerText = "Terdeteksi kadar asap/polusi sangat tinggi! Rekomendasi AI: Segera nyalakan kipas exhaust dan periksa area Kalikesek.";
                    } else {
                        // Jika AMAN -> Hijau (Seperti referensi Anda)
                        korelasiText.innerText = "(Stabil / Rendah)";
                        korelasiText.className = "small mb-0 fw-bold text-success";

                        rekBox.className = "p-4 rounded-3 bg-success bg-opacity-10 border-start border-4 border-success mt-2 text-success";
                        rekIcon.className = "bi bi-check-circle-fill fs-5 me-2";
                        rekTitle.innerText = "Status Sistem Aman";
                        rekText.innerText = "Kondisi ideal. Kualitas udara bersih, suhu dan kelembaban sangat ideal untuk kenyamanan pengunjung.";
                    }
                }
            })
            .catch(error => console.error('Gagal mengambil data detail sensor:', error));
    }


    // ==========================================
    // JALANKAN SEMUA FUNGSI (AUTO-UPDATE)
    // ==========================================
    fetchHistoricalData();
    fetchPeakTimeData();
    fetchPredictionData();
    fetchSensorDetail(); // Jalankan fungsi baru

    // Auto Refresh
    setInterval(fetchHistoricalData, 5000);
    setInterval(fetchPeakTimeData, 10000);
    setInterval(fetchPredictionData, 10000);
    setInterval(fetchSensorDetail, 3000); // Cek rekomendasi setiap 3 detik
=======
        options: { 
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
        }
    });
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
</script>
@endsection