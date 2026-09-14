@extends('layouts.app')

@section('title', 'Ide Platform Agentic AI ("Magentic") — PBKK Sandbox')

@section('content')
<div style="display: flex; flex-direction: column; gap: 36px;">

    <!-- Header Section -->
    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px;">
        <div>
            <div style="display: flex; gap: 10px; margin-bottom: 12px; flex-wrap: wrap;">
                <span class="badge badge-purple">Rute Wajib 3 &bull; Parameter Opsional</span>
                <span class="badge badge-its">Platform Magentic</span>
                @if($rawTema === 'General Assistant Agent')
                    <span class="badge badge-gold">Status: Default Fallback Route Aktif</span>
                @else
                    <span class="badge badge-emerald">Status: Parameter Tema Terdeteksi</span>
                @endif
            </div>
            <h1 style="font-size: 32px; margin-bottom: 8px;">
                Eksplorasi Agen Otonom: <span style="color: var(--magentic-cyan);">{{ $temaAktif['judul'] }}</span>
            </h1>
            <p style="color: var(--text-muted); font-size: 15px; max-width: 800px;">
                Menerapkan parameter rute dinamis opsional <code>/agent/{tema?}</code>. Jika URL diakses tanpa parameter, sistem secara cerdas menggunakan nilai bawaan (fallback): <code>'General Assistant Agent'</code>.
            </p>
        </div>
        <div>
            <a href="{{ route('home') }}" class="btn btn-secondary">
                &larr; Kembali ke Home
            </a>
        </div>
    </div>

    <!-- Theme Selector Chips (Named Routes Navigasi Cepat) -->
    <div class="card card-elevated" style="padding: 20px;">
        <div style="font-size: 12px; color: var(--text-dim); text-transform: uppercase; font-weight: 700; margin-bottom: 12px; letter-spacing: 0.05em;">
            Pilih Tema Platform untuk Menguji Parameter Rute:
        </div>
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <!-- Default (No Parameter) -->
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

    <!-- Active Theme Detailed Showcase -->
    <div class="card" style="border-left: 6px solid var(--magentic-cyan); background: linear-gradient(135deg, rgba(12, 24, 43, 0.98), rgba(17, 34, 61, 0.9));">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px; margin-bottom: 20px;">
            <div>
                <span class="badge badge-its" style="margin-bottom: 8px;">{{ $temaAktif['badge'] }}</span>
                <h2 style="font-size: 26px; color: #ffffff;">{{ $temaAktif['judul'] }}</h2>
                <p style="font-size: 15px; color: var(--text-muted); margin-top: 6px;">
                    {{ $temaAktif['deskripsi_singkat'] }}
                </p>
            </div>
            <div style="background: rgba(0, 0, 0, 0.3); padding: 10px 16px; border-radius: var(--radius-sm); border: 1px solid var(--border-subtle); font-family: 'JetBrains Mono', monospace; font-size: 12px; color: var(--magentic-cyan);">
                Parameter: "{{ $rawTema }}"
            </div>
        </div>

        <!-- Capability & Pipeline -->
        <div class="grid-2" style="margin-top: 24px;">
            <div style="background: rgba(0, 0, 0, 0.25); padding: 20px; border-radius: var(--radius-md); border: 1px solid var(--border-subtle);">
                <h4 style="font-size: 15px; margin-bottom: 12px; color: var(--magentic-emerald); display: flex; align-items: center; gap: 8px;">
                    <span>&bull;</span> Fitur Utama Modul:
                </h4>
                <ul style="padding-left: 18px; font-size: 13.5px; color: var(--text-main); display: flex; flex-direction: column; gap: 10px;">
                    @foreach($temaAktif['fitur'] as $fitur)
                        <li>{{ $fitur }}</li>
                    @endforeach
                </ul>
            </div>

            <div style="background: rgba(0, 0, 0, 0.25); padding: 20px; border-radius: var(--radius-md); border: 1px solid var(--border-subtle); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <h4 style="font-size: 15px; margin-bottom: 12px; color: var(--magentic-cyan); display: flex; align-items: center; gap: 8px;">
                        <span>&bull;</span> Pipeline & Alur Eksekusi:
                    </h4>
                    <div style="padding: 14px; background: #070d17; border-radius: var(--radius-sm); font-family: 'JetBrains Mono', monospace; font-size: 12px; color: #a5f3fc; line-height: 1.6; border: 1px solid rgba(56, 189, 248, 0.2);">
                        {{ $temaAktif['alur_kerja'] }}
                    </div>
                </div>
                <div style="margin-top: 16px; font-size: 12px; color: var(--text-dim);">
                    Terintegrasi dengan Monaco Editor AST, WebSocket Listener & Laravel Worker Sandbox.
                </div>
            </div>
        </div>
    </div>

    <!-- 4-Step Autonomous Loop Magentic Framework -->
    <div>
        <div style="margin-bottom: 18px;">
            <h3 style="font-size: 22px;">Siklus Eksekusi Otonom (Autonomous Agent Loop)</h3>
            <p style="color: var(--text-muted); font-size: 14px;">
                Magentic tidak hanya merespons teks percakapan, melainkan menjalankan loop 4-tahap tertutup secara otonom:
            </p>
        </div>

        <div class="grid-4">
            @foreach($autonomousLoop as $index => $phase)
                <div class="card card-elevated" style="position: relative;">
                    <div style="font-size: 12px; font-weight: 700; color: var(--magentic-indigo); text-transform: uppercase; margin-bottom: 6px;">
                        Step {{ $index + 1 }}
                    </div>
                    <h4 style="font-size: 20px; color: #ffffff; margin-bottom: 8px;">{{ $phase['fase'] }}</h4>
                    <p style="font-size: 13px; color: var(--text-muted); line-height: 1.6;">
                        {{ $phase['penjelasan'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Custom URL Parameter Tester -->
    <div class="card card-elevated" style="background: rgba(12, 24, 43, 0.5);">
        <h4 style="font-size: 16px; margin-bottom: 8px;">Uji Parameter Tema Kustom</h4>
        <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 14px;">
            Coba masukkan kata kunci tema buatan Anda sendiri untuk melihat bagaimana parameter opsional ditangkap oleh controller:
        </p>
        <form onsubmit="event.preventDefault(); const tema = document.getElementById('custom_tema').value.trim(); if(tema) window.location.href = '{{ route('agent.show', ['tema' => 'REPLACE_TEMA']) }}'.replace('REPLACE_TEMA', encodeURIComponent(tema));" style="display: flex; gap: 12px; flex-wrap: wrap;">
            <input type="text" id="custom_tema" placeholder="Misal: code-review-assistant atau docker-orchestrator" style="flex: 1; min-width: 280px; padding: 10px 16px; border-radius: var(--radius-md); border: 1px solid var(--border-subtle); background: #070d17; color: white; font-size: 14px;" required>
            <button type="submit" class="btn btn-primary">
                Buka Tema Kustom
            </button>
        </form>
    </div>

</div>
@endsection
