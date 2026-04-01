import requests

# 1. Alamat API Chatbot Anda
url = "http://127.0.0.1:5001/api/chat"

# 2. Pesan pura-pura dari User (Bebas diganti-ganti kata-katanya)
pesan_user = {"message": "Kualitas udara sekarang sehat atau bahaya?"}

# 3. Kirim pesan ke Chatbot
print(f"👤 User: {pesan_user['message']}")
response = requests.post(url, json=pesan_user)

# 4. Tampilkan jawaban Chatbot
hasil = response.json()
print(f"🤖 Niat yang terdeteksi (Intent): {hasil['intent']}")
print(f"🤖 Balasan Chatbot: {hasil['reply']}")