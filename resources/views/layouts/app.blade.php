<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ITS Student Profile & Magentic Sandbox')</title>

    <!-- Google Fonts: Plus Jakarta Sans, Outfit & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Design System (Clean White & Navy Blue Architecture) -->
    <style>
        :root {
            /* Palet Warna: Dominan Putih Bersih & Aksen Navy Blue */
            --bg-base: #F1F5F9;              /* Slate off-white with clear card contrast */
            --bg-card: #FFFFFF;              /* Putih bersih untuk container */
            --bg-subtle: #E2E8F0;            /* Background elemen sekunder */
            
            --navy-dark: #0F172A;            /* Deep Slate Navy (Header, Title, Badge) */
            --navy-primary: #1E3A8A;         /* Primary Navy Blue (CTA, Aksen utama) */
            --navy-hover: #172554;           /* Navy Hover state */
            --navy-subtle: #EEF2FF;          /* Navy tint terang untuk badge/highlight */
            --navy-border: #C7D2FE;          /* Border navy halus */
            
            --text-heading: #0F172A;         /* Navy gelap untuk judul & heading */
            --text-body: #334155;            /* Abu netral gelap untuk paragraf/isi */
            --text-muted: #64748B;           /* Abu sedang untuk metadata/deskripsi */
            --text-dim: #94A3B8;             /* Abu ringan untuk label pendukung */
            
            --border-card: #E2E8F0;          /* Garis tepi tipis konsisten */
            --border-input: #CBD5E1;         /* Border form input */
            
            --shadow-sm: 0 1px 3px 0 rgba(15, 23, 42, 0.06), 0 1px 2px -1px rgba(15, 23, 42, 0.06);
            --shadow-md: 0 4px 12px -2px rgba(15, 23, 42, 0.08), 0 2px 6px -2px rgba(15, 23, 42, 0.06);
            --shadow-lg: 0 10px 25px -3px rgba(15, 23, 42, 0.1), 0 4px 10px -4px rgba(15, 23, 42, 0.06);
            
            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --radius-full: 9999px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-base);
            color: var(--text-body);
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
            color: var(--text-heading);
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        code, pre, .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* Container Layout */
        .container {
            width: 100%;
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Navbar Header: Navy Blue (#0F172A) Berwibawa */
        .navbar-wrapper {
            position: sticky;
            top: 0;
            z-index: 100;
            background-color: #0F172A;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.15);
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 36px;
            list-style: none;
        }

        .nav-link {
            font-size: 15px;
            font-weight: 500;
            color: #CBD5E1;
            transition: color 0.15s ease;
            position: relative;
            padding: 8px 0;
            display: inline-block;
        }

        .nav-link:hover {
            color: #FFFFFF;
        }

        .nav-link.active {
            color: #FFFFFF;
            font-weight: 700;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 3px;
            background-color: #38BDF8;
            border-radius: 2px;
            box-shadow: 0 0 10px rgba(56, 189, 248, 0.6);
        }

        /* Main Wrapper */
        .main-wrapper {
            flex: 1;
            padding: 48px 0 72px 0;
        }

        /* Layout Card: Kontainer Putih dengan Border Halus & Soft Shadow */
        .card {
            background-color: var(--bg-card);
            border: 1.5px solid #CBD5E1;
            border-radius: var(--radius-lg);
            padding: 28px;
            box-shadow: 0 1px 3px 0 rgba(15, 23, 42, 0.05);
            transition: all 0.2s ease;
        }

        .card:hover {
            border-color: #94A3B8;
            box-shadow: var(--shadow-md);
        }

        .card-navy-top {
            border-top: 4px solid var(--navy-primary) !important;
        }

        .card-navy-left {
            border-left: 4px solid var(--navy-primary) !important;
        }

        .card-navy-solid {
            background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%) !important;
            color: #FFFFFF !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            box-shadow: 0 6px 18px -2px rgba(15, 23, 42, 0.15) !important;
        }

        .card-elevated {
            background-color: #FFFFFF;
            border: 1.5px solid #CBD5E1;
            box-shadow: var(--shadow-sm);
        }

        /* Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        .badge-navy {
            background-color: var(--navy-subtle);
            color: var(--navy-primary);
            border: 1px solid var(--navy-border);
        }

        .badge-navy-solid {
            background-color: var(--navy-primary);
            color: #FFFFFF;
            border: 1px solid var(--navy-primary);
            font-weight: 700;
        }

        .badge-dark {
            background-color: var(--navy-dark);
            color: #FFFFFF;
            border: 1px solid var(--navy-dark);
        }

        .badge-subtle {
            background-color: var(--bg-subtle);
            color: var(--text-body);
            border: 1px solid var(--border-card);
        }

        /* Tombol (Navy Blue & Outline Sekunder) */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: var(--radius-md);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            outline: none;
            text-decoration: none;
        }

        .btn-primary {
            background-color: var(--navy-primary);
            color: #FFFFFF;
            border: 1px solid var(--navy-primary);
            box-shadow: 0 1px 2px 0 rgba(30, 58, 138, 0.2);
        }

        .btn-primary:hover {
            background-color: var(--navy-dark);
            border-color: var(--navy-dark);
            box-shadow: var(--shadow-sm);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #FFFFFF;
            color: var(--navy-dark);
            border: 1px solid var(--border-input);
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary:hover {
            background-color: var(--bg-subtle);
            border-color: #94A3B8;
            transform: translateY(-1px);
        }

        .btn-gold {
            background-color: var(--navy-dark);
            color: #FFFFFF;
            border: 1px solid var(--navy-dark);
            box-shadow: var(--shadow-sm);
        }

        .btn-gold:hover {
            background-color: var(--navy-primary);
            border-color: var(--navy-primary);
            transform: translateY(-1px);
        }

        /* Form Inputs: Background Putih, Border Halus & Navy Focus Ring */
        input[type="text"], input[type="number"], select {
            width: 100%;
            background-color: #FFFFFF;
            border: 1px solid var(--border-input);
            color: var(--text-heading);
            border-radius: var(--radius-md);
            padding: 10px 14px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input[type="text"]:focus, input[type="number"]:focus, select:focus {
            outline: none;
            border-color: var(--navy-primary);
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.15);
        }

        /* Grid Utilities */
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
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
            .nav-links {
                gap: 16px;
                flex-wrap: wrap;
            }
            .navbar {
                height: auto;
                padding: 16px 0;
            }
        }

        /* Clean Minimalist Footer */
        .footer {
            border-top: 1px solid var(--border-card);
            background-color: #FFFFFF;
            padding: 24px 0;
            color: var(--text-muted);
            font-size: 13px;
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        /* Status Dot Indicator */
        .live-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #2563EB;
            box-shadow: 0 0 8px rgba(37, 99, 235, 0.6);
            display: inline-block;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navbar Header: Navy Blue (#0F172A) Terpusat -->
    <header class="navbar-wrapper">
        <div class="container">
            <nav class="navbar">
                <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 10px; text-decoration: none; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'" title="Institut Teknologi Sepuluh Nopember">
                    <img src="{{ asset('images/logo-its-navbar.png') }}" alt="Institut Teknologi Sepuluh Nopember" style="height: 44px; width: auto; object-fit: contain;">
                </a>
                <ul class="nav-links">
                    <li>
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa.show', ['nrp' => '5025241065']) }}" class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agent.show') }}" class="nav-link {{ request()->routeIs('agent.*') ? 'active' : '' }}">
                            Agent
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ipk.hitung', ['ip1' => '3.88', 'ip2' => '3.92']) }}" class="nav-link {{ request()->routeIs('ipk.*') ? 'active' : '' }}">
                            IPK Calculator
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                            Dashboard
                        </a>
                    </li>
                </ul>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span class="badge" style="background-color: rgba(30, 58, 138, 0.5); color: #93C5FD; border: 1px solid rgba(96, 165, 250, 0.3); font-size: 11.5px; font-weight: 700;">FTEIC ITS</span>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Global Deep Navy Footer (#0F172A) -->
    <footer style="background-color: #0F172A; border-top: 1px solid rgba(255, 255, 255, 0.1); color: #94A3B8; padding: 28px 0; margin-top: auto;">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 24px;">
                <div style="display: flex; align-items: center; gap: 14px;">
                    <img src="{{ asset('images/logo-its.png') }}" alt="Logo ITS" style="height: 44px; width: auto; object-fit: contain;">
                    <div>
                        <div style="color: #FFFFFF; font-weight: 700; font-size: 15px;">Institut Teknologi Sepuluh Nopember (ITS)</div>
                        <div style="color: #94A3B8; font-size: 12.5px;">Departemen Teknik Informatika &bull; Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC)</div>
                    </div>
                </div>
                <div style="display: flex; gap: 24px; flex-wrap: wrap; font-size: 13.5px;">
                    <a href="{{ route('home') }}" style="color: #CBD5E1; transition: color 0.2s;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#CBD5E1'">Home</a>
                    <a href="{{ route('mahasiswa.show', ['nrp' => '5025241065']) }}" style="color: #CBD5E1; transition: color 0.2s;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#CBD5E1'">Profile</a>
                    <a href="{{ route('agent.show') }}" style="color: #CBD5E1; transition: color 0.2s;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#CBD5E1'">Agent</a>
                    <a href="{{ route('ipk.hitung', ['ip1' => '3.88', 'ip2' => '3.92']) }}" style="color: #CBD5E1; transition: color 0.2s;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#CBD5E1'">IPK Calculator</a>
                    <a href="{{ route('dashboard.index') }}" style="color: #CBD5E1; transition: color 0.2s;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#CBD5E1'">Dashboard</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
