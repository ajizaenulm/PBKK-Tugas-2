<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PBKK Sandbox') — ITS & Platform Magentic</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700&family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Design System (Vanilla CSS Modern) -->
    <style>
        :root {
            --bg-base: #070d17;
            --bg-surface: #0c182b;
            --bg-surface-elevated: #11223d;
            --bg-glass: rgba(12, 24, 43, 0.75);
            --border-subtle: rgba(255, 255, 255, 0.08);
            --border-glow: rgba(56, 189, 248, 0.25);
            
            --its-navy: #002855;
            --its-blue: #0072ce;
            --its-gold: #f5a623;
            
            --magentic-cyan: #38bdf8;
            --magentic-indigo: #818cf8;
            --magentic-emerald: #34d399;
            --magentic-rose: #f43f5e;
            
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --text-dim: #64748b;
            
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 20px;
            --radius-full: 9999px;
            
            --shadow-subtle: 0 4px 20px -2px rgba(0, 0, 0, 0.5);
            --shadow-glow: 0 0 30px -5px rgba(56, 189, 248, 0.18);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-base);
            color: var(--text-main);
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(0, 114, 206, 0.12) 0%, transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(129, 140, 248, 0.1) 0%, transparent 45%);
            background-attachment: fixed;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.02em;
        }

        code, pre, .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Navbar Header */
        .navbar-wrapper {
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            background: var(--bg-glass);
            border-bottom: 1px solid var(--border-subtle);
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            background: linear-gradient(135deg, var(--its-blue), var(--magentic-indigo));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 20px;
            color: white;
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.3);
        }

        .brand-text h1 {
            font-size: 18px;
            font-weight: 700;
            background: linear-gradient(to right, #ffffff, var(--magentic-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .brand-text span {
            font-size: 11px;
            color: var(--text-muted);
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 6px;
            list-style: none;
        }

        .nav-link {
            padding: 8px 16px;
            border-radius: var(--radius-full);
            font-size: 14px;
            font-weight: 600;
            color: var(--text-muted);
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
        }

        .nav-link.active {
            color: #ffffff;
            background: linear-gradient(135deg, rgba(0, 114, 206, 0.35), rgba(129, 140, 248, 0.25));
            border: 1px solid var(--border-glow);
            box-shadow: 0 0 12px rgba(56, 189, 248, 0.15);
        }

        .nav-badge {
            padding: 2px 8px;
            background: var(--its-gold);
            color: #070d17;
            font-size: 11px;
            font-weight: 700;
            border-radius: 99px;
        }

        /* Main Content Wrapper */
        .main-wrapper {
            flex: 1;
            padding: 40px 0 80px 0;
        }

        /* Cards & Glass Containers */
        .card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            padding: 28px;
            box-shadow: var(--shadow-subtle);
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            border-color: var(--border-glow);
            box-shadow: var(--shadow-glow);
        }

        .card-elevated {
            background: var(--bg-surface-elevated);
        }

        /* Badges & Tags */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .badge-its {
            background: rgba(0, 114, 206, 0.2);
            color: var(--magentic-cyan);
            border: 1px solid rgba(0, 114, 206, 0.4);
        }

        .badge-gold {
            background: rgba(245, 166, 35, 0.15);
            color: var(--its-gold);
            border: 1px solid rgba(245, 166, 35, 0.35);
        }

        .badge-emerald {
            background: rgba(52, 211, 153, 0.15);
            color: var(--magentic-emerald);
            border: 1px solid rgba(52, 211, 153, 0.35);
        }

        .badge-purple {
            background: rgba(168, 85, 247, 0.15);
            color: #c084fc;
            border: 1px solid rgba(168, 85, 247, 0.35);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: var(--radius-md);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            border: none;
            outline: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--its-blue), var(--magentic-indigo));
            color: white;
            box-shadow: 0 4px 16px rgba(0, 114, 206, 0.35);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 22px rgba(0, 114, 206, 0.5);
            filter: brightness(1.1);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-main);
            border: 1px solid var(--border-subtle);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .btn-gold {
            background: linear-gradient(135deg, #d97706, var(--its-gold));
            color: #070d17;
            font-weight: 700;
            box-shadow: 0 4px 16px rgba(245, 166, 35, 0.3);
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            filter: brightness(1.1);
        }

        /* Grid utilities */
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        @media (max-width: 992px) {
            .grid-2, .grid-3, .grid-4 {
                grid-template-columns: 1fr;
            }
            .navbar {
                flex-direction: column;
                height: auto;
                padding: 16px 0;
                gap: 16px;
            }
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        /* Footer */
        .footer {
            border-top: 1px solid var(--border-subtle);
            padding: 32px 0;
            background: rgba(7, 13, 23, 0.95);
            color: var(--text-dim);
            font-size: 13px;
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .footer-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: var(--magentic-emerald);
            box-shadow: 0 0 10px var(--magentic-emerald);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.85); }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <header class="navbar-wrapper">
        <div class="container">
            <nav class="navbar">
                <a href="{{ route('home') }}" class="brand">
                    <div class="brand-logo">M</div>
                    <div class="brand-text">
                        <h1>Magentic Sandbox</h1>
                        <span>PBKK Pertemuan 2 &bull; ITS Surabaya</span>
                    </div>
                </a>

                <ul class="nav-links">
                    <li>
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa.show', ['nrp' => '5025241065']) }}" class="nav-link {{ request()->routeIs('mahasiswa.show') ? 'active' : '' }}">
                            <span>Profil Mahasiswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agent.show') }}" class="nav-link {{ request()->routeIs('agent.show') ? 'active' : '' }}">
                            <span>Ide Platform AI</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ipk.hitung', ['ip1' => '3.88', 'ip2' => '3.92']) }}" class="nav-link {{ request()->routeIs('ipk.hitung') ? 'active' : '' }}">
                            <span>Kalkulator IPK</span>
                            <span class="nav-badge">A+</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                            <span>Dashboard</span>
                            <span class="nav-badge">Group</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div>
                    <strong>Tugas Mandiri: Laravel Local Sandbox (Langkah 1 s.d. 5)</strong><br>
                    Pemrograman Berbasis Kerangka Kerja (PBKK) &bull; Departemen Teknik Informatika ITS
                </div>
                <div class="footer-badge">
                    <span class="status-dot"></span>
                    <span>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) &bull; Aji Zaenul Musthofa (5025241065)</span>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
