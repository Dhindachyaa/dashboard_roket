<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorController extends Controller {
    public function store(Request $request) {
        // Simpan data ke database
        $data = Sensor::create([
            'suhu' => $request->suhu,
            'kelembapan' => $request->kelembapan,
            'gas' => $request->gas,
            'pm25' => $request->pm25,
            'status' => $request->status,
        ]);

        return response()->json(['status' => 'Success', 'data' => $data], 200);
    }

    public function latest() {
        // Ambil data terbaru untuk dashboard
        return response()->json(Sensor::latest()->first());
    }
}