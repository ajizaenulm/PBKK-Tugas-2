@extends('layouts.app')

@section('title', 'Detail Profil Mahasiswa (' . $mahasiswa['nrp'] . ') — PBKK Sandbox')

@section('content')
<div style="display: flex; flex-direction: column; gap: 32px;">

    <!-- Breadcrumb & Navigasi Cepat -->
    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
        <div style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--text-muted);">
            <a href="{{ route('home') }}" style="color: var(--magentic-cyan);">Home</a>
            <span>&bull;</span>
            <span>Profil Mahasiswa</span>
            <span>&bull;</span>
            <code style="color: #ffffff;">{{ $mahasiswa['nrp'] }}</code>
        </div>
        <div>
            <a href="{{ route('home') }}" class="btn btn-secondary" style="padding: 6px 14px; font-size: 13px;">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </div>

    <!-- Header Profil Card -->
    <div class="card" style="background: linear-gradient(135deg, rgba(12, 24, 43, 0.95), rgba(0, 40, 85, 0.6)); border-color: rgba(56, 189, 248, 0.3);">
        <div style="display: flex; align-items: center; gap: 24px; flex-wrap: wrap;">
            <div style="width: 84px; height: 84px; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--its-blue), var(--magentic-indigo)); display: flex; align-items: center; justify-content: center; font-size: 36px; font-weight: 800; color: white; box-shadow: 0 0 25px rgba(0, 114, 206, 0.4);">
                {{ substr($mahasiswa['nama'], 0, 1) }}
            </div>
            <div style="flex: 1; min-width: 260px;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 6px; flex-wrap: wrap;">
                    <h1 style="font-size: 28px;">{{ $mahasiswa['nama'] }}</h1>
                    <span class="badge badge-emerald">{{ $mahasiswa['status_akademik'] }}</span>
                    <span class="badge badge-its">Angkatan {{ $mahasiswa['angkatan'] }}</span>
                </div>
                <div style="font-size: 15px; color: var(--magentic-cyan); font-family: 'JetBrains Mono', monospace; margin-bottom: 6px;">
                    NRP: {{ $mahasiswa['nrp'] }} (10 Digit Validasi Regex Lolos)
                </div>
                <p style="color: var(--text-muted); font-size: 14px;">
                    {{ $mahasiswa['departemen'] }} &bull; {{ $mahasiswa['fakultas'] }} &bull; {{ $mahasiswa['kampus'] }}
                </p>
            </div>
            <div>
                <a href="{{ route('ipk.hitung', ['ip1' => '3.88', 'ip2' => '3.92']) }}" class="btn btn-gold">
                    <span>Hitung IPK Semester</span>
                    &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- Detail Statistik & Riwayat Akademis -->
    <div class="grid-3">
        <div class="card card-elevated" style="text-align: center;">
            <div style="font-size: 13px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 8px;">
                Semester Saat Ini
            </div>
            <div style="font-size: 40px; font-weight: 800; color: #ffffff;">
                {{ $mahasiswa['semester'] }}
            </div>
            <div style="font-size: 12px; color: var(--magentic-cyan); margin-top: 4px;">Tahun Akademik 2026/2027 Ganjil</div>
        </div>

        <div class="card card-elevated" style="text-align: center;">
            <div style="font-size: 13px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 8px;">
                Total SKS Ditempuh
            </div>
            <div style="font-size: 40px; font-weight: 800; color: var(--its-gold);">
                {{ $mahasiswa['sks_ditempuh'] }}
            </div>
            <div style="font-size: 12px; color: var(--text-dim); margin-top: 4px;">SKS Lulus & Terverifikasi</div>
        </div>

        <div class="card card-elevated" style="text-align: center;">
            <div style="font-size: 13px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 8px;">
                IPK Kumulatif Terakhir
            </div>
            <div style="font-size: 40px; font-weight: 800; color: var(--magentic-emerald);">
                {{ number_format($mahasiswa['ipk_kumulatif'], 2) }}
            </div>
            <div style="font-size: 12px; color: var(--magentic-emerald); margin-top: 4px;">Predikat: Cum Laude</div>
        </div>
    </div>

    <!-- Mata Kuliah Semester 5 & Prestasi -->
    <div class="grid-2">
        <!-- Tabel Mata Kuliah -->
        <div class="card">
            <h3 style="font-size: 18px; margin-bottom: 16px; display: flex; align-items: center; justify-content: space-between;">
                <span>Mata Kuliah Semester 5</span>
                <span class="badge badge-its">{{ count($mahasiswa['mata_kuliah_semester_ini']) }} Kelas</span>
            </h3>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                @foreach($mahasiswa['mata_kuliah_semester_ini'] as $mk)
                    <div style="padding: 12px 16px; background: rgba(0, 0, 0, 0.2); border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 14px; font-weight: 600; color: #ffffff;">{{ $mk['nama'] }}</div>
                            <div style="font-size: 12px; color: var(--text-dim); font-family: 'JetBrains Mono', monospace;">{{ $mk['kode'] }} &bull; Kelas {{ $mk['kelas'] }}</div>
                        </div>
                        <div>
                            <span class="badge" style="background: rgba(56, 189, 248, 0.15); color: var(--magentic-cyan);">{{ $mk['sks'] }} SKS</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Bidang Keahlian & Keterlibatan Proyek -->
        <div class="card">
            <h3 style="font-size: 18px; margin-bottom: 16px;">Fokus Riset & Portofolio Proyek</h3>
            <div style="margin-bottom: 20px;">
                <div style="font-size: 13px; color: var(--text-muted); margin-bottom: 6px;">Minat Studi Utama:</div>
                <div style="padding: 12px; background: rgba(0, 0, 0, 0.2); border-left: 3px solid var(--magentic-indigo); font-size: 14px; border-radius: 4px;">
                    {{ $mahasiswa['minat_studi'] }}
                </div>
            </div>

            <div style="font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Catatan & Kontribusi Unggulan:</div>
            <ul style="padding-left: 20px; font-size: 14px; color: var(--text-main); display: flex; flex-direction: column; gap: 8px;">
                @foreach($mahasiswa['prestasi'] as $p)
                    <li>{{ $p }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Sandbox Uji Regex NRP (Tantangan 1) -->
    <div class="card card-elevated" style="border-color: rgba(245, 166, 35, 0.3);">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px; margin-bottom: 16px;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 6px;">Tantangan 1: Pengamanan Parameter Regex</span>
                <h3 style="font-size: 18px;">Uji Validasi Parameter NRP 10 Digit</h3>
                <p style="font-size: 13px; color: var(--text-muted); max-width: 700px;">
                    Rute ini dilindungi aturan <code>->where('nrp', '^[0-9]{10}$')</code>. Jika NRP kurang dari 10 digit, lebih dari 10 digit, atau mengandung karakter huruf, sistem Laravel akan menolaknya dan mengalihkan ke rute fallback 404.
                </p>
            </div>
        </div>

        <!-- Interactive Form to Test Other NRPs -->
        <form onsubmit="event.preventDefault(); const nrp = document.getElementById('test_nrp').value.trim(); if(nrp) window.location.href = '{{ route('mahasiswa.show', ['nrp' => 'REPLACE_NRP']) }}'.replace('REPLACE_NRP', encodeURIComponent(nrp));" style="display: flex; gap: 12px; flex-wrap: wrap;">
            <input type="text" id="test_nrp" placeholder="Masukkan 10 digit NRP (misal: 5025241001)" pattern="[0-9]{10}" title="Harus 10 digit angka bulat" style="flex: 1; min-width: 260px; padding: 12px 16px; border-radius: var(--radius-md); border: 1px solid var(--border-subtle); background: #070d17; color: white; font-family: 'JetBrains Mono', monospace; font-size: 14px;" required>
            <button type="submit" class="btn btn-primary">
                Uji Buka Rute Mahasiswa
            </button>
        </form>

        <div style="display: flex; gap: 8px; margin-top: 14px; flex-wrap: wrap; font-size: 12px;">
            <span style="color: var(--text-dim);">Uji Cepat Coba:</span>
            <a href="{{ route('mahasiswa.show', ['nrp' => '5025241065']) }}" style="color: var(--magentic-cyan); text-decoration: underline;">5025241065 (Aji)</a>
            <span style="color: var(--text-dim);">&bull;</span>
            <a href="{{ route('mahasiswa.show', ['nrp' => '5025241001']) }}" style="color: var(--magentic-cyan); text-decoration: underline;">5025241001 (NRP Lain)</a>
            <span style="color: var(--text-dim);">&bull;</span>
            <a href="{{ url('/mahasiswa/12345') }}" style="color: var(--magentic-rose); text-decoration: underline;" title="Harus ditolak regex dan memunculkan 404">12345 (5 digit - Demo Tolak Regex)</a>
        </div>
    </div>

</div>
@endsection
