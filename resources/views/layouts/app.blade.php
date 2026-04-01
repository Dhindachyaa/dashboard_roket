<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROKET - Dashboard Monitoring</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 85px;
            --primary-green: #198754;
            --active-bg: #f0f7f2;
        }

        body { 
            background-color: #f8fafc; 
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: #fff;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid #e2e8f0;
            cursor: pointer; /* Seluruh sidebar bisa diklik */
        }

        .sidebar.collapsed { width: var(--sidebar-collapsed-width); }

        /* Logo Area */
        .logo-section {
            padding: 0 20px;
            display: flex;
            align-items: center;
            height: 80px;
            border-bottom: 1px solid #f1f5f9;
            transition: 0.3s;
        }
        
        .logo-content {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .logo-img {
            height: 40px;
            width: auto;
            object-fit: contain;
            transition: 0.3s;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary-green);
            margin-left: 12px;
            letter-spacing: 1px;
            white-space: nowrap;
            transition: 0.3s;
        }

        /* Sembunyikan teks saat collapsed */
        .sidebar.collapsed .logo-text, 
        .sidebar.collapsed .nav-text { 
            display: none; 
        }

        .sidebar.collapsed .logo-content {
            justify-content: center;
        }

        /* Menu Styling */
        .nav-link {
            padding: 10px 15px;
            color: #64748b;
            display: flex;
            align-items: center;
            margin: 4px 12px;
            border-radius: 12px;
            transition: 0.2s;
            font-weight: 500;
        }
        
        .nav-link i { font-size: 1.4rem; min-width: 40px; }
        .nav-link:hover { color: var(--primary-green); background: var(--active-bg); }
        
        .nav-link.active {
            color: var(--primary-green);
            background: var(--active-bg);
            font-weight: 600;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            margin: 4px 8px;
        }

        /* Topbar & Content Adjustment */
        .topbar {
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            height: 80px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            z-index: 999;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 1px solid #e2e8f0;
        }
        .topbar.expanded { left: var(--sidebar-collapsed-width); }

        .content-area {
            margin-left: var(--sidebar-width);
            padding: 100px 30px 30px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .content-area.expanded { margin-left: var(--sidebar-collapsed-width); }

        @media (max-width: 768px) {
            .sidebar { left: -260px; }
            .topbar, .content-area { left: 0 !important; margin-left: 0 !important; }
        }
        /* Floating Chatbot Button */
.chatbot-float {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    background-color: var(--primary-green);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    box-shadow: 0 4px 15px rgba(25, 135, 84, 0.4);
    cursor: pointer;
    z-index: 9999;
    transition: all 0.3s ease;
    text-decoration: none;
}

.chatbot-float:hover {
    transform: scale(1.1) rotate(5deg);
    color: white;
    box-shadow: 0 6px 20px rgba(25, 135, 84, 0.6);
}

/* Tooltip text */
.chatbot-float::before {
    content: "Tanya ROKET AI";
    position: absolute;
    right: 70px;
    background: #333;
    color: #fff;
    padding: 5px 12px;
    border-radius: 8px;
    font-size: 12px;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: 0.3s;
}

.chatbot-float:hover::before {
    opacity: 1;
    visibility: visible;
}
    </style>
</head>
<body>

    <aside class="sidebar shadow-sm" id="sidebar">
        <div class="logo-section">
            <div class="logo-content">
                <img src="{{ asset('images/logo.png') }}" alt="Logo ROKET" class="logo-img">
                <span class="logo-text">ROKET</span>
            </div>
        </div>
        
        <nav class="nav flex-column mt-3">
            <a class="nav-link {{ Request::is('dashboard') || Request::is('/') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                <i class="bi bi-grid-fill"></i> <span class="nav-text">Dashboard</span>
            </a>
            <a class="nav-link {{ Request::is('analytics') ? 'active' : '' }}" href="{{ url('/analytics') }}">
                <i class="bi bi-cpu"></i> <span class="nav-text">Analytics (AI)</span>
            </a>
            <a class="nav-link {{ Request::is('devices') ? 'active' : '' }}" href="{{ url('/devices') }}">
                <i class="bi bi-hdd-network"></i> <span class="nav-text">Devices</span>
            </a>
            <a class="nav-link {{ Request::is('reports') ? 'active' : '' }}" href="{{ url('/reports') }}">
                <i class="bi bi-file-earmark-bar-graph"></i> <span class="nav-text">Report</span>
            </a>
            <a class="nav-link {{ Request::is('settings') ? 'active' : '' }}" href="{{ url('/settings') }}">
                <i class="bi bi-gear-fill"></i> <span class="nav-text">Settings</span>
            </a>
            <a href="{{ url('/chatbot') }}" class="chatbot-float shadow">
    <i class="bi bi-robot"></i>
</a>
        </nav>
    </aside>

    
    <header class="topbar d-flex align-items-center justify-content-between px-4" id="topbar">
        <h5 class="mb-0 fw-bold text-dark">
            @if(Request::is('analytics')) Analytics AI
            @elseif(Request::is('devices')) IoT Management
            @elseif(Request::is('settings')) Settings System
            @elseif(Request::is('reports')) Report Monitoring 
            @elseif(Request::is('review')) Review Pengunjung
            @elseif(Request::is('kalikesek')) Tentang Kalikesek
            @elseif(Request::is('roket')) Tentang ROKET
            @else Dashboard Monitoring @endif
        </h5>

        <div class="d-flex align-items-center">
            <ul class="nav me-4 d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle py-0 {{ Request::is('kalikesek') || Request::is('roket') ? 'active' : '' }}" 
                       href="#" data-bs-toggle="dropdown">About</a>
                    <ul class="dropdown-menu shadow border-0 mt-2">
                        <li><a class="dropdown-item {{ Request::is('kalikesek') ? 'active' : '' }}" href="{{ url('/kalikesek') }}">Desa Kalikesek</a></li>
                        <li><a class="dropdown-item {{ Request::is('roket') ? 'active' : '' }}" href="{{ url('/roket') }}">Project Roket</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-0 {{ Request::is('review') ? 'active' : '' }}" href="{{ url('/review') }}">Review</a>
                </li>
            </ul>
                <a href="{{ url('/login') }}" class="btn btn-success px-4 rounded-pill shadow-sm fw-bold">Login</a>        </div>
    </header>

    <main class="content-area" id="main-content">
        @yield('content')
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        const topbar = document.getElementById('topbar');
        const content = document.getElementById('main-content');

        function toggleSidebar() {
            sidebar.classList.toggle('collapsed');
            topbar.classList.toggle('expanded');
            content.classList.toggle('expanded');
        }

        // Klik area putih sidebar untuk buka-tutup
        sidebar.addEventListener('click', (e) => {
            // Jika klik pada link menu, jangan jalankan toggle agar tidak mengganggu navigasi
            if (e.target.closest('.nav-link')) return;
            
            toggleSidebar();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>