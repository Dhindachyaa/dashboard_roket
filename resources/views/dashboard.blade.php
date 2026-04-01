@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div id="card-status" class="card border-0 shadow-sm bg-success text-white p-4" style="transition: all 0.5s ease;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
<<<<<<< HEAD
                        <h6 class="text-uppercase mb-1 fw-bold" style="letter-spacing: 1px;">Status Sistem IoT (Hasil AI SVM)</h6>
=======
                        <h6 class="text-uppercase mb-1 fw-bold" style="letter-spacing: 1px;">Status Sistem IoT</h6>
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
                        <h1 id="text-status" class="display-4 fw-bold mb-0">MEMUAT...</h1>
                    </div>
                    <div class="text-end">
                        <i id="icon-status" class="bi bi-shield-check" style="font-size: 4rem; opacity: 0.5;"></i>
                        <p class="mb-0 mt-2">Update: <span id="last_update">-</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
<<<<<<< HEAD
                    <div class="text-primary mb-3"><i class="bi bi-thermometer-half fs-1"></i></div>
                    <h6 class="text-muted fw-bold text-uppercase small">Suhu</h6>
                    <h2 class="fw-bold my-2"><span id="val-suhu">0</span><small class="fs-6 text-muted ms-1">°C</small></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <div class="text-info mb-3"><i class="bi bi-droplet-half fs-1"></i></div>
                    <h6 class="text-muted fw-bold text-uppercase small">Kelembapan</h6>
                    <h2 class="fw-bold my-2"><span id="val-hum">0</span><small class="fs-6 text-muted ms-1">%</small></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <div class="text-warning mb-3"><i class="bi bi-cloud-haze2 fs-1"></i></div>
                    <h6 class="text-muted fw-bold text-uppercase small">Gas (CO)</h6>
                    <h2 class="fw-bold my-2"><span id="val-gas">0</span><small class="fs-6 text-muted ms-1">unit</small></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <div class="text-secondary mb-3"><i class="bi bi-wind fs-1"></i></div>
                    <h6 class="text-muted fw-bold text-uppercase small">PM2.5</h6>
                    <h2 class="fw-bold my-2"><span id="val-pm25">0</span><small class="fs-6 text-muted ms-1">µg/m³</small></h2>
