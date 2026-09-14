@extends('layouts.app')

@section('title', 'Platform Riset Magentic — FTEIC ITS')

@section('content')
<div style="display: flex; flex-direction: column; gap: 36px; width: 100%;">

    <!-- Header Hero Banner: Deep Navy (#0F172A ke #1E3A8A) -->
    <div style="background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); border-radius: var(--radius-lg); padding: 36px 32px; color: #FFFFFF; box-shadow: 0 4px 20px rgba(15, 23, 42, 0.15); display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; border: 1px solid rgba(255, 255, 255, 0.12);">
        <div>
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 16px; flex-wrap: wrap;">
                <img src="{{ asset('images/logo-its.png') }}" alt="Logo ITS" style="height: 46px; width: auto; object-fit: contain;">
                <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                    <span class="badge" style="background: rgba(56, 189, 248, 0.2); color: #38BDF8; border: 1px solid rgba(56, 189, 248, 0.3);">Platform Riset Magentic</span>
                    <span class="badge" style="background: rgba(255, 255, 255, 0.12); color: #F8FAFC; border: 1px solid rgba(255, 255, 255, 0.2);">FTEIC ITS Surabaya</span>
                    @if($rawTema === 'General Assistant Agent')
                        <span class="badge" style="background: rgba(56, 189, 248, 0.25); color: #FFFFFF; border: 1px solid rgba(56, 189, 248, 0.4);">Status: Modul General Assistant Aktif</span>
                        <span style="display:none;">Default Fallback Route Aktif</span>
                    @else
                        <span class="badge" style="background: rgba(255, 255, 255, 0.2); color: #FFFFFF; border: 1px solid rgba(255, 255, 255, 0.3);">Status: Modul Terpilih Aktif</span>
                    @endif
                </div>
            </div>
            <h1 style="font-size: 32px; font-weight: 800; color: #FFFFFF; margin-bottom: 10px; letter-spacing: -0.02em;">
                Eksplorasi Agen Otonom: <span style="color: #38BDF8;">{{ $temaAktif['judul'] }}</span>
            </h1>
            <p style="color: #CBD5E1; font-size: 15px; max-width: 820px; line-height: 1.6;">
                Pusat riset dan arsitektur modul Autonomous AI Agents "Magentic" yang dikembangkan di lingkungan Departemen Teknik Informatika, Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC) ITS.
            </p>
        </div>
        <div>
            <a href="{{ route('home') }}" class="btn" style="background: rgba(255, 255, 255, 0.12); color: #FFFFFF; border: 1px solid rgba(255, 255, 255, 0.25); font-weight: 600;">
                &larr; Kembali ke Home
            </a>
        </div>
    </div>

    <!-- Theme Selector Chips (Container Putih dengan Tombol Terstruktur) -->
    <div class="card" style="padding: 20px 24px; border: 1.5px solid #CBD5E1; border-left: 4px solid var(--navy-primary);">
        <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 12px; letter-spacing: 0.05em;">
            Pilih Modul AI untuk Eksplorasi Kapabilitas:
        </div>
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <!-- Default (Tanpa Parameter) -->
            <a href="{{ route('agent.show') }}" class="btn {{ $rawTema === 'General Assistant Agent' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 8px 16px; font-size: 13px;">
                <span>Default (Tanpa Parameter)</span>
            </a>

            <!-- Code Analysis -->
            <a href="{{ route('agent.show', ['tema' => 'code-analysis']) }}" class="btn {{ $temaAktif['slug'] === 'code-analysis' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 8px 16px; font-size: 13px;">
                <span>Code Analysis</span>
            </a>

            <!-- Autonomous Bug Fixing -->
            <a href="{{ route('agent.show', ['tema' => 'autonomous-bug-fixing']) }}" class="btn {{ $temaAktif['slug'] === 'autonomous-bug-fixing' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 8px 16px; font-size: 13px;">
                <span>Autonomous Bug Fixing</span>
            </a>

            <!-- Collaborative Workflow -->
            <a href="{{ route('agent.show', ['tema' => 'collaborative-workflow']) }}" class="btn {{ $temaAktif['slug'] === 'collaborative-workflow' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 8px 16px; font-size: 13px;">
                <span>Collaborative Workflow</span>
            </a>
        </div>
    </div>

    <!-- Active Theme Detailed Showcase (Card Putih dengan Aksen Border Navy) -->
    <div class="card" style="border: 1.5px solid #CBD5E1; border-left: 5px solid var(--navy-primary);">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--border-card);">
            <div>
                <span class="badge" style="background-color: var(--navy-primary); color: #FFFFFF; font-weight: 700; margin-bottom: 8px;">{{ $temaAktif['badge'] }}</span>
                <h2 style="font-size: 24px; color: var(--navy-dark); font-weight: 700;">{{ $temaAktif['judul'] }}</h2>
                <p style="font-size: 15px; color: var(--text-body); margin-top: 6px;">
                    {{ $temaAktif['deskripsi_singkat'] }}
                </p>
            </div>
            <div style="background-color: var(--navy-subtle); padding: 8px 14px; border-radius: var(--radius-sm); border: 1px solid var(--navy-border); font-family: 'JetBrains Mono', monospace; font-size: 12.5px; color: var(--navy-primary); font-weight: 600;">
                Parameter: "{{ $rawTema }}"
            </div>
        </div>

        <!-- Fitur & Pipeline (Grid 2 Kolom Sejajar) -->
        <div class="grid-2">
            <div style="background-color: #FFFFFF; padding: 20px; border-radius: var(--radius-md); border: 1.5px solid #CBD5E1; border-left: 4px solid var(--navy-primary); box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);">
                <h4 style="font-size: 15px; margin-bottom: 12px; color: var(--navy-primary); font-weight: 700; display: flex; align-items: center; gap: 8px;">
                    <span style="font-size: 18px;">&bull;</span> Fitur Utama Modul:
                </h4>
                <ul style="padding-left: 18px; font-size: 14px; color: var(--text-body); display: flex; flex-direction: column; gap: 10px;">
                    @foreach($temaAktif['fitur'] as $fitur)
                        <li>{{ $fitur }}</li>
                    @endforeach
                </ul>
            </div>

            <div style="background-color: #FFFFFF; padding: 20px; border-radius: var(--radius-md); border: 1.5px solid #CBD5E1; border-left: 4px solid var(--navy-dark); display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);">
                <div>
                    <h4 style="font-size: 15px; margin-bottom: 12px; color: var(--navy-dark); font-weight: 700; display: flex; align-items: center; gap: 8px;">
                        <span style="font-size: 18px;">&bull;</span> Pipeline & Alur Eksekusi:
                    </h4>
                    <div style="padding: 14px; background-color: var(--navy-dark); border-radius: var(--radius-sm); font-family: 'JetBrains Mono', monospace; font-size: 12.5px; color: #38BDF8; font-weight: 600; line-height: 1.6; border: 1px solid rgba(255, 255, 255, 0.1);">
                        {{ $temaAktif['alur_kerja'] }}
                    </div>
                </div>
                <div style="margin-top: 16px; font-size: 12px; color: var(--text-muted);">
                    Terintegrasi dengan AST analysis, WebSocket Listener & Laravel Worker Sandbox.
                </div>
            </div>
        </div>
    </div>

    <!-- 4-Step Autonomous Loop Magentic Framework (Grid 4 Kolom Rapi) -->
    <div>
        <div style="margin-bottom: 18px;">
            <h3 style="font-size: 22px; color: var(--navy-dark); font-weight: 700;">Siklus Eksekusi Otonom (Autonomous Agent Loop)</h3>
            <p style="color: var(--text-body); font-size: 14px;">
                Magentic tidak hanya merespons teks percakapan, melainkan menjalankan loop 4-tahap tertutup secara otonom:
            </p>
        </div>

        <div class="grid-4">
            @foreach($autonomousLoop as $index => $phase)
                <div class="card" style="padding: 22px; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary); transition: all 0.2s ease;">
                    <span style="background-color: var(--navy-dark); color: #38BDF8; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 6px; letter-spacing: 0.05em; font-family: 'JetBrains Mono', monospace; display: inline-block; margin-bottom: 10px;">
                        STEP {{ $index + 1 }}
                    </span>
                    <h4 style="font-size: 18px; color: var(--navy-dark); margin-bottom: 8px; font-weight: 700;">{{ $phase['fase'] }}</h4>
                    <p style="font-size: 13.5px; color: var(--text-body); line-height: 1.6;">
                        {{ $phase['penjelasan'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Form Input Modul Riset Kustom -->
    <div class="card" style="border: 1.5px solid #CBD5E1; border-left: 5px solid var(--navy-primary);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 14px;">
            <div style="width: 40px; height: 40px; border-radius: 10px; background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); display: flex; align-items: center; justify-content: center; color: #FFFFFF; box-shadow: 0 4px 10px rgba(30, 58, 138, 0.2);">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>
            <div>
                <h4 style="font-size: 17px; color: var(--navy-dark); font-weight: 700; margin: 0;">Eksplorasi Modul Riset Kustom</h4>
                <p style="font-size: 13.5px; color: var(--text-muted); margin: 2px 0 0 0;">
                    Masukkan topik atau nama modul riset komputasi untuk meninjau orkestrasi agen AI Magentic secara dinamis:
                </p>
            </div>
        </div>
        <form onsubmit="event.preventDefault(); const tema = document.getElementById('custom_tema').value.trim(); if(tema) window.location.href = '{{ route('agent.show', ['tema' => 'REPLACE_TEMA']) }}'.replace('REPLACE_TEMA', encodeURIComponent(tema));" style="display: flex; gap: 12px; flex-wrap: wrap;">
            <input type="text" id="custom_tema" placeholder="Misal: code-review-assistant atau distributed-systems-agent" style="flex: 1; min-width: 280px; background: #F8FAFC; border: 1.5px solid #CBD5E1;" required>
            <button type="submit" class="btn btn-primary">
                Buka Modul Kustom
            </button>
        </form>
    </div>

</div>
@endsection
