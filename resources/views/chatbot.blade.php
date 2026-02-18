@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="height: 70vh;">
                <div class="card-header bg-success text-white p-3 d-flex align-items-center">
                    <div class="bg-white rounded-circle p-2 me-3">
                        <i class="bi bi-robot text-success fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">ROKET AI Assistant</h6>
                        <small class="opacity-75">Online | Siap membantu anda</small>
                    </div>
                </div>

                <div class="card-body p-4 overflow-auto bg-light" id="chatbox">
                    <div class="d-flex mb-4">
                        <div class="bg-white p-3 rounded-4 shadow-sm" style="max-width: 80%; border-bottom-left-radius: 2px;">
                            <p class="mb-0 small">Halo! Saya **ROKET AI**. Ada yang bisa saya bantu terkait kualitas udara di Kalikesek atau teknologi pengolahan limbah puntung rokok kami?</p>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-0 p-3">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 bg-light rounded-pill px-4" placeholder="Tulis pesan anda...">
                        <button class="btn btn-success rounded-circle ms-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection