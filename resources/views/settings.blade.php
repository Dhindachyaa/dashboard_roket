@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active text-start mb-2 rounded-3" data-bs-toggle="pill" data-bs-target="#profile" type="button">
                        <i class="bi bi-person-circle me-2"></i> Akun Profil
                    </button>
                    <button class="nav-link text-start mb-2 rounded-3" data-bs-toggle="pill" data-bs-target="#security" type="button">
                        <i class="bi bi-shield-lock me-2"></i> Keamanan
                    </button>
                    <button class="nav-link text-start mb-2 rounded-3" data-bs-toggle="pill" data-bs-target="#notifications" type="button">
                        <i class="bi bi-bell me-2"></i> Notifikasi IoT
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="tab-content" id="v-pills-tabContent">
                
                <div class="tab-pane fade show active" id="profile">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold mb-4">Informasi Profil</h5>
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-3 text-center">
                                    <img src="https://ui-avatars.com/api/?name=Admin+Roket&background=198754&color=fff" class="rounded-circle mb-3" width="100">
                                    <button class="btn btn-sm btn-outline-success rounded-pill">Ganti Foto</button>
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Nama Lengkap</label>
                                        <input type="text" class="form-control rounded-3" value="Admin ROKET Kalikesek">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Alamat Email</label>
                                        <input type="email" class="form-control rounded-3" value="admin@roket.id">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4 rounded-pill shadow-sm fw-bold">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="security">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold mb-4">Keamanan Akun</h5>
                        <form>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Password Saat Ini</label>
                                <input type="password" class="form-control rounded-3">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Password Baru</label>
                                <input type="password" class="form-control rounded-3">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control rounded-3">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4 rounded-pill shadow-sm fw-bold">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="notifications">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold mb-4">Pengaturan Alert IoT</h5>
                        <p class="text-muted small">Tentukan kapan sistem harus mengirimkan peringatan ke perangkat Anda.</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="mb-0 fw-bold">Peringatan Udara Buruk</h6>
                                <small class="text-muted">Kirim notifikasi jika AQI di atas 100.</small>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="mb-0 fw-bold">Status Perangkat Offline</h6>
                                <small class="text-muted">Kirim email jika node sensor kehilangan koneksi > 5 menit.</small>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="mb-0 fw-bold">Laporan Mingguan Otomatis</h6>
                                <small class="text-muted">Kirim rekap data ke email setiap hari Senin.</small>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection