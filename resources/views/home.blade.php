@extends('layouts.app')

@section('title', 'Beranda Utama — Vivat ITS & Platform Magentic')

@section('content')
<div style="display: flex; flex-direction: column; gap: 40px;">

    <!-- Banner Sambutan Khas ITS -->
    <div class="card" style="background: linear-gradient(135deg, rgba(0, 40, 85, 0.9), rgba(12, 24, 43, 0.95)); border: 1px solid rgba(0, 114, 206, 0.35); position: relative;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 24px;">
            <div style="max-width: 760px;">
                <div style="display: flex; gap: 10px; margin-bottom: 16px; flex-wrap: wrap;">
                    <span class="badge badge-gold">Vivat ITS! Kampus Perjuangan</span>
                    <span class="badge badge-its">PBKK Pertemuan 2 &bull; Sandbox</span>
                    <span class="badge badge-emerald">Routing & Controllers Active</span>
                </div>
                <h1 style="font-size: 38px; line-height: 1.2; margin-bottom: 16px;">
                    Selamat Datang di <span style="background: linear-gradient(to right, #38bdf8, #818cf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Magentic Local Sandbox</span>
                </h1>
                <p style="font-size: 16px; color: var(--text-muted); margin-bottom: 24px;">
                    Aplikasi sandbox routing mandiri mahasiswa Departemen Teknik Informatika ITS. Mengintegrasikan profil akademis resmi, kalkulator performa studi, serta visi proyek akhir semester berupa platform <strong>Agentic AI Browser IDE ("Magentic")</strong>.
                </p>
                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="{{ route('mahasiswa.show', ['nrp' => $mahasiswa['nrp']]) }}" class="btn btn-primary">
                        <span>Lihat Profil Lengkap</span>
                        <code>{{ $mahasiswa['nrp'] }}</code>
                    </a>
                    <a href="{{ route('agent.show') }}" class="btn btn-secondary">
                        <span>Eksplorasi Agen AI</span>
                        &rarr;
                    </a>
                    <a href="{{ route('ipk.hitung', ['ip1' => '3.85', 'ip2' => '3.95']) }}" class="btn btn-gold">
                        <span>Kalkulator IPK (Challenge A+)</span>
                    </a>
                </div>
            </div>

            <!-- Kartu Ringkas Mahasiswa -->
            <div class="card card-elevated" style="flex: 1; min-width: 280px; max-width: 360px; padding: 20px; border-color: rgba(245, 166, 35, 0.25);">
                <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 16px;">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, var(--its-gold), #d97706); display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 22px; color: #070d17;">
                        AZ
                    </div>
                    <div>
                        <h4 style="font-size: 16px; margin-bottom: 2px;">{{ $mahasiswa['nama'] }}</h4>
                        <div style="font-size: 12px; color: var(--magentic-cyan); font-family: 'JetBrains Mono', monospace;">NRP: {{ $mahasiswa['nrp'] }}</div>
                    </div>
                </div>
                <div style="font-size: 13px; color: var(--text-muted); display: flex; flex-direction: column; gap: 8px; border-top: 1px solid var(--border-subtle); padding-top: 12px;">
                    <div><strong>Departemen:</strong> {{ $mahasiswa['departemen'] }}</div>
                    <div><strong>Semester:</strong> Ke-{{ $mahasiswa['semester'] }} (Tahun ke-3)</div>
                    <div><strong>Fakultas:</strong> {{ $mahasiswa['fakultas'] }}</div>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 4px;">
                        <span>Status Akademik:</span>
                        <span class="badge badge-emerald" style="padding: 2px 8px; font-size: 11px;">{{ $mahasiswa['status'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Showcase: Platform "Magentic" -->
    <div>
        <div style="margin-bottom: 24px;">
            <span class="badge badge-purple" style="margin-bottom: 8px;">Proyeksi Proyek Akhir PBKK</span>
            <h2 style="font-size: 28px; margin-bottom: 8px;">Arsitektur Platform "Magentic"</h2>
            <p style="color: var(--text-muted); font-size: 15px; max-width: 800px;">
                {{ $platform['deskripsi'] }}
            </p>
        </div>

        <!-- 4-Step Autonomous Agent Loop -->
        <div class="grid-4" style="margin-bottom: 32px;">
            @foreach($platform['agent_loop'] as $step)
                <div class="card" style="padding: 22px; border-left: 4px solid var(--magentic-cyan);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                        <span class="badge badge-its" style="font-size: 11px;">Fase 0{{ $step['step'] }}</span>
                        <span style="font-size: 20px; font-weight: 800; color: var(--text-dim);">#{{ $step['step'] }}</span>
                    </div>
                    <h3 style="font-size: 18px; margin-bottom: 8px; color: #ffffff;">{{ $step['name'] }}</h3>
                    <p style="font-size: 13px; color: var(--text-muted); line-height: 1.5;">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Interactive Mock Monaco Editor with Real-Time Multi-Cursor -->
        <div class="card" style="padding: 0; background: #080f1a; border-color: rgba(56, 189, 248, 0.25);">
            <!-- Window header -->
            <div style="background: #0d192b; padding: 12px 20px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--border-subtle);">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #f43f5e; display: inline-block;"></span>
                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #f59e0b; display: inline-block;"></span>
                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #10b981; display: inline-block;"></span>
                    <span style="margin-left: 12px; font-size: 13px; color: var(--text-muted); font-family: 'JetBrains Mono', monospace;">
                        magentic-workspace / routes / web.php
                    </span>
                </div>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <span class="badge badge-emerald" style="font-size: 11px;">
                        <span class="status-dot" style="width: 6px; height: 6px;"></span>
                        Reverb WebSocket Connected
                    </span>
                    <span style="font-size: 12px; color: var(--text-dim); font-family: 'JetBrains Mono', monospace;">2 Active Peers</span>
                </div>
            </div>

            <!-- Code Body with Multi-Cursor indicators -->
            <div style="padding: 24px; font-family: 'JetBrains Mono', monospace; font-size: 13px; line-height: 1.8; overflow-x: auto; position: relative;">
                
                <!-- Simulated Code Lines -->
                <div style="color: #64748b;">// 1. Inisialisasi Named Route untuk Platform Magentic</div>
                <div>
                    <span style="color: #f43f5e;">Route</span>::<span style="color: #38bdf8;">get</span>(<span style="color: #34d399;">'/'</span>, [<span style="color: #f59e0b;">HomeController</span>::<span style="color: #818cf8;">class</span>, <span style="color: #34d399;">'index'</span>])-><span style="color: #38bdf8;">name</span>(<span style="color: #34d399;">'home'</span>);
                </div>
                
                <div style="color: #64748b; margin-top: 8px;">// 2. Rute Profil dengan Regex 10 Digit NRP ITS</div>
                <div>
                    <span style="color: #f43f5e;">Route</span>::<span style="color: #38bdf8;">get</span>(<span style="color: #34d399;">'/mahasiswa/{nrp}'</span>, [<span style="color: #f59e0b;">AcademicController</span>::<span style="color: #818cf8;">class</span>, <span style="color: #34d399;">'mahasiswa'</span>])
                </div>
                <div style="padding-left: 24px;">
                    -><span style="color: #38bdf8;">where</span>(<span style="color: #34d399;">'nrp'</span>, <span style="color: #34d399;">'^[0-9]{10}$'</span>)
                    <!-- Active Remote Cursor: Aji -->
                    <span style="display: inline-flex; align-items: center; background: #0284c7; color: white; font-size: 10px; font-weight: 700; padding: 1px 6px; border-radius: 4px; margin-left: 8px; animation: pulse 1.5s infinite;">
                        &#x25C0; Aji (You)
                    </span>
                </div>
                <div style="padding-left: 24px;">
                    -><span style="color: #38bdf8;">name</span>(<span style="color: #34d399;">'mahasiswa.show'</span>);
                </div>

                <div style="color: #64748b; margin-top: 8px;">// 3. Rute Agen Otonom dengan Parameter Opsional Fallback</div>
                <div>
                    <span style="color: #f43f5e;">Route</span>::<span style="color: #38bdf8;">get</span>(<span style="color: #34d399;">'/agent/{tema?}'</span>, [<span style="color: #f59e0b;">AgentController</span>::<span style="color: #818cf8;">class</span>, <span style="color: #34d399;">'show'</span>])
                </div>
                <div style="padding-left: 24px;">
                    <!-- Active Remote Cursor: Arda -->
                    <span style="display: inline-flex; align-items: center; background: #e11d48; color: white; font-size: 10px; font-weight: 700; padding: 1px 6px; border-radius: 4px; margin-right: 8px; animation: pulse 2s infinite;">
                        &#x25C0; Arda
                    </span>
                    -><span style="color: #38bdf8;">name</span>(<span style="color: #34d399;">'agent.show'</span>);
                </div>
            </div>

            <!-- Footer Tech Stack Pills -->
            <div style="padding: 16px 24px; background: #0c182b; border-top: 1px solid var(--border-subtle); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
                <div style="font-size: 12px; color: var(--text-dim); text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em;">
                    Arsitektur Ekosistem:
                </div>
                <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                    <span class="badge" style="background: rgba(255, 255, 255, 0.05); color: #cbd5e1; border: 1px solid var(--border-subtle);">Monaco Editor</span>
                    <span class="badge" style="background: rgba(255, 255, 255, 0.05); color: #cbd5e1; border: 1px solid var(--border-subtle);">Laravel 11+ / PHP 8.4</span>
                    <span class="badge" style="background: rgba(255, 255, 255, 0.05); color: #cbd5e1; border: 1px solid var(--border-subtle);">Laravel Reverb</span>
                    <span class="badge" style="background: rgba(255, 255, 255, 0.05); color: #cbd5e1; border: 1px solid var(--border-subtle);">Autonomous Agent Loop</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Navigation Hub (Semua menggunakan Named Routes) -->
    <div class="card card-elevated">
        <h3 style="font-size: 20px; margin-bottom: 16px;">Uji Mandiri Rute & Named Routes</h3>
        <p style="color: var(--text-muted); font-size: 14px; margin-bottom: 20px;">
            Seluruh tautan navigasi di bawah ini menggunakan fungsi pembantu <code>route('nama.rute')</code> tanpa hardcoded URL:
        </p>

        <div class="grid-3">
            <div style="padding: 16px; border: 1px solid var(--border-subtle); border-radius: var(--radius-md); background: rgba(0, 0, 0, 0.2);">
                <div style="font-size: 12px; color: var(--magentic-cyan); font-weight: 700; margin-bottom: 6px;">RUTE WAJIB 2</div>
                <h4 style="font-size: 16px; margin-bottom: 8px;">Profil Mahasiswa Valid</h4>
                <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 14px;">Menguji parameter wajib 10 digit NRP ITS (5025241065).</p>
                <a href="{{ route('mahasiswa.show', ['nrp' => '5025241065']) }}" class="btn btn-secondary" style="width: 100%;">
                    Buka Profil 5025241065
                </a>
            </div>

            <div style="padding: 16px; border: 1px solid var(--border-subtle); border-radius: var(--radius-md); background: rgba(0, 0, 0, 0.2);">
                <div style="font-size: 12px; color: var(--magentic-indigo); font-weight: 700; margin-bottom: 6px;">RUTE WAJIB 3</div>
                <h4 style="font-size: 16px; margin-bottom: 8px;">Eksplorasi Tema Agen</h4>
                <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 14px;">Menguji parameter tema opsional (misal: Code Analysis).</p>
                <a href="{{ route('agent.show', ['tema' => 'code-analysis']) }}" class="btn btn-secondary" style="width: 100%;">
                    Buka Tema Code Analysis
                </a>
            </div>

            <div style="padding: 16px; border: 1px solid var(--border-subtle); border-radius: var(--radius-md); background: rgba(0, 0, 0, 0.2);">
                <div style="font-size: 12px; color: var(--its-gold); font-weight: 700; margin-bottom: 6px;">CHALLENGE A+</div>
                <h4 style="font-size: 16px; margin-bottom: 8px;">Kalkulator IPK Otomatis</h4>
                <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 14px;">Menjumlahkan dan menghitung rata-rata IP semester (3.80 & 3.90).</p>
                <a href="{{ route('ipk.hitung', ['ip1' => '3.80', 'ip2' => '3.90']) }}" class="btn btn-gold" style="width: 100%;">
                    Hitung IPK 3.80 & 3.90
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
