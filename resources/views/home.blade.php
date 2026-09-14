@extends('layouts.app')

@section('title', 'Beranda — Portal Profil Mahasiswa ITS & Platform Magentic')

@section('content')
<div style="width: 100%; max-width: 1140px; margin: 0 auto; display: flex; flex-direction: column; gap: 40px;">

    <!-- ========================================================================= -->
    <!-- 1. HERO BANNER: Sambutan Khas ITS & Profil Mahasiswa                      -->
    <!-- ========================================================================= -->
    <div class="grid-2" style="align-items: center; gap: 48px;">
        
        <!-- Kolom Kiri: Sambutan Khas ITS & Foto Diri -->
        <div>
            <!-- Logo ITS & Badge Sambutan Khas ITS -->
            <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 20px; flex-wrap: wrap;">
                <img src="{{ asset('images/logo-its.png') }}" alt="Logo Institut Teknologi Sepuluh Nopember" style="height: 52px; width: auto; object-fit: contain;">
                <div style="display: inline-flex; align-items: center; gap: 8px; background-color: var(--navy-subtle); border: 1px solid var(--navy-border); padding: 6px 14px; border-radius: var(--radius-full);">
                    <span class="live-dot" style="background-color: var(--navy-primary);"></span>
                    <span style="font-size: 13px; font-weight: 700; color: var(--navy-primary); letter-spacing: 0.05em;">
                        VIVAT ITS!!!
                    </span>
                </div>
            </div>

            <h1 style="color: var(--navy-dark); font-size: 48px; font-weight: 800; line-height: 1.15; margin-bottom: 20px; letter-spacing: -0.03em;">
                Portal Profil Mahasiswa<br>
                <span style="color: var(--navy-primary);">Departemen Teknik Informatika</span>
            </h1>

            <p style="color: var(--text-body); font-size: 15.5px; line-height: 1.7; margin-bottom: 28px;">
                Selamat datang di platform profil akademik resmi mahasiswa Institut Teknologi Sepuluh Nopember (ITS) Surabaya yang terintegrasi dengan riset teknologi masa depan dan demonstrasi sistem cerdas <strong>Magentic</strong>.
            </p>

            <!-- Foto Diri & Kartu Identitas Mahasiswa -->
            <div class="card" style="padding: 22px 24px; margin-bottom: 28px; border-left: 4px solid var(--navy-primary);">
                <div style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
                    <!-- Foto Diri / Avatar Representatif -->
                    <div style="position: relative; width: 72px; height: 72px; flex-shrink: 0;">
                        <div style="width: 100%; height: 100%; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--navy-primary) 0%, #3B82F6 100%); display: flex; align-items: center; justify-content: center; font-size: 26px; font-weight: 800; color: #FFFFFF; box-shadow: 0 4px 14px rgba(30, 58, 138, 0.25);">
                            AZM
                        </div>
                        <span style="position: absolute; bottom: -2px; right: -2px; width: 14px; height: 14px; border-radius: 50%; background-color: #10B981; border: 2.5px solid #FFFFFF;" title="Status: Mahasiswa Aktif"></span>
                    </div>

                    <!-- Informasi Data Mahasiswa -->
                    <div style="flex: 1; min-width: 220px;">
                        <h3 id="member_display" style="font-size: 18px; color: var(--navy-dark); font-weight: 700; margin: 0 0 4px 0;">
                            {{ $mahasiswa['nama'] }}
                        </h3>
                        <div style="font-size: 13.5px; color: var(--navy-primary); font-family: 'JetBrains Mono', monospace; font-weight: 600;">
                            NRP: {{ $mahasiswa['nrp'] }} &bull; Semester {{ $mahasiswa['semester'] }}
                        </div>
                        <div style="font-size: 12.5px; color: var(--text-muted); margin-top: 2px;">
                            {{ $mahasiswa['departemen'] }} &bull; (FTEIC)
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Terminal Console & Magentic Framework Scope -->
        <div>
            <div style="background-color: var(--navy-dark); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: var(--radius-lg); padding: 28px; min-height: 330px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: var(--shadow-lg);">
                
                <!-- Terminal Header -->
                <div>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; padding-bottom: 12px; border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <span style="width: 10px; height: 10px; border-radius: 50%; background-color: #EF4444; display: inline-block;"></span>
                            <span style="width: 10px; height: 10px; border-radius: 50%; background-color: #F59E0B; display: inline-block;"></span>
                            <span style="width: 10px; height: 10px; border-radius: 50%; background-color: #10B981; display: inline-block;"></span>
                        </div>
                        <div style="font-family: 'JetBrains Mono', monospace; font-size: 12px; color: #94A3B8;">
                            myITS.system // active
                        </div>
                    </div>

                    <!-- Terminal Logs -->
                    <div style="font-family: 'JetBrains Mono', monospace; font-size: 13px; line-height: 2.1;">
                        <div style="color: #60A5FA;">&gt; inisialisasi portal_akademik...</div>
                        <div style="color: #F8FAFC;">&gt; memuat data mahasiswa: <span style="color: #93C5FD; font-weight: 600;">{{ $mahasiswa['nama'] }} ({{ $mahasiswa['nrp'] }})</span> [OK]</div>
                        <div style="color: #94A3B8;">&gt; koneksi SIM Akademik FTEIC ITS terhubung...</div>
                        <div style="color: #38BDF8; font-size: 12.5px;">
                            &gt; platform_scope: Magentic Agentic IDE &bull; Vivat ITS!
                        </div>
                        <div style="color: #CBD5E1; font-size: 12px; margin-top: 6px; padding-top: 6px; border-top: 1px dashed rgba(255, 255, 255, 0.1);">
                            &gt; siklus_otonom: [Analyze] &rarr; [Plan] &rarr; [Execute] &rarr; [Verify]
                        </div>
                    </div>
                </div>

                <!-- Status Pill -->
                <div style="background-color: rgba(30, 58, 138, 0.35); border: 1px solid rgba(96, 165, 250, 0.3); border-radius: var(--radius-sm); padding: 12px 18px; display: flex; align-items: center; justify-content: space-between; margin-top: 24px;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span class="live-dot" style="background-color: #60A5FA; box-shadow: 0 0 10px #60A5FA;"></span>
                        <span style="color: #93C5FD; font-size: 13px; font-weight: 600;">
                            Status Portal Aktif & Terverifikasi
                        </span>
                    </div>
                    <span style="color: #64748B; font-size: 12px; font-family: 'JetBrains Mono', monospace;">ITS-2026</span>
                </div>

            </div>
        </div>

    </div>

    <!-- ========================================================================= -->
    <!-- 2. TOMBOL AKSES CEPAT KE MENU LAIN (Quick Navigation Grid)                 -->
    <!-- ========================================================================= -->
    <div style="padding-top: 12px;">
        <div style="margin-bottom: 20px;">
            <div style="font-size: 12px; font-weight: 700; color: var(--navy-primary); letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px;">
                NAVIGASI UTAMA
            </div>
            <h2 style="font-size: 26px; color: var(--navy-dark); font-weight: 700;">
                Akses Cepat Menu Portal
            </h2>
        </div>

        <div class="grid-4">
            <!-- 1. Profile Mahasiswa & Departemen -->
            <a href="{{ route('mahasiswa.show', ['nrp' => '5025241065']) }}" class="card" style="display: flex; flex-direction: column; justify-content: space-between; text-decoration: none; padding: 24px; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary); transition: all 0.2s ease;">
                <div>
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 16px; box-shadow: 0 4px 12px rgba(30, 58, 138, 0.25);">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <h3 style="font-size: 17.5px; color: var(--navy-dark); font-weight: 700; margin-bottom: 6px;">
                        Profil Mahasiswa
                    </h3>
                    <p style="font-size: 13px; color: var(--text-body); line-height: 1.55; margin: 0;">
                        Lihat profil lengkap berdasarkan NRP, prodi, dan daftar keahlian (skills).
                    </p>
                </div>
                <div style="margin-top: 20px; font-size: 13px; font-weight: 700; color: var(--navy-primary); display: flex; align-items: center; justify-content: space-between; background: var(--navy-subtle); padding: 8px 14px; border-radius: var(--radius-sm); border: 1px solid var(--navy-border);">
                    <span>Buka Profil</span>
                    <span>&rarr;</span>
                </div>
            </a>

            <!-- 2. Agent Platform Riset -->
            <a href="{{ route('agent.show') }}" class="card" style="display: flex; flex-direction: column; justify-content: space-between; text-decoration: none; padding: 24px; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary); transition: all 0.2s ease;">
                <div>
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 16px; box-shadow: 0 4px 12px rgba(30, 58, 138, 0.25);">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                    </div>
                    <h3 style="font-size: 17.5px; color: var(--navy-dark); font-weight: 700; margin-bottom: 6px;">
                        Platform Agent AI
                    </h3>
                    <p style="font-size: 13px; color: var(--text-body); line-height: 1.55; margin: 0;">
                        Eksplorasi ide platform Agentic AI "Magentic" dengan dukungan tema dinamis.
                    </p>
                </div>
                <div style="margin-top: 20px; font-size: 13px; font-weight: 700; color: var(--navy-primary); display: flex; align-items: center; justify-content: space-between; background: var(--navy-subtle); padding: 8px 14px; border-radius: var(--radius-sm); border: 1px solid var(--navy-border);">
                    <span>Eksplorasi AI</span>
                    <span>&rarr;</span>
                </div>
            </a>

            <!-- 3. Kalkulator IPK -->
            <a href="{{ route('ipk.hitung', ['ip1' => '3.88', 'ip2' => '3.92']) }}" class="card" style="display: flex; flex-direction: column; justify-content: space-between; text-decoration: none; padding: 24px; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary); transition: all 0.2s ease;">
                <div>
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 16px; box-shadow: 0 4px 12px rgba(30, 58, 138, 0.25);">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="2" width="16" height="20" rx="2"></rect>
                            <line x1="8" y1="6" x2="16" y2="6"></line>
                            <line x1="16" y1="14" x2="16" y2="18"></line>
                            <path d="M16 10h.01"></path>
                            <path d="M12 10h.01"></path>
                            <path d="M8 10h.01"></path>
                            <path d="M12 14h.01"></path>
                            <path d="M8 14h.01"></path>
                            <path d="M12 18h.01"></path>
                            <path d="M8 18h.01"></path>
                        </svg>
                    </div>
                    <h3 style="font-size: 17.5px; color: var(--navy-dark); font-weight: 700; margin-bottom: 6px;">
                        Kalkulator IPK
                    </h3>
                    <p style="font-size: 13px; color: var(--text-body); line-height: 1.55; margin: 0;">
                        Hitung akumulasi dan rata-rata IP dua semester dari parameter dinamis URL.
                    </p>
                </div>
                <div style="margin-top: 20px; font-size: 13px; font-weight: 700; color: var(--navy-primary); display: flex; align-items: center; justify-content: space-between; background: var(--navy-subtle); padding: 8px 14px; border-radius: var(--radius-sm); border: 1px solid var(--navy-border);">
                    <span>Hitung IPK</span>
                    <span>&rarr;</span>
                </div>
            </a>

            <!-- 4. Dashboard Portal -->
            <a href="{{ route('dashboard.index') }}" class="card" style="display: flex; flex-direction: column; justify-content: space-between; text-decoration: none; padding: 24px; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary); transition: all 0.2s ease;">
                <div>
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); display: flex; align-items: center; justify-content: center; color: #FFFFFF; margin-bottom: 16px; box-shadow: 0 4px 12px rgba(30, 58, 138, 0.25);">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                    </div>
                    <h3 style="font-size: 17.5px; color: var(--navy-dark); font-weight: 700; margin-bottom: 6px;">
                        Dashboard Portal
                    </h3>
                    <p style="font-size: 13px; color: var(--text-body); line-height: 1.55; margin: 0;">
                        Wadah grouping rute terintegrasi layanan akademik Departemen Teknik Informatika.
                    </p>
                </div>
                <div style="margin-top: 20px; font-size: 13px; font-weight: 700; color: var(--navy-primary); display: flex; align-items: center; justify-content: space-between; background: var(--navy-subtle); padding: 8px 14px; border-radius: var(--radius-sm); border: 1px solid var(--navy-border);">
                    <span>Buka Dashboard</span>
                    <span>&rarr;</span>
                </div>
            </a>
        </div>
    </div>

</div>
@endsection
