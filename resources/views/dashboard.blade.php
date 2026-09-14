@extends('layouts.app')

@section('title', 'Dashboard Akademis — Tantangan 3 Route Grouping')

@section('content')
<div style="display: flex; flex-direction: column; gap: 32px;">

    <!-- Header Dashboard -->
    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px;">
        <div>
            <div style="display: flex; gap: 10px; margin-bottom: 12px; flex-wrap: wrap;">
                <span class="badge badge-its">Tantangan 3 &bull; Route Grouping Prefix /dashboard</span>
                <span class="badge badge-emerald">Named Routes: dashboard.*</span>
            </div>
            <h1 style="font-size: 32px; margin-bottom: 8px;">
                Dashboard Akademis Mahasiswa
            </h1>
            <p style="color: var(--text-muted); font-size: 15px; max-width: 800px;">
                Semua rute dalam halaman ini dikelompokkan rapi di bawah grup rute Laravel <code>Route::prefix('dashboard')->name('dashboard.')->group(...)</code> untuk pengelolaan arsitektur aplikasi yang terstruktur.
            </p>
        </div>
        <div>
            <a href="{{ route('home') }}" class="btn btn-secondary">
                &larr; Kembali ke Home
            </a>
        </div>
    </div>

    <!-- Statistik Cepat -->
    <div class="grid-4">
        <div class="card card-elevated">
            <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                Mahasiswa Terdaftar
            </div>
            <div style="font-size: 20px; font-weight: 700; color: #ffffff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                {{ $ringkasan['mahasiswa']['nama'] }}
            </div>
            <div style="font-size: 12px; color: var(--magentic-cyan); font-family: 'JetBrains Mono', monospace; margin-top: 4px;">
                NRP: {{ $ringkasan['mahasiswa']['nrp'] }}
            </div>
        </div>

        <div class="card card-elevated">
            <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                SKS Lulus
            </div>
            <div style="font-size: 28px; font-weight: 800; color: var(--its-gold);">
                {{ $ringkasan['statistik']['sks_lulus'] }} SKS
            </div>
            <div style="font-size: 12px; color: var(--text-dim); margin-top: 4px;">
                Semester {{ $ringkasan['mahasiswa']['semester'] }} Teknik Informatika
            </div>
        </div>

        <div class="card card-elevated">
            <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                Indeks Prestasi
            </div>
            <div style="font-size: 28px; font-weight: 800; color: var(--magentic-emerald);">
                {{ $ringkasan['statistik']['ipk_terakhir'] }}
            </div>
            <div style="font-size: 12px; color: var(--magentic-emerald); margin-top: 4px;">
                Predikat: Cum Laude
            </div>
        </div>

        <div class="card card-elevated">
            <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                Proyek Unggulan
            </div>
            <div style="font-size: 20px; font-weight: 700; color: var(--magentic-cyan);">
                {{ $ringkasan['statistik']['proyek_unggulan'] }}
            </div>
            <div style="font-size: 12px; color: var(--text-dim); margin-top: 4px;">
                Autonomous Agent IDE
            </div>
        </div>
    </div>

    <!-- Quick Navigation Dalam Group Prefix Dashboard -->
    <div>
        <h3 style="font-size: 20px; margin-bottom: 16px;">Navigasi Rute Internal Prefix /dashboard</h3>
        <div class="grid-3">
            @foreach($ringkasan['quick_links'] as $link)
                <div class="card" style="display: flex; flex-direction: column; justify-content: space-between; border-left: 4px solid var(--magentic-indigo);">
                    <div>
                        <div style="font-size: 12px; color: var(--magentic-cyan); font-weight: 700; margin-bottom: 6px; font-family: 'JetBrains Mono', monospace;">
                            route('{{ $link['route'] }}')
                        </div>
                        <h4 style="font-size: 18px; margin-bottom: 8px; color: #ffffff;">{{ $link['title'] }}</h4>
                        <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 20px;">{{ $link['desc'] }}</p>
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

    <!-- Struktur Rute Code Snippet -->
    <div class="card card-elevated">
        <h4 style="font-size: 16px; margin-bottom: 8px; color: var(--its-gold);">Penjelasan Kode Arsitektur Rute Grouping:</h4>
        <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 14px;">
            Berikut potongan deklarasi di <code>routes/web.php</code> yang mendasari grup rute ini:
        </p>
        <pre style="background: #070d17; padding: 18px; border-radius: var(--radius-sm); border: 1px solid var(--border-subtle); font-size: 13px; color: #e2e8f0; overflow-x: auto; line-height: 1.6;"><code>Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [AcademicController::class, 'dashboard'])->name('index');
    Route::get('/mahasiswa/{nrp}', [AcademicController::class, 'mahasiswa'])
        ->where('nrp', '^[0-9]{10}$')
        ->name('mahasiswa');
    Route::get('/hitung-ipk/{ip1}/{ip2}', [AcademicController::class, 'hitungIpk'])
        ->where(['ip1' => '[0-9]+(\.[0-9]+)?', 'ip2' => '[0-9]+(\.[0-9]+)?'])
        ->name('ipk');
});</code></pre>
    </div>

</div>
@endsection
