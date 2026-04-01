from flask import Flask, request, jsonify
from flask_cors import CORS  # <-- WAJIB: Untuk mengatasi masalah "Server Offline"
import joblib
import mysql.connector
import os

app = Flask(__name__)
# Aktifkan CORS agar Laravel (Port 8000) bisa mengakses Flask (Port 5001)
CORS(app) 

# ==========================================
# 1. KONFIGURASI DATABASE & LOAD MODEL
# ==========================================
DB_CONFIG = {
    'host': 'localhost',      
    'user': 'root',           
    'password': '',           
    'database': 'roket_db'    
}
TABLE_NAME = 'sensors'

# Lokasi file model
BASE_DIR = os.path.dirname(os.path.abspath(__file__))
MODEL_PATH = os.path.join(BASE_DIR, 'model_chatbot_nlp.pkl')

try:
    model_chat = joblib.load(MODEL_PATH)
    print("🤖 Model Chatbot (NLP) Berhasil Dimuat!")
except Exception as e:
    print(f"❌ Gagal memuat model: {e}")

# ==========================================
# 2. FUNGSI AMBIL DATA TERBARU DARI DB
# ==========================================
def get_latest_sensor_data():
    try:
        conn = mysql.connector.connect(**DB_CONFIG)
        cursor = conn.cursor(dictionary=True)
        cursor.execute(f"SELECT * FROM {TABLE_NAME} ORDER BY id DESC LIMIT 1")
        data = cursor.fetchone()
        conn.close()
        return data
    except Exception as e:
        print(f"❌ Error Database: {e}")
        return None

# ==========================================
# 3. ENDPOINT CHATBOT (API)
# ==========================================
@app.route('/api/chat', methods=['POST'])
def chat():
    data_input = request.json
    if not data_input or 'message' not in data_input:
        return jsonify({"reply": "Format pesan salah."}), 400

    user_msg = data_input.get('message', '')
    
    # ---------------------------------------------------------
    # A. JALUR TOL (BYPASS) UNTUK TOMBOL TEMPLATE PERTANYAAN
    # ---------------------------------------------------------
    if user_msg == "Bagaimana kondisi udara di Kalikesek saat ini?":
        intent = "status_aqi"
    elif user_msg == "Apakah terdeteksi ada yang merokok saat ini?":
        intent = "status_asap"
    elif user_msg == "Berapa nilai PM2.5 dan Gas CO sekarang?":
        intent = "detail_sensor"
    elif user_msg == "Apa rekomendasi sistem untuk kondisi saat ini?":
        intent = "rekomendasi"
    else:
        # B. Jika user mengetik manual, gunakan model AI NLP untuk menebak
        try:
            intent = model_chat.predict([user_msg])[0]
        except:
            intent = "unknown"

    # ---------------------------------------------------------
    # AMBIL DATA DATABASE REAL-TIME
    # ---------------------------------------------------------
    latest_data = get_latest_sensor_data()
    if not latest_data:
        return jsonify({"reply": "Maaf, sistem sedang kesulitan mengakses data sensor di database."})

    # Ambil nilai-nilai penting
    status_asap = latest_data.get('ai_status_asap', 'TIDAK DIKETAHUI')
    aqi_status = latest_data.get('ai_status_aqi', 'Normal')
    pm_val = latest_data.get('pm25', 0)
    gas_val = latest_data.get('gas', 0)

    # ---------------------------------------------------------
    # LOGIKA JAWABAN (Termasuk fitur Panel Surya & Rekomendasi)
    # ---------------------------------------------------------
    if intent == "status_asap":
        if status_asap == 'BAHAYA':
            reply = "⚠️ **PERINGATAN!** Sistem mendeteksi adanya asap rokok atau polusi tinggi saat ini. Segera cari udara segar!"
        else:
            reply = "✅ Kondisi terpantau **AMAN**. Tidak terdeteksi adanya asap rokok saat ini."
            
    elif intent == "status_aqi":
        reply = f"Kualitas udara saat ini berstatus: **{aqi_status}**. Nilai debu halus (PM2.5) berada di angka {pm_val} µg/m³."
        
    elif intent == "detail_sensor":
        reply = f"📊 **Data Real-time ROKET:**\n- **Partikulat (PM2.5):** {pm_val} µg/m³\n- **Gas Karbon/Asap (CO):** {gas_val} ppm\n\nStatus Keseluruhan: **{status_asap}**."
        
    elif intent == "rekomendasi":
        if status_asap == 'BAHAYA':
            reply = "🚨 **Rekomendasi AI:** Terdeteksi asap/polusi tinggi. Segera nyalakan kipas exhaust di area monitoring Kalikesek dan pastikan sirkulasi udara berjalan baik."
        else:
            reply = "💡 **Rekomendasi AI:** Kondisi ideal. Suhu, sirkulasi udara, dan kelembaban aman untuk pengunjung. Biarkan sistem beroperasi dengan tenaga panel surya seperti biasa."

    elif intent == "sapaan":
        reply = "Halo! Saya **ROKET AI**. Silakan klik salah satu tombol pertanyaan di atas, atau ketik langsung pertanyaan Anda seputar udara di area monitoring."
        
    else:
        reply = "Maaf, saya belum memahami pertanyaan itu. Anda bisa menekan tombol rekomendasi pertanyaan yang telah saya sediakan di atas layar chat."

    print(f"💬 User: {user_msg} | 🤖 Intent: {intent}")
    return jsonify({
        "intent": intent,
        "reply": reply
    })

if __name__ == '__main__':
    print("🚀 Server Chatbot AI ROKET Aktif di http://127.0.0.1:5001")
    app.run(host='0.0.0.0', port=5001, debug=True)