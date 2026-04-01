@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 20px;">
                <div class="bg-success p-5 text-white text-center position-relative">
                    <h2 class="fw-bold mb-2">Desa Wisata Kalikesek</h2>
                    <p class="lead mb-0">Pesona Alam Asli di Jantung Kendal</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 20px;">
                <h4 class="fw-bold text-success mb-3">Tentang Desa</h4>
                <p class="text-secondary lh-lg">
                    Desa Kalikesek adalah destinasi wisata yang menggabungkan keindahan alam pegunungan dengan kenyamanan fasilitas modern. Terkenal dengan sungai-sungainya yang jernih dan pemandangan hijau yang menenangkan, desa ini kini bertransformasi menjadi <strong>Smart Village</strong> dengan bantuan teknologi monitoring lingkungan ROKET.
                </p>
                
                <div class="row mt-4">
                    <div class="col-md-4 mb-3">
                        <div class="p-4 bg-light rounded-4 text-center border-0 h-100">
                            <i class="bi bi-geo fs-1 text-success"></i>
                            <h6 class="mt-2 fw-bold">Lokasi Strategis</h6>
                            <p class="small text-muted mb-0">Kecamatan Limbangan, Kendal.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="p-4 bg-light rounded-4 text-center border-0 h-100">
                            <i class="bi bi-wind fs-1 text-primary"></i>
                            <h6 class="mt-2 fw-bold">Udara Sehat</h6>
                            <p class="small text-muted mb-0">Dipantau real-time oleh sensor AI.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="p-4 bg-light rounded-4 text-center border-0 h-100">
                            <i class="bi bi-camera fs-1 text-warning"></i>
                            <h6 class="mt-2 fw-bold">Spot Foto</h6>
                            <p class="small text-muted mb-0">Banyak area estetik dan alami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px;">
                <h5 class="fw-bold mb-3">Jam Operasional</h5>
                <p class="text-secondary mb-1"><i class="bi bi-clock me-2 text-success"></i> Setiap Hari</p>
                <p class="text-secondary fw-bold">08:00 - 17:00 WIB</p>
                <hr>
                <h5 class="fw-bold mb-3">Media Sosial</h5>
                <a href="#" class="text-decoration-none text-secondary d-block mb-2">
                    <i class="bi bi-instagram me-2 text-danger"></i> @kalikesek_wisata
                </a>
            </div>
            
            <div class="card border-0 bg-success text-white p-4" style="border-radius: 20px;">
                <h5 class="fw-bold mb-2">Punya Pertanyaan?</h5>
                <p class="small opacity-75">Hubungi pengelola untuk reservasi rombongan atau info lebih lanjut.</p>
                <a href="https://wa.me/yournumber" class="btn btn-light btn-sm rounded-pill fw-bold text-success px-4 mt-2">Hubungi Kami</a>
            </div>
        </div>
    </div>
</div>
@endsection