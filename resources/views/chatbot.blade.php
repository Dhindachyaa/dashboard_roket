@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body, .chat-page {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .chat-page {
        height: calc(100vh - var(--navbar-height, 64px));
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        overflow: hidden;
    }

    .chat-wrapper {
        width: 100%;
        max-width: 720px;
        display: flex;
        flex-direction: column;
        height: 100%;
        max-height: 800px;
        background: #fff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 40px rgba(0,0,0,0.10);
    }

    /* HEADER */
    .chat-header {
        background: linear-gradient(135deg, #1a6b3a 0%, #25a05a 100%);
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 14px;
        flex-shrink: 0;
    }

    .header-icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        background: rgba(255,255,255,0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .header-icon svg {
        width: 24px;
        height: 24px;
        stroke: #fff;
        fill: none;
        stroke-width: 1.8;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .header-text h2 {
        font-size: 16px;
        font-weight: 700;
        color: #fff;
        letter-spacing: -0.2px;
    }

    .header-text p {
        font-size: 12px;
        color: rgba(255,255,255,0.72);
        margin-top: 1px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #7dfcb4;
        animation: pulse-dot 2s infinite;
    }

    @keyframes pulse-dot {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }

    .header-badge {
        margin-left: auto;
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 20px;
        padding: 4px 12px;
        font-size: 11px;
        font-weight: 600;
        color: rgba(255,255,255,0.9);
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    /* CHATBOX */
    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 12px;
        background: #f8faf8;
    }

    .chat-messages::-webkit-scrollbar { width: 4px; }
    .chat-messages::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 4px;
    }

    /* DATE LABEL */
    .chat-date-label {
        text-align: center;
        font-size: 11px;
        font-weight: 600;
        color: #9ca3af;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin: 4px 0 8px;
    }

    /* BUBBLE */
    .bubble-row {
        display: flex;
        gap: 10px;
        align-items: flex-end;
    }

    .bubble-row.user {
        flex-direction: row-reverse;
    }

    .bubble-avatar {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        background: #1a6b3a;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-bottom: 2px;
    }

    .bubble-avatar svg {
        width: 16px;
        height: 16px;
        stroke: #fff;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .bubble-avatar.user-avatar {
        background: #e8f5ee;
    }

    .bubble-avatar.user-avatar svg {
        stroke: #1a6b3a;
    }

    .bubble {
        max-width: 75%;
        padding: 11px 16px;
        border-radius: 18px;
        font-size: 14px;
        line-height: 1.6;
        color: #1f2937;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-bottom-left-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06);
    }

    .bubble.user {
        background: #1a6b3a;
        color: #fff;
        border-color: transparent;
        border-bottom-left-radius: 18px;
        border-bottom-right-radius: 4px;
        box-shadow: 0 2px 8px rgba(26,107,58,0.25);
    }

    /* TYPING INDICATOR */
    .typing-indicator {
        display: flex;
        gap: 4px;
        align-items: center;
        padding: 14px 16px;
    }

    .typing-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #9ca3af;
        animation: bounce 1.2s infinite;
    }

    .typing-dot:nth-child(2) { animation-delay: 0.2s; }
    .typing-dot:nth-child(3) { animation-delay: 0.4s; }

    @keyframes bounce {
        0%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-6px); }
    }

    /* FOOTER */
    .chat-footer {
        background: #fff;
        border-top: 1px solid #f0f0f0;
        padding: 1rem 1.25rem 1.25rem;
        flex-shrink: 0;
    }

    /* QUICK PROMPTS */
    .quick-prompts {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 14px;
    }

    .quick-btn {
        background: #f0f9f4;
        border: 1px solid #c6e6d4;
        border-radius: 20px;
        padding: 7px 14px;
        font-size: 12.5px;
        font-weight: 500;
        color: #1a6b3a;
        cursor: pointer;
        transition: all 0.18s ease;
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .quick-btn:hover {
        background: #1a6b3a;
        border-color: #1a6b3a;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(26,107,58,0.2);
    }

    .quick-btn svg {
        width: 13px;
        height: 13px;
        flex-shrink: 0;
    }

    /* INPUT ROW */
    .input-row {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f8faf8;
        border: 1.5px solid #e0e7e0;
        border-radius: 16px;
        padding: 6px 6px 6px 16px;
        transition: border-color 0.2s;
    }

    .input-row:focus-within {
        border-color: #25a05a;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(37,160,90,0.1);
    }

    .chat-input {
        flex: 1;
        border: none;
        background: transparent;
        font-size: 14px;
        color: #1f2937;
        outline: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
        line-height: 1.5;
        padding: 4px 0;
    }

    .chat-input::placeholder { color: #9ca3af; }

    .send-btn {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: #1a6b3a;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.18s ease;
        flex-shrink: 0;
    }

    .send-btn:hover {
        background: #25a05a;
        transform: scale(1.05);
    }

    .send-btn:active { transform: scale(0.96); }

    .send-btn svg {
        width: 17px;
        height: 17px;
        stroke: #fff;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* RESPONSIVE */
    @media (max-width: 600px) {
        .chat-page { padding: 0; align-items: stretch; height: calc(100vh - var(--navbar-height, 64px)); }
        .chat-wrapper {
            height: 100%;
            max-height: none;
            border-radius: 0;
        }

        .bubble { max-width: 88%; }
        .quick-prompts { flex-direction: column; }
        .quick-btn { white-space: normal; }
        .header-badge { display: none; }
        .chat-header { padding: 0.9rem 1.1rem; }
        .chat-messages { padding: 1rem; }
        .chat-footer { padding: 0.75rem 1rem 1rem; }
    }

    @media (max-width: 380px) {
        .header-text h2 { font-size: 14px; }
        .bubble { font-size: 13px; }
    }
</style>

<div class="chat-page">
    <div class="chat-wrapper">

        {{-- HEADER --}}
        <div class="chat-header">
            <div class="header-icon">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/><path d="M9 8h.01M15 8h.01"/><rect x="7" y="14" width="10" height="5" rx="2"/></svg>
            </div>
            <div class="header-text">
                <h2>ROKET AI Assistant</h2>
                <p>
                    <span class="status-dot"></span>
                    Online · Siap membantu anda
                </p>
            </div>
            <div class="header-badge">Kualitas Udara</div>
        </div>

        {{-- MESSAGES --}}
        <div class="chat-messages" id="chatbox">
            <div class="chat-date-label">Hari ini</div>

            {{-- Welcome bubble --}}
            <div class="bubble-row bot">
                <div class="bubble-avatar">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><rect x="7" y="14" width="10" height="5" rx="2"/></svg>
                </div>
                <div class="bubble" id="welcome-bubble">
                    Halo! Saya <strong>ROKET AI</strong> 👋<br>
                    Ada yang bisa saya bantu terkait kualitas udara di Kalikesek atau teknologi pengolahan limbah puntung rokok kami?
                </div>
            </div>
        </div>

        {{-- FOOTER --}}
        <div class="chat-footer">
            {{-- Quick prompts --}}
            <div class="quick-prompts" id="suggested-prompts">
                <button class="quick-btn" onclick="sendSuggested('Bagaimana kondisi udara di Kalikesek saat ini?')">
                    <svg viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2"/><path d="M9.6 4.6A2 2 0 1 1 11 8H2"/><path d="M12.6 19.4A2 2 0 1 0 14 16H2"/></svg>
                    Kondisi udara saat ini
                </button>

                <button class="quick-btn" onclick="sendSuggested('Apakah terdeteksi ada yang merokok saat ini?')">
                    <svg viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 12H2v4h16"/><path d="M22 12v4"/><path d="M7 12V6a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.5"/></svg>
                    Deteksi merokok
                </button>

                <button class="quick-btn" onclick="sendSuggested('Berapa nilai PM2.5 dan Gas CO sekarang?')">
                    <svg viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                    Nilai PM2.5 & Gas CO
                </button>

                <button class="quick-btn" onclick="sendSuggested('Apa rekomendasi sistem untuk kondisi saat ini?')">
                    <svg viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Rekomendasi sistem
                </button>
            </div>

            {{-- Input --}}
            <div class="input-row">
                <input
                    type="text"
                    id="userInput"
                    class="chat-input"
                    placeholder="Tulis pesan Anda..."
                    autocomplete="off"
                >
                <button class="send-btn" id="sendBtn" title="Kirim">
                    <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                </button>
            </div>
        </div>

    </div>
</div>

<script>
    const chatInput   = document.getElementById('userInput');
    const chatBtn     = document.getElementById('sendBtn');
    const chatbox     = document.getElementById('chatbox');
    const quickPanel  = document.getElementById('suggested-prompts');

    function sendSuggested(text) {
        chatInput.value = text;
        sendMessage();
    }

    function appendMessage(sender, text) {
        const isUser = sender === 'user';
        const row = document.createElement('div');
        row.className = 'bubble-row ' + (isUser ? 'user' : 'bot');

        const avatar = document.createElement('div');
        avatar.className = 'bubble-avatar ' + (isUser ? 'user-avatar' : '');
        avatar.innerHTML = isUser
            ? `<svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>`
            : `<svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><rect x="7" y="14" width="10" height="5" rx="2"/></svg>`;

        const bubble = document.createElement('div');
        bubble.className = 'bubble ' + (isUser ? 'user' : '');
        bubble.innerHTML = text;

        if (isUser) {
            row.appendChild(bubble);
            row.appendChild(avatar);
        } else {
            row.appendChild(avatar);
            row.appendChild(bubble);
        }

        chatbox.appendChild(row);
        chatbox.scrollTop = chatbox.scrollHeight;
    }

    function showTyping() {
        const row = document.createElement('div');
        row.className = 'bubble-row bot';
        row.id = 'typing-row';

        const avatar = document.createElement('div');
        avatar.className = 'bubble-avatar';
        avatar.innerHTML = `<svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><rect x="7" y="14" width="10" height="5" rx="2"/></svg>`;

        const bubble = document.createElement('div');
        bubble.className = 'bubble';
        bubble.innerHTML = `<div class="typing-indicator"><span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span></div>`;

        row.appendChild(avatar);
        row.appendChild(bubble);
        chatbox.appendChild(row);
        chatbox.scrollTop = chatbox.scrollHeight;
    }

    function removeTyping() {
        const el = document.getElementById('typing-row');
        if (el) el.remove();
    }

    function sendMessage() {
        const message = chatInput.value.trim();
        if (!message) return;

        if (quickPanel.style.display !== 'none') {
            quickPanel.style.display = 'none';
        }

        appendMessage('user', message);
        chatInput.value = '';
        chatBtn.disabled = true;

        showTyping();

        fetch('http://127.0.0.1:5001/api/chat', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ message })
        })
        .then(r => r.json())
        .then(data => {
            removeTyping();
            appendMessage('bot', data.reply);
        })
        .catch(() => {
            removeTyping();
            appendMessage('bot', 'Maaf, server AI sedang offline. Pastikan <code>chatbot_api.py</code> sudah berjalan.');
        })
        .finally(() => {
            chatBtn.disabled = false;
            chatInput.focus();
        });
    }

    chatBtn.addEventListener('click', sendMessage);
    chatInput.addEventListener('keypress', e => {
        if (e.key === 'Enter') sendMessage();
    });

    function applyNavbarHeight() {
        const navbar = document.querySelector('header, nav, #topbar, .navbar, [class*="navbar"], [class*="header"]');
        if (navbar) {
            const h = navbar.getBoundingClientRect().height;
            document.documentElement.style.setProperty('--navbar-height', h + 'px');
        }
    }
    applyNavbarHeight();
    window.addEventListener('resize', applyNavbarHeight);
</script>

@endsection