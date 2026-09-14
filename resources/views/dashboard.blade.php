@extends('layouts.app')

@section('title', 'Dashboard Akademis Mahasiswa — myITS Portal')

@section('content')
<div style="display: flex; flex-direction: column; gap: 32px; width: 100%;">

    <!-- Header Hero Banner: Deep Navy (#0F172A ke #1E3A8A) -->
    <div style="background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); border-radius: var(--radius-lg); padding: 36px 32px; color: #FFFFFF; box-shadow: 0 4px 20px rgba(15, 23, 42, 0.15); display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; border: 1px solid rgba(255, 255, 255, 0.12);">
        <div>
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 16px; flex-wrap: wrap;">
                <img src="{{ asset('images/logo-its.png') }}" alt="Logo ITS" style="height: 46px; width: auto; object-fit: contain;">
                <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                    <span class="badge" style="background: rgba(56, 189, 248, 0.2); color: #38BDF8; border: 1px solid rgba(56, 189, 248, 0.3);">myITS Academic Portal</span>
                    <span class="badge" style="background: rgba(255, 255, 255, 0.12); color: #F8FAFC; border: 1px solid rgba(255, 255, 255, 0.2);">FTEIC ITS Surabaya</span>
                </div>
            </div>
            <h1 style="font-size: 32px; font-weight: 800; color: #FFFFFF; margin-bottom: 10px; letter-spacing: -0.02em;">
                Dashboard Akademis Mahasiswa
            </h1>
            <p style="color: #CBD5E1; font-size: 15px; max-width: 800px; line-height: 1.6;">
                Pusat monitoring dan integrasi data studi mahasiswa Departemen Teknik Informatika, Institut Teknologi Sepuluh Nopember (ITS) Surabaya.
            </p>
        </div>
        <div>
            <a href="{{ route('home') }}" class="btn" style="background: rgba(255, 255, 255, 0.12); color: #FFFFFF; border: 1px solid rgba(255, 255, 255, 0.25); font-weight: 600;">
                &larr; Kembali ke Home
            </a>
        </div>
    </div>

    <!-- Statistik Cepat (Grid 4 Kolom Metrik) -->
    <div class="grid-4">
        <div class="card" style="padding: 22px; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary);">
            <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                Mahasiswa Terdaftar
            </div>
            <div style="font-size: 18px; font-weight: 700; color: var(--navy-dark); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                {{ $ringkasan['mahasiswa']['nama'] }}
            </div>
            <div style="font-size: 13px; color: var(--navy-primary); font-family: 'JetBrains Mono', monospace; font-weight: 700; margin-top: 4px;">
                NRP: {{ $ringkasan['mahasiswa']['nrp'] }}
            </div>
        </div>

        <div class="card" style="padding: 22px; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary);">
            <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                SKS Lulus
            </div>
            <div style="font-size: 28px; font-weight: 800; color: var(--navy-dark);">
                {{ $ringkasan['statistik']['sks_lulus'] }} SKS
            </div>
            <div style="font-size: 13px; color: var(--text-muted); margin-top: 4px;">
                Semester {{ $ringkasan['mahasiswa']['semester'] }} Teknik Informatika
            </div>
        </div>

        <div class="card" style="padding: 22px; background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); color: #FFFFFF; border: none; box-shadow: 0 4px 14px rgba(15, 23, 42, 0.15);">
            <div style="font-size: 12px; color: #93C5FD; text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                Indeks Prestasi
            </div>
            <div style="font-size: 28px; font-weight: 800; color: #38BDF8;">
                {{ $ringkasan['statistik']['ipk_terakhir'] }}
            </div>
            <div style="font-size: 13px; color: #F8FAFC; font-weight: 600; margin-top: 4px;">
                Predikat: Cum Laude
            </div>
        </div>

        <div class="card" style="padding: 22px; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary);">
            <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                Proyek Unggulan
            </div>
            <div style="font-size: 18px; font-weight: 700; color: var(--navy-dark);">
                {{ $ringkasan['statistik']['proyek_unggulan'] }}
            </div>
            <div style="font-size: 13px; color: var(--text-muted); margin-top: 4px;">
                Autonomous Agent IDE
            </div>
        </div>
    </div>

    <!-- Navigasi Rute Internal Prefix /dashboard (Grid 3 Kolom) -->
    <div>
        <h3 style="font-size: 20px; margin-bottom: 16px; color: var(--navy-dark); font-weight: 700;">Navigasi Rute Internal Prefix /dashboard</h3>
        <div class="grid-3">
            @foreach($ringkasan['quick_links'] as $link)
                <div class="card" style="display: flex; flex-direction: column; justify-content: space-between; border: 1.5px solid #CBD5E1; border-left: 4px solid var(--navy-primary);">
                    <div>
                        <div style="font-size: 12px; color: var(--navy-primary); font-weight: 700; margin-bottom: 6px; font-family: 'JetBrains Mono', monospace;">
                            route('{{ $link['route'] }}')
                        </div>
                        <h4 style="font-size: 18px; margin-bottom: 8px; color: var(--navy-dark); font-weight: 700;">{{ $link['title'] }}</h4>
                        <p style="font-size: 14px; color: var(--text-body); margin-bottom: 20px;">{{ $link['desc'] }}</p>
                    </div>
                    <div>
                        <a href="{{ route($link['route'], $link['params']) }}" class="btn btn-primary" style="width: 100%;">
                            Buka Halaman &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Struktur Rute Code Snippet (Terminal Console UI ala myITS.system // active) -->
    <div class="card" style="border: 1.5px solid #CBD5E1;">
        <div style="margin-bottom: 18px;">
            <h4 style="font-size: 18px; margin-bottom: 6px; color: var(--navy-dark); font-weight: 700;">Struktur Integrasi Rute myITS Portal:</h4>
            <p style="font-size: 14px; color: var(--text-muted); margin: 0;">
                Pemetaan endpoint terpadu layanan akademik Departemen Teknik Informatika ITS:
            </p>
        </div>

        <!-- Terminal Console Window ala myITS.system // active -->
        <div style="background-color: var(--navy-dark); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: var(--radius-lg); padding: 24px 28px; box-shadow: var(--shadow-md);">
            <!-- Window Header Controls -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="width: 10px; height: 10px; border-radius: 50%; background-color: #EF4444; display: inline-block;"></span>
                    <span style="width: 10px; height: 10px; border-radius: 50%; background-color: #F59E0B; display: inline-block;"></span>
                    <span style="width: 10px; height: 10px; border-radius: 50%; background-color: #10B981; display: inline-block;"></span>
                </div>
                <div style="font-family: 'JetBrains Mono', monospace; font-size: 12px; color: #94A3B8;">
                    myITS.system // active
                </div>
            </div>

            <!-- Code Block with Syntax Highlighting -->
            <pre style="margin: 0; padding: 0; background: transparent; border: none; font-family: 'JetBrains Mono', monospace; font-size: 13.5px; line-height: 1.85; overflow-x: auto; color: #F8FAFC;"><code><span style="color: #60A5FA;">Route</span><span style="color: #94A3B8;">::</span><span style="color: #38BDF8;">prefix</span><span style="color: #CBD5E1;">(</span><span style="color: #34D399;">'dashboard'</span><span style="color: #CBD5E1;">)</span><span style="color: #93C5FD;">-&gt;</span><span style="color: #38BDF8;">name</span><span style="color: #CBD5E1;">(</span><span style="color: #34D399;">'dashboard.'</span><span style="color: #CBD5E1;">)</span><span style="color: #93C5FD;">-&gt;</span><span style="color: #38BDF8;">group</span><span style="color: #CBD5E1;">(function () {</span>
    <span style="color: #60A5FA;">Route</span><span style="color: #94A3B8;">::</span><span style="color: #38BDF8;">get</span><span style="color: #CBD5E1;">(</span><span style="color: #34D399;">'/'</span><span style="color: #CBD5E1;">, [</span><span style="color: #FDE047;">AcademicController</span><span style="color: #94A3B8;">::</span><span style="color: #93C5FD;">class</span><span style="color: #CBD5E1;">,</span> <span style="color: #34D399;">'dashboard'</span><span style="color: #CBD5E1;">])</span><span style="color: #93C5FD;">-&gt;</span><span style="color: #38BDF8;">name</span><span style="color: #CBD5E1;">(</span><span style="color: #34D399;">'index'</span><span style="color: #CBD5E1;">);</span>
    <span style="color: #60A5FA;">Route</span><span style="color: #94A3B8;">::</span><span style="color: #38BDF8;">get</span><span style="color: #CBD5E1;">(</span><span style="color: #34D399;">'/mahasiswa/{nrp}'</span><span style="color: #CBD5E1;">, [</span><span style="color: #FDE047;">AcademicController</span><span style="color: #94A3B8;">::</span><span style="color: #93C5FD;">class</span><span style="color: #CBD5E1;">,</span> <span style="color: #34D399;">'mahasiswa'</span><span style="color: #CBD5E1;">])</span>
        <span style="color: #93C5FD;">-&gt;</span><span style="color: #38BDF8;">where</span><span style="color: #CBD5E1;">(</span><span style="color: #34D399;">'nrp'</span><span style="color: #CBD5E1;">,</span> <span style="color: #34D399;">'^[0-9]{10}$'</span><span style="color: #CBD5E1;">)</span>
        <span style="color: #93C5FD;">-&gt;</span><span style="color: #38BDF8;">name</span><span style="color: #CBD5E1;">(</span><span style="color: #34D399;">'mahasiswa'</span><span style="color: #CBD5E1;">);</span>
    <span style="color: #60A5FA;">Route</span><span style="color: #94A3B8;">::</span><span style="color: #38BDF8;">get</span><span style="color: #CBD5E1;">(</span><span style="color: #34D399;">'/hitung-ipk/{ip1}/{ip2}'</span><span style="color: #CBD5E1;">, [</span><span style="color: #FDE047;">AcademicController</span><span style="color: #94A3B8;">::</span><span style="color: #93C5FD;">class</span><span style="color: #CBD5E1;">,</span> <span style="color: #34D399;">'hitungIpk'</span><span style="color: #CBD5E1;">])</span>
        <span style="color: #93C5FD;">-&gt;</span><span style="color: #38BDF8;">where</span><span style="color: #CBD5E1;">([</span><span style="color: #34D399;">'ip1'</span> <span style="color: #93C5FD;">=&gt;</span> <span style="color: #34D399;">'[0-9]+(\.[0-9]+)?'</span><span style="color: #CBD5E1;">,</span> <span style="color: #34D399;">'ip2'</span> <span style="color: #93C5FD;">=&gt;</span> <span style="color: #34D399;">'[0-9]+(\.[0-9]+)?'</span><span style="color: #CBD5E1;">])</span>
        <span style="color: #93C5FD;">-&gt;</span><span style="color: #38BDF8;">name</span><span style="color: #CBD5E1;">(</span><span style="color: #34D399;">'ipk'</span><span style="color: #CBD5E1;">);</span>
<span style="color: #CBD5E1;">});</span></code></pre>

            <!-- Bottom Status Pill (Sesuai Gambar 2) -->
            <div style="background-color: rgba(30, 58, 138, 0.35); border: 1px solid rgba(96, 165, 250, 0.3); border-radius: var(--radius-sm); padding: 12px 18px; display: flex; align-items: center; justify-content: space-between; margin-top: 22px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span class="live-dot" style="background-color: #60A5FA; box-shadow: 0 0 10px #60A5FA;"></span>
                    <span style="color: #93C5FD; font-size: 13px; font-weight: 600;">
                        Status Rute Terdaftar &amp; Terverifikasi
                    </span>
                </div>
                <span style="color: #64748B; font-size: 12px; font-family: 'JetBrains Mono', monospace;">ITS-2026</span>
            </div>
        </div>
    </div>

</div>
@endsection