=======
                    <div class="text-primary mb-3">
                        <i class="bi bi-thermometer-half fs-1"></i>
                    </div>
                    <h6 class="text-muted fw-bold text-uppercase small">Suhu</h6>
                    <h2 class="fw-bold my-2"><span id="val-suhu">0</span><small class="fs-6 text-muted ms-1">°C</small></h2>
                    <div class="progress mt-3" style="height: 6px;">
                        <div id="bar-suhu" class="progress-bar bg-primary" role="progressbar" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <div class="text-info mb-3">
                        <i class="bi bi-droplet-half fs-1"></i>
                    </div>
                    <h6 class="text-muted fw-bold text-uppercase small">Kelembapan</h6>
                    <h2 class="fw-bold my-2"><span id="val-hum">0</span><small class="fs-6 text-muted ms-1">%</small></h2>
                    <div class="progress mt-3" style="height: 6px;">
                        <div id="bar-hum" class="progress-bar bg-info" role="progressbar" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <div class="text-warning mb-3">
                        <i class="bi bi-cloud-haze2 fs-1"></i>
                    </div>
                    <h6 class="text-muted fw-bold text-uppercase small">Gas (CO)</h6>
                    <h2 class="fw-bold my-2"><span id="val-gas">0</span><small class="fs-6 text-muted ms-1">unit</small></h2>
                    <div class="progress mt-3" style="height: 6px;">
                        <div id="bar-gas" class="progress-bar bg-warning" role="progressbar" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <div class="text-secondary mb-3">
                        <i class="bi bi-wind fs-1"></i>
                    </div>
                    <h6 class="text-muted fw-bold text-uppercase small">PM2.5</h6>
                    <h2 class="fw-bold my-2"><span id="val-pm25">0</span><small class="fs-6 text-muted ms-1">µg/m³</small></h2>
                    <div class="progress mt-3" style="height: 6px;">
                        <div id="bar-pm25" class="progress-bar bg-secondary" role="progressbar" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                    <span class="fw-bold">Lokasi Node:</span>
                    <span class="ms-2 text-muted">Desa Kalikesek - Area Monitoring</span>
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function fetchData() {
<<<<<<< HEAD
=======
        // Memanggil API Laravel yang sudah kamu buat
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
        fetch('/api/get-sensor')
            .then(response => response.json())
            .then(data => {
                if (data) {
<<<<<<< HEAD
                    // Update Angka Sensor
                    const suhuEl = document.getElementById('val-suhu');
                    const humEl = document.getElementById('val-hum');
                    const gasEl = document.getElementById('val-gas');
                    const pmEl = document.getElementById('val-pm25');
                    const statusTextEl = document.getElementById('text-status');
                    const cardEl = document.getElementById('card-status');
                    const iconEl = document.getElementById('icon-status');
                    const updateEl = document.getElementById('last_update');

                    // Cek jika elemen ada sebelum diisi (menghindari error blank space)
                    if(suhuEl) suhuEl.innerText = data.suhu || 0;
                    if(humEl) humEl.innerText = data.kelembapan || 0;
                    if(gasEl) gasEl.innerText = data.gas || 0;
                    if(pmEl) pmEl.innerText = data.pm25 || 0;
                    if(updateEl) updateEl.innerText = data.updated_at || "-";

                    if(statusTextEl) statusTextEl.innerText = data.ai_status_asap || "NORMAL";

                    // Logika Perubahan Warna Berdasarkan Hasil AI
                    if (cardEl && (data.ai_color === 'red' || data.ai_status_asap === 'BAHAYA')) {
                        cardEl.className = 'card border-0 shadow-sm bg-danger text-white p-4';
                        if(iconEl) iconEl.className = 'bi bi-exclamation-triangle';
                    } else if (cardEl) {
                        cardEl.className = 'card border-0 shadow-sm bg-success text-white p-4';
                        if(iconEl) iconEl.className = 'bi bi-shield-check';
                    }
                }
            })
            .catch(error => console.error('Gagal:', error));
    }

    setInterval(fetchData, 2000);
=======
                    // 1. Update Angka Sensor
                    document.getElementById('val-suhu').innerText = data.suhu;
                    document.getElementById('val-hum').innerText = data.kelembapan;
                    document.getElementById('val-gas').innerText = data.gas;
                    document.getElementById('val-pm25').innerText = data.pm25;

                    // 2. Update Progress Bar (Simulasi persentase)
                    document.getElementById('bar-suhu').style.width = (data.suhu * 2) + "%";
                    document.getElementById('bar-hum').style.width = data.kelembapan + "%";
                    document.getElementById('bar-gas').style.width = (data.gas / 10) + "%"; // Asumsi max 1000
                    document.getElementById('bar-pm25').style.width = data.pm25 + "%";

                    // 3. Update Status Utama (Normal / Bahaya)
                    const cardStatus = document.getElementById('card-status');
                    const textStatus = document.getElementById('text-status');
                    const iconStatus = document.getElementById('icon-status');
                    
                    textStatus.innerText = data.status;

                    if (data.status === 'BAHAYA') {
                        cardStatus.classList.remove('bg-success');
                        cardStatus.classList.add('bg-danger');
                        iconStatus.classList.replace('bi-shield-check', 'bi-exclamation-triangle');
                    } else {
                        cardStatus.classList.remove('bg-danger');
                        cardStatus.classList.add('bg-success');
                        iconStatus.classList.replace('bi-exclamation-triangle', 'bi-shield-check');
                    }

                    // 4. Update Waktu
                    const sekarang = new Date();
                    document.getElementById('last_update').innerText = sekarang.toLocaleTimeString();
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                document.getElementById('text-status').innerText = "OFFLINE";
            });
    }

    // Jalankan fungsi update setiap 3 detik
    setInterval(fetchData, 3000);
    
    // Jalankan sekali saat halaman pertama kali dibuka
>>>>>>> 08aa16e50265fa8fc82636946019cae8d07dca3f
    window.onload = fetchData;
</script>
@endsection