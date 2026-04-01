import time
import mysql.connector
import joblib
import numpy as np
import os
from datetime import datetime

# ==========================================
# 1. KONFIGURASI DATABASE
# ==========================================
DB_CONFIG = {
    'host': 'localhost',      
    'user': 'root',           
    'password': '',           
    'database': 'roket_db'    
}
TABLE_NAME = 'sensors'    # SUDAH DISESUAIKAN DENGAN NAMA TABEL

# ==========================================
# 2. LOAD MODEL AI
# ==========================================
BASE_DIR = os.path.dirname(os.path.abspath(__file__))

def load_model(name):
    try:
        return joblib.load(os.path.join(BASE_DIR, name))
    except:
        print(f"❌ Error: Model {name} tidak ditemukan di folder ini!")
        return None

print("⏳ Memuat Otak AI...")
model_smoke   = load_model('model_smoke_svm.pkl')
model_aqi     = load_model('model_aqi_tree.pkl')
model_battery = load_model('model_battery_trend.pkl')
print("✅ Siap! Menunggu data masuk ke tabel 'sensors'...")

# ==========================================
# 3. FUNGSI PEKERJA (WORKER LOGIC)
# ==========================================
def process_data():
    conn = None
    try:
        # Konek ke Database
        conn = mysql.connector.connect(**DB_CONFIG)
        cursor = conn.cursor(dictionary=True)

        # Cari 1 Data Terbaru yang BELUM diurus AI (Kolom ai_status_asap masih NULL)
        query = f"SELECT * FROM {TABLE_NAME} WHERE ai_status_asap IS NULL ORDER BY id ASC LIMIT 1"
        cursor.execute(query)
        row = cursor.fetchone()

        # Kalau tidak ada data baru (atau semua sudah diproses), istirahat
        if not row:
            print(f"💤 [{datetime.now().strftime('%H:%M:%S')}] Memantau data baru...", end='\r')
            return

        print(f"\n🚀 Memproses Data ID: {row['id']}...")

        # -- A. Ambil Data Sensor dari Database --
        # Menggunakan nama kolom yang persis ada di tabel teman Anda
        pm25 = float(row.get('pm25', 0))
        gas  = float(row.get('gas', 0))
        
        # Karena kolom 'voltage' tidak ada di tabel, kita pakai nilai dummy statis
        # agar prediksi baterai tidak error. Nanti bisa disesuaikan kalau tim IoT pasang sensor tegangan.
        volt = 12.0 

        # -- B. Prediksi Asap (SVM) --
        pred_smoke = model_smoke.predict([[pm25, gas]])[0]
        status_asap = "BAHAYA" if pred_smoke == 1 else "AMAN"
        color_ai = "red" if pred_smoke == 1 else "blue"

        # -- C. Prediksi Udara (Tree) --
        pred_aqi = model_aqi.predict([[pm25, gas]])[0]
        labels = {0: "SEHAT", 1: "SEDANG", 2: "TIDAK SEHAT"}
        status_aqi = labels.get(pred_aqi, "UNKNOWN")

        # -- D. Prediksi Baterai (Regresi) --
        slope = model_battery.coef_[0]
        mins_left = (11.0 - volt) / slope
        if mins_left < 0: mins_left = 0
        estimasi = f"{int(mins_left/60)} Jam {int(mins_left%60)} Menit"

        # -- E. Update Hasil ke Database --
        # Isi ke-4 kolom yang tadi Anda buat di phpMyAdmin
        update_sql = f"""
            UPDATE {TABLE_NAME} 
            SET 
                ai_status_asap = %s,
                ai_color = %s,
                ai_status_aqi = %s,
                ai_estimasi_energi = %s
            WHERE id = %s
        """
        values = (status_asap, color_ai, status_aqi, estimasi, row['id'])
        
        cursor.execute(update_sql, values)
        conn.commit()
        
        print(f"✅ Selesai! ID {row['id']} -> Asap: {status_asap} ({color_ai}), Udara: {status_aqi}")

    except mysql.connector.Error as err:
        print(f"\n❌ Error MySQL: {err}")
    except Exception as e:
        print(f"\n❌ Error Python: {e}")
    finally:
        if conn and conn.is_connected():
            cursor.close()
            conn.close()

# ==========================================
# 4. LOOPING ABADI
# ==========================================
if __name__ == "__main__":
    while True:
        process_data()
        time.sleep(1) # Cek database setiap 1 detik