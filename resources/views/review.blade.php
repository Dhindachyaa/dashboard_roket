@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; position: sticky; top: 100px;">
                <h4 class="fw-bold mb-3" style="color: #1e293b;">Beri Ulasan ✍️</h4>
                <p class="text-muted small">Bagikan pengalamanmu berkunjung ke Desa Wisata Kalikesek atau menggunakan sistem ROKET.</p>
                <hr>
                <form>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control rounded-pill px-3" placeholder="Masukkan nama Anda...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Kategori</label>
                        <select class="form-select rounded-pill px-3">
                            <option selected>Pilih kategori...</option>
                            <option value="wisata">Wisata Alam</option>
                            <option value="roket">Sistem ROKET</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Komentar</label>
                        <textarea class="form-control rounded-4" rows="4" placeholder="Tuliskan ulasan Anda di sini..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100 rounded-pill fw-bold shadow-sm">Kirim Review</button>
                </form>
            </div>
        </div>

        <div class="col-lg-8">
            <h4 class="fw-bold mb-4" style="color: #1e293b;">Apa Kata Mereka?</h4>
            
            <div class="card border-0 shadow-sm p-4 mb-3" style="border-radius: 20px;">
                <div class="d-flex align-items-start">
                    <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=random" class="rounded-circle me-3" width="50">
                    <div>
                        <h6 class="fw-bold mb-1">Budi Santoso</h6>
                        <span class="badge bg-soft-teal mb-2" style="background-color: #e6f4f1; color: #2d7a70;">Wisata Alam</span>
                        <p class="text-muted small">"Tempatnya asri banget! Aliran sungainya jernih dan udaranya sejuk. Cocok buat refreshing bareng keluarga."</p>
                        <small class="text-muted italic">2 jam yang lalu</small>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm p-4 mb-3" style="border-radius: 20px;">
                <div class="d-flex align-items-start">
                    <img src="https://ui-avatars.com/api/?name=Siti+Aminah&background=random" class="rounded-circle me-3" width="50">
                    <div>
                        <h6 class="fw-bold mb-1">Siti Aminah</h6>
                        <span class="badge bg-soft-teal mb-2" style="background-color: #e6f4f1; color: #198754;">Sistem ROKET</span>
                        <p class="text-muted small">"Keren banget inovasi ROKET-nya! Bisa ngecharge hp pakai energi dari puntung rokok. Monitoring udaranya juga ngebantu banget."</p>
                        <small class="text-muted italic">5 jam yang lalu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection