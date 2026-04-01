import pandas as pd
import numpy as np
from sklearn.svm import SVC
from sklearn.tree import DecisionTreeClassifier
from sklearn.linear_model import LinearRegression
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.naive_bayes import MultinomialNB
from sklearn.pipeline import make_pipeline
import joblib
import os

# Lokasi folder saat ini
BASE_DIR = os.path.dirname(os.path.abspath(__file__))

print("⏳ SEDANG MEMBUAT ULANG 4 MODEL AI ROKET (VERSI PRO)... TUNGGU SEBENTAR.")

# ==========================================
# 1. MODEL ASAP (SVM) - Deteksi Ancaman
# ==========================================
# Input: [pm25, gas]
X_smoke = np.array([[10, 50], [15, 60], [20, 100], [150, 500], [200, 800], [180, 600]])
y_smoke = np.array([0, 0, 0, 1, 1, 1]) # 0: Aman, 1: Bahaya
model_smoke = SVC(probability=True, kernel='rbf')
model_smoke.fit(X_smoke, y_smoke)
joblib.dump(model_smoke, os.path.join(BASE_DIR, 'model_smoke_svm.pkl'))
print("✅ [1/4] Model Asap (SVM) Jadi.")

# ==========================================
# 2. MODEL AQI (TREE) - Klasifikasi Udara
# ==========================================
X_aqi = np.array([[10, 50], [60, 200], [150, 500]])
y_aqi = np.array([0, 1, 2]) # 0: Sehat, 1: Tidak Sehat, 2: Berbahaya
model_aqi = DecisionTreeClassifier()
model_aqi.fit(X_aqi, y_aqi)
joblib.dump(model_aqi, os.path.join(BASE_DIR, 'model_aqi_tree.pkl'))
print("✅ [2/4] Model AQI (Decision Tree) Jadi.")

# ==========================================
# 3. MODEL BATERAI (REGRESI) - Estimasi Daya
# ==========================================
X_time = np.array(range(0, 100)).reshape(-1, 1)
y_volt = np.linspace(13.0, 11.0, 100)
model_battery = LinearRegression()
model_battery.fit(X_time, y_volt)
joblib.dump(model_battery, os.path.join(BASE_DIR, 'model_battery_trend.pkl'))
print("✅ [3/4] Model Baterai (Linear Regression) Jadi.")

# ==========================================
# 4. MODEL CHATBOT (NLP) - Klasifikasi Niat (Intent)
# ==========================================
# Data latih diperluas agar mengenali bahasa gaul dan spesifik
data_chat = [
    # --- INTENT: SAPAAN ---
    ("halo", "sapaan"), ("hi", "sapaan"), ("hello", "sapaan"), ("p", "sapaan"),
    ("selamat pagi", "sapaan"), ("apa kabar", "sapaan"), ("kamu siapa", "sapaan"),
    ("siapa ini", "sapaan"), ("bisa bantu apa", "sapaan"), ("hai bot", "sapaan"),

    # --- INTENT: STATUS ASAP ---
    ("asap", "status_asap"), ("apakah ada asap", "status_asap"), ("cek asap", "status_asap"),
    ("ada asap gak", "status_asap"), ("ada yang ngerokok gak", "status_asap"), #
    ("kok bau rokok", "status_asap"), ("siapa yang ngerokok", "status_asap"),
    ("lagi ada asap ya", "status_asap"), ("deteksi asap rokok", "status_asap"),
    ("ruangan aman dari asap", "status_asap"), ("asapnya bahaya gak", "status_asap"),
    ("ada polusi asap", "status_asap"), ("sebat", "status_asap"), 
    ("ada orang merokok", "status_asap"), ("deteksi kebakaran", "status_asap"),

    # --- INTENT: STATUS AQI ---
    ("udara", "status_aqi"), ("bagaimana kualitas udara", "status_aqi"), 
    ("udara sehat gak", "status_aqi"), ("cek pm25", "status_aqi"), 
    ("angka debu halus", "status_aqi"), ("apakah udara bersih", "status_aqi"), 
    ("indeks kualitas udara", "status_aqi"), ("status polusi", "status_aqi"), 
    ("gimana udara di kalikesek", "status_aqi"),

    # --- INTENT: STATUS BATERAI ---
    ("baterai", "status_baterai"), ("cek baterai", "status_baterai"), 
    ("sisa daya", "status_baterai"), ("alatnya mau mati gak", "status_baterai"), 
    ("status energi", "status_baterai"), ("batre iot", "status_baterai"), 
    ("masih nyala kan alatnya", "status_baterai"), ("berapa persen baterainya", "status_baterai")
]

# Memproses data chat
texts = [x[0] for x in data_chat]
labels = [x[1] for x in data_chat]

# Membuat Pipeline NLP
model_chat = make_pipeline(CountVectorizer(), MultinomialNB())
model_chat.fit(texts, labels)

# Simpan model NLP
joblib.dump(model_chat, os.path.join(BASE_DIR, 'model_chatbot_nlp.pkl'))
print("✅ [4/4] Model Chatbot (NLP Pro) Jadi.")

print("\n🎉 SELESAI! Ke-4 model AI Anda sudah diperbarui dengan otak paling pintar.")