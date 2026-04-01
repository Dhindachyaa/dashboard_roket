@extends('layouts.app')

@section('content')
<div class="container py-4 mt-4">
    <div class="row align-items-center">
        <div class="col-lg-5">
            <span class="badge bg-success px-3 py-2 rounded-pill mb-1">Renewable Energy</span>
            <h1 class="fw-bold display-5" style="color: #1e293b; line-height: 1.2;">
                Tentang <span class="text-success">ROKET</span>
            </h1>
            <p class="mt-4 text-muted fs-5">
                Cigarette Waste to Energy: Sistem energi sirkular yang mengolah limbah puntung rokok menjadi daya listrik ramah lingkungan.
            </p>
            <div class="mt-4">
                <a href="#tahapan" class="btn btn-success btn-lg px-5 shadow rounded-pill">Pelajari Teknologi</a>
            </div>
        </div>
        <div class="col-lg-7 text-center">
            <img src="{{ asset('images/roket-station.png') }}" alt="ROKET Station" class="img-fluid" style="border-radius: 25px; max-width: 90%;"> 
        </div>
    </div>
</div>

<div id="tahapan" class="container-fluid py-5" style="background-color: #ffffff;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Tahapan <span style="color: #2d7a70;">ROKET</span></h2>
            <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #2d7a70;"></div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center" style="border-radius: 25px;">
                    <div class="fs-1 mb-3">♻️</div>
                    <h5 class="fw-bold">Pengolahan Limbah</h5>
                    <p class="text-muted small">Mengumpulkan puntung rokok yang mencemari lingkungan desa untuk diolah secara kimiawi menjadi material energi.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow p-4 text-center text-white" style="border-radius: 25px; background-color: #2d7a70;">
                    <div class="fs-1 mb-3">🔋</div>
                    <h5 class="fw-bold">Energi Listrik</h5>
                    <p class="small opacity-75">Mengonversi polutan menjadi daya listrik yang disimpan untuk kebutuhan fasilitas umum wisatawan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center" style="border-radius: 25px;">
                    <div class="fs-1 mb-3">📱</div>
                    <h5 class="fw-bold">Monitoring IoT</h5>
                    <p class="text-muted small">Data kualitas udara (CO & PM2.5) serta produksi energi dipantau secara real-time melalui Dashboard digital.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Manfaat Program</h2>
        <div class="mx-auto mt-2" style="width: 60px; height: 4px; background-color: #2d7a70;"></div>
    </div>
    <div class="row g-4 text-start">
        <div class="col-md-4">
            <div class="d-flex p-4 bg-white shadow-sm h-100 rounded-4 border">
                <div class="me-3 fs-3">🍃</div>
                <div>
                    <h6 class="fw-bold">Udara Bersih</h6>
                    <p class="text-muted small mb-0">Meningkatkan kenyamanan pengunjung melalui pengurangan polusi asap rokok.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex p-4 bg-white shadow-sm h-100 rounded-4 border">
                <div class="me-3 fs-3">💰</div>
                <div>
                    <h6 class="fw-bold">Ekonomi Sirkular</h6>
                    <p class="text-muted small mb-0">Menciptakan nilai ekonomi dari sampah yang sebelumnya tidak berguna.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex p-4 bg-white shadow-sm h-100 rounded-4 border">
                <div class="me-3 fs-3">🔌</div>
                <div>
                    <h6 class="fw-bold">Smart Station</h6>
                    <p class="text-muted small mb-0">Memberikan fasilitas charging gratis bagi wisatawan berbasis energi terbarukan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5" style="background-color: #f8fafc;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <span class="text-danger fw-bold text-uppercase small">⚠️ Urgensi Lingkungan</span>
                <h2 class="fw-bold mt-2">Mengapa Puntung Rokok Berbahaya?</h2>
                <p class="text-muted">Banyak yang mengira puntung rokok hanyalah sampah kecil. Kenyataannya, ini adalah polutan plastik yang mematikan bagi ekosistem.</p>
                
                <div class="mt-4">
                    <div class="d-flex align-items-start mb-3">
                        <div class="badge bg-danger p-2 me-3"><i class="bi bi-trash"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Limbah Plastik Tersembunyi</h6>
                            <p class="small text-muted mb-0">Filter mengandung selulosa asetat yang butuh waktu 10 tahun untuk hancur.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="badge bg-danger p-2 me-3"><i class="bi bi-water"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Racun bagi Sumber Air</h6>
                            <p class="small text-muted mb-0">Zat nikotin dan timbal yang terlarut dapat membunuh ikan dan organisme air.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="badge bg-danger p-2 me-3"><i class="bi bi-biohazard"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Ancaman Mikroplastik</h6>
                            <p class="small text-muted mb-0">Partikel plastik kecilnya masuk ke rantai makanan manusia melalui laut.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-5 bg-white shadow-sm rounded-5 border-start border-danger border-5">
                    <h4 class="fw-bold mb-4">🏦 Bank Limbah ROKET</h4>
                    <p>Jangan dibuang sembarangan! Salurkan ke Bank Limbah kami. Alih-alih mencemari laut, kami olah menjadi bahan berguna.</p>
                    <div class="mt-3">
                        <p class="mb-2 fw-bold small text-uppercase text-muted text-decoration-underline">Cara Berpartisipasi:</p>
                        <ul class="list-unstyled">
                            <li class="mb-2">📍 <strong>Kumpulkan:</strong> Gunakan botol atau kaleng bekas.</li>
                            <li class="mb-2">📍 <strong>Pastikan Padam:</strong> Jangan masukkan puntung menyala.</li>
                            <li class="mb-2">📍 <strong>Setorkan:</strong> Drop Box tersedia di titik-titik strategis.</li>
                        </ul>
                    </div>
                    <button class="btn btn-outline-danger w-100 mt-2 rounded-pill">Cari Lokasi Drop Box</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">🧪 Inovasi Pemanfaatan</h2>
        <p class="text-muted">Mengubah zat beracun menjadi produk tepat guna melalui ekstraksi kimia aman.</p>
        <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #2d7a70;"></div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 overflow-hidden" style="border-radius: 20px;">
                <div class="row g-0 h-100">
                    <div class="col-md-4 bg-success d-flex align-items-center justify-content-center text-white fs-1 py-4 py-md-0">
                        🌿
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h5 class="fw-bold">Bio-Insektisida</h5>
                            <p class="small text-muted mb-0">Sisa nikotin tinggi pada filter diolah menjadi racun kontak alami untuk membasmi hama tanaman tanpa pestisida sintetis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 overflow-hidden" style="border-radius: 20px;">
                <div class="row g-0 h-100">
                    <div class="col-md-4 bg-primary d-flex align-items-center justify-content-center text-white fs-1 py-4 py-md-0">
                        🛡️
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h5 class="fw-bold">Teknologi Coating</h5>
                            <p class="small text-muted mb-0">Serat selulosa diolah menjadi polimer cair untuk lapisan pelindung anti-rayap kayu dan campuran durabilitas aspal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 p-4 rounded-4 shadow-sm" style="background-color: #2d7a70; color: white;">
        <h5 class="text-center mb-4 fw-bold text-uppercase" style="letter-spacing: 1px;">💡 Alur Pengolahan Laboratorium</h5>
        <div class="row text-center g-3">
            <div class="col-6 col-md-3">
                <div class="h-100 p-3 border border-light border-opacity-25 rounded shadow-sm">
                    <div class="fw-bold small">1. Dekontaminasi</div>
                    <span style="font-size: 0.75rem;" class="opacity-75">Sterilisasi filter & abu</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="h-100 p-3 border border-light border-opacity-25 rounded shadow-sm">
                    <div class="fw-bold small">2. Ekstraksi</div>
                    <span style="font-size: 0.75rem;" class="opacity-75">Pemisahan zat kimia</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="h-100 p-3 border border-light border-opacity-25 rounded shadow-sm">
                    <div class="fw-bold small">3. Pelarutan</div>
                    <span style="font-size: 0.75rem;" class="opacity-75">Konversi ke polimer cair</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="h-100 p-3 border border-light border-opacity-25 rounded shadow-sm">
                    <div class="fw-bold small">4. Produksi</div>
                    <span style="font-size: 0.75rem;" class="opacity-75">Finishing produk siap pakai</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection