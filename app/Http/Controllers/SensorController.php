<?php

namespace App\Http\Controllers;

use App\Models\Sensor; 
use Illuminate\Http\Request;
use Carbon\Carbon; // Wajib untuk mengatur format Jam

class SensorController extends Controller
{
    /**
     * Menampilkan halaman Dashboard utama
     */
    public function index()
    {
        $sensor = Sensor::orderBy('id', 'desc')->first();
        return view('dashboard', compact('sensor'));
    }

    /**
     * API 1: Data Real-time Dashboard (Kotak 4 Indikator)
     */
    public function getApiData()
    {
        $data = Sensor::orderBy('id', 'desc')->first();
        return response()->json($data);
    }

    /**
     * API 2: Grafik Historical Air Quality (Grafik Tengah)
     */
    public function getHistoryData()
    {
        // Ambil 15 data terakhir, balik urutannya dari kiri ke kanan
        $data = Sensor::orderBy('id', 'desc')->take(15)->get();
        $data = $data->reverse()->values();
        return response()->json($data);
    }

    /**
     * API 3: Grafik Peak Time Analysis (Kiri Bawah)
     */
    public function getPeakTimeData()
    {
        $sensors = Sensor::all();

        // Kelompokkan data per Jam
        $grouped = $sensors->groupBy(function($item) {
            return Carbon::parse($item->created_at ?: $item->updated_at)->format('H:00');
        });

        $labels = [];
        $rataPm25 = [];    
        $bahayaCount = []; 

        foreach ($grouped as $jam => $items) {
            $labels[] = $jam;
            $rataPm25[] = round($items->avg('pm25'), 1);
            $bahayaCount[] = $items->where('ai_status_asap', 'BAHAYA')->count();
        }

        return response()->json([
            'labels' => $labels,
            'pm25' => $rataPm25,
            'bahaya' => $bahayaCount
        ]);
    }

    /**
     * API 4: Grafik AI Prediction 24h (Kanan Bawah)
     */
    public function getPredictionData()
    {
        // Ambil data PM2.5 terbaru sebagai titik awal
        $latest = Sensor::orderBy('id', 'desc')->first();
        $baseAqi = $latest ? $latest->pm25 : 50; 

        $labels = [];
        $predictions = [];

        // Simulasi 8 titik (24 jam dibagi 3 jam)
        for ($i = 1; $i <= 8; $i++) {
            $jamKeDepan = $i * 3;
            $labels[] = '+' . $jamKeDepan . 'h'; 

            // Fluktuasi acak untuk simulasi prediksi
            $fluctuation = rand(-15, 20); 
            $predictedVal = max(0, $baseAqi + $fluctuation); 
            
            $predictions[] = round($predictedVal, 1);
            $baseAqi = $predictedVal; // Update titik awal untuk jam berikutnya
        }

        return response()->json([
            'labels' => $labels,
            'data' => $predictions
        ]);
    }
}