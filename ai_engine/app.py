from flask import Flask, request, jsonify
import joblib
import numpy as np
import os

app = Flask(__name__)

# Supaya file .pkl mudah ditemukan
BASE_DIR = os.path.dirname(os.path.abspath(__file__))

# --- FUNGSI LOAD MODEL ---
def load_model(filename):
    try:
        path = os.path.join(BASE_DIR, filename)
        return joblib.load(path)
    except Exception as e:
        print(f"❌ Gagal memuat {filename}: {e}")
        return None

print("--- MEMULAI SERVER ROKET AI ---")
model_smoke   = load_model('model_smoke_svm.pkl')
model_aqi     = load_model('model_aqi_tree.pkl')
model_battery = load_model('model_battery_trend.pkl')
model_chat    = load_model('model_chatbot_nlp.pkl')
print("✅ Semua Model Siap!")

@app.route('/')
def home():
    return "🚀 ROKET AI SERVER: ONLINE (Siap melayani Laravel)"

# =========================================================
# API 1: DASHBOARD DATA (Dipanggil Laravel utk Update Tampilan)
# =========================================================
@app.route('/api/dashboard-data', methods=['POST'])
def dashboard_data():
    try:
        # 1. Terima Data dari Sensor (via Laravel)
        data = request.json
        pm25 = float(data.get('pm25', 0))
        gas  = float(data.get('gas', 0))
        volt = float(data.get('voltage', 12.0)) # Default 12V
        temp = float(data.get('temperature', 30))
        hum  = float(data.get('humidity', 60))

        # --- LOGIKA 1: DETEKSI ASAP (SVM) ---
        pred_smoke = model_smoke.predict([[pm25, gas]])[0]
        
        if pred_smoke == 1:
            status_smoke = "BAHAYA"
            color_smoke = "red"      # Instruksi Warna ke Laravel
            anim_smoke = "blink"     # Instruksi Animasi
            pesan_smoke = "⚠️ Terdeteksi Asap Rokok!"
        else:
            status_smoke = "AMAN"
            color_smoke = "blue"
            anim_smoke = "none"
            pesan_smoke = "Area Bebas Asap."

        # --- LOGIKA 2: KUALITAS UDARA (TREE) ---
        pred_aqi = model_aqi.predict([[pm25, gas]])[0]
        labels_aqi = {0: "SEHAT", 1: "SEDANG", 2: "TIDAK SEHAT"}
        status_aqi = labels_aqi.get(pred_aqi, "UNKNOWN")
        
        # Mapping Warna AQI
        colors_aqi = {0: "green", 1: "yellow", 2: "red"}
        color_aqi = colors_aqi.get(pred_aqi, "green")

        # --- LOGIKA 3: PREDIKSI BATERAI (REGRESSION) ---
        # Menghitung kapan voltase akan habis (mencapai 11.0V)
        slope = model_battery.coef_[0][0] # Kemiringan grafik penurunan
        
        # Rumus: Waktu Sisa = (Target - Sekarang) / Kemiringan
        mins_remaining = (11.0 - volt) / slope
        if mins_remaining < 0: mins_remaining = 0
        
        hours = int(mins_remaining / 60)
        mins = int(mins_remaining % 60)
        estimasi_waktu = f"{hours} Jam {mins} Menit"

        # Buat Array Garis Putus-putus (Prediksi 60 menit ke depan)
        forecast_line = []
        for i in range(1, 7): # 6 titik data (per 10 menit)
            future_volt = volt + (slope * (i * 10))
            forecast_line.append(round(future_volt, 2))

        # --- RESPONSE JSON LENGKAP KE LARAVEL ---
        return jsonify({
            "card_aqi": {
                "status": status_aqi, 
                "value": f"PM2.5: {int(pm25)}", 
                "color": color_aqi
            },
            "card_smoke": {
                "status": status_smoke, 
                "value": "Sensor Gas", 
                "color": color_smoke, 
                "animation": anim_smoke
            },
            "card_physic": {
                "status": f"{temp}°C", 
                "value": f"Hum: {hum}%", 
                "color": "purple" 
            },
            "energy_chart": {
                "current_volt": volt,
                "estimasi": estimasi_waktu,
                "forecast_line": forecast_line 
            },
            "recommendation": pesan_smoke if pred_smoke == 1 else "✅ Sistem Berjalan Normal."
        })

    except Exception as e:
        return jsonify({'error': str(e)}), 400


# =========================================================
# API 2: CHATBOT (NLP)
# =========================================================
@app.route('/api/chat', methods=['POST'])
def chat():
    try:
        data = request.json
        msg = data.get('message', '')
        # Laravel juga kirim data sensor terakhir agar bot punya konteks
        sensor = data.get('sensor', {}) 

        # Prediksi Maksud (Intent) User
        intent = model_chat.predict([msg])[0]
        reply = "Maaf, saya kurang mengerti."

        if intent == "status_asap":
            if sensor.get('is_smoke') == 1:
                reply = "⚠️ PERINGATAN: Sensor mendeteksi asap rokok saat ini!"
            else:
                reply = "✅ Area aman. Tidak ada aktivitas merokok terdeteksi."
        
        elif intent == "status_aqi":
            aqi = sensor.get('aqi_text', 'Tidak diketahui')
            reply = f"Kualitas udara terpantau: {aqi}."
        
        elif intent == "status_baterai":
            volt = sensor.get('voltage', 0)
            reply = f"Baterai tersisa {volt} Volt. Sistem masih aman."
            
        elif intent == "sapaan":
            reply = "Halo! Saya Asisten ROKET. Silakan tanya kondisi udara."

        return jsonify({'intent': intent, 'reply': reply})

    except Exception as e:
        return jsonify({'error': str(e)}), 400

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)