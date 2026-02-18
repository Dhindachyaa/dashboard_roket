@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 rounded-4 bg-success text-white">
                <small>Active Devices</small>
                <h3 class="fw-bold mb-0">12/12</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 rounded-4 bg-white">
                <small class="text-muted">System Health</small>
                <h3 class="fw-bold mb-0 text-success">98%</h3>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white border-0 py-3">
            <h5 class="fw-bold mb-0">Connected IoT Nodes</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Device ID</th>
                        <th>Location</th>
                        <th>Sensors</th>
                        <th>Battery</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold">ROKET-ST-01</div>
                            <small class="text-muted">ESP32-WROOM-32</small>
                        </td>
                        <td>Gate A - Kalikesek</td>
                        <td>
                            <span class="badge bg-soft-success text-success" style="background-color: #e6f4f1;">MQ-7</span>
                            <span class="badge bg-soft-success text-success" style="background-color: #e6f4f1;">SDS011</span>
                        </td>
                        <td>
                            <div class="progress" style="height: 6px; width: 100px;">
                                <div class="progress-bar bg-success" style="width: 85%"></div>
                            </div>
                            <small>85%</small>
                        </td>
                        <td><span class="badge rounded-pill bg-success">Online</span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-secondary rounded-pill"><i class="bi bi-arrow-clockwise"></i></button>
                            <button class="btn btn-sm btn-outline-success rounded-pill"><i class="bi bi-gear"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection