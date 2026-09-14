@extends('layouts.app')

@section('title', 'Kalkulator Portofolio Akademis (IPK) — Challenge Nilai A+')

@section('content')
<div style="display: flex; flex-direction: column; gap: 32px;">

    <!-- Breadcrumb & Header -->
    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px;">
        <div>
            <div style="display: flex; gap: 10px; margin-bottom: 12px; flex-wrap: wrap;">
                <span class="badge badge-gold">Tantangan 2 &bull; Challenge Nilai A+</span>
                <span class="badge badge-its">Kalkulator Akademis ITS</span>
            </div>
            <h1 style="font-size: 32px; margin-bottom: 8px;">
                Kalkulator Portofolio Akademis: <span style="color: var(--its-gold);">Rata-rata IPK 2 Semester</span>
            </h1>
            <p style="color: var(--text-muted); font-size: 15px; max-width: 750px;">
                Menerapkan parameter ganda <code>/hitung-ipk/{ip1}/{ip2}</code> untuk menghitung akumulasi total IP dan rata-rata IPK mahasiswa dalam dua semester secara matematis.
            </p>
        </div>
        <div>
            <a href="{{ route('home') }}" class="btn btn-secondary">
                &larr; Kembali ke Home
            </a>
        </div>
    </div>

    <!-- Hasil Kalkulasi Utama -->
    <div class="card" style="background: linear-gradient(135deg, rgba(12, 24, 43, 0.95), rgba(40, 25, 5, 0.5)); border-color: rgba(245, 166, 35, 0.35);">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px; border-bottom: 1px solid var(--border-subtle); padding-bottom: 24px; margin-bottom: 24px;">
            <div>
                <div style="font-size: 13px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 4px;">
                    Predikat Hasil Komputasi
                </div>
                <div style="font-size: 26px; font-weight: 800; color: #ffffff;">
                    {{ $kalkulasi['predikat'] }}
                </div>
            </div>
            <div>
                <span class="badge badge-gold" style="font-size: 14px; padding: 6px 16px;">
                    IPK Rata-rata: {{ $kalkulasi['rata_rata_ipk'] }} / 4.00
                </span>
            </div>
        </div>

        <div class="grid-4">
            <!-- Nilai IP Semester 1 -->
            <div class="card card-elevated" style="text-align: center; padding: 20px;">
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                    IP Semester 1 ($ip1)
                </div>
                <div style="font-size: 34px; font-weight: 800; color: var(--magentic-cyan); font-family: 'JetBrains Mono', monospace;">
                    {{ $kalkulasi['ip_semester_1'] }}
                </div>
                <div style="font-size: 11px; color: var(--text-dim); margin-top: 4px;">Skala Maks 4.00</div>
            </div>

            <!-- Nilai IP Semester 2 -->
            <div class="card card-elevated" style="text-align: center; padding: 20px;">
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                    IP Semester 2 ($ip2)
                </div>
                <div style="font-size: 34px; font-weight: 800; color: var(--magentic-cyan); font-family: 'JetBrains Mono', monospace;">
                    {{ $kalkulasi['ip_semester_2'] }}
                </div>
                <div style="font-size: 11px; color: var(--text-dim); margin-top: 4px;">Skala Maks 4.00</div>
            </div>

            <!-- Total Akumulasi IP -->
            <div class="card card-elevated" style="text-align: center; padding: 20px;">
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                    Total Penjumlahan IP
                </div>
                <div style="font-size: 34px; font-weight: 800; color: var(--its-gold); font-family: 'JetBrains Mono', monospace;">
                    {{ $kalkulasi['total_ip'] }}
                </div>
                <div style="font-size: 11px; color: var(--text-dim); margin-top: 4px;">$ip1 + $ip2</div>
            </div>

            <!-- Rata-rata IPK -->
            <div class="card card-elevated" style="text-align: center; padding: 20px; border-color: rgba(52, 211, 153, 0.3);">
                <div style="font-size: 12px; color: var(--magentic-emerald); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                    Rata-rata IPK
                </div>
                <div style="font-size: 34px; font-weight: 800; color: var(--magentic-emerald); font-family: 'JetBrains Mono', monospace;">
                    {{ $kalkulasi['rata_rata_ipk'] }}
                </div>
                <div style="font-size: 11px; color: var(--magentic-emerald); margin-top: 4px;">($ip1 + $ip2) / 2</div>
            </div>
        </div>

        <div style="margin-top: 24px; padding: 14px 20px; background: rgba(0, 0, 0, 0.3); border-radius: var(--radius-md); border-left: 4px solid var(--its-gold); font-size: 14px; color: var(--text-main);">
            <strong>Analisis Status:</strong> {{ $kalkulasi['analisis'] }}
        </div>
    </div>

    <!-- Form Interaktif Pengujian Nilai IP Baru -->
    <div class="card card-elevated">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Uji Mandiri Kombinasi Nilai IP Lain</h3>
        <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 20px;">
            Masukkan dua nilai IP semester untuk langsung mengalihkan ke rute kalkulator yang sesuai:
        </p>

        <form id="calc_form" onsubmit="handleCalculate(event)" style="display: flex; gap: 16px; flex-wrap: wrap; align-items: flex-end;">
            <div style="flex: 1; min-width: 200px;">
                <label for="input_ip1" style="display: block; font-size: 13px; font-weight: 600; color: var(--text-muted); margin-bottom: 6px;">
                    IP Semester 1 (0.00 - 4.00):
                </label>
                <input type="number" id="input_ip1" step="0.01" min="0" max="4.00" value="{{ $kalkulasi['ip_semester_1'] }}" style="width: 100%; padding: 10px 14px; border-radius: var(--radius-sm); border: 1px solid var(--border-subtle); background: #070d17; color: white; font-family: 'JetBrains Mono', monospace;" required>
            </div>

            <div style="flex: 1; min-width: 200px;">
                <label for="input_ip2" style="display: block; font-size: 13px; font-weight: 600; color: var(--text-muted); margin-bottom: 6px;">
                    IP Semester 2 (0.00 - 4.00):
                </label>
                <input type="number" id="input_ip2" step="0.01" min="0" max="4.00" value="{{ $kalkulasi['ip_semester_2'] }}" style="width: 100%; padding: 10px 14px; border-radius: var(--radius-sm); border: 1px solid var(--border-subtle); background: #070d17; color: white; font-family: 'JetBrains Mono', monospace;" required>
            </div>

            <button type="submit" class="btn btn-gold" style="padding: 11px 24px;">
                Hitung Ulang &rarr;
            </button>
        </form>

        <!-- Presets Uji Cepat -->
        <div style="display: flex; gap: 10px; margin-top: 20px; flex-wrap: wrap; font-size: 13px;">
            <span style="color: var(--text-dim);">Contoh Kombinasi Cepat:</span>
            <a href="{{ route('ipk.hitung', ['ip1' => '4.00', 'ip2' => '4.00']) }}" class="badge badge-emerald" style="text-transform: none;">4.00 & 4.00 (Sempurna)</a>
            <a href="{{ route('ipk.hitung', ['ip1' => '3.85', 'ip2' => '3.90']) }}" class="badge badge-gold" style="text-transform: none;">3.85 & 3.90 (Cum Laude)</a>
            <a href="{{ route('ipk.hitung', ['ip1' => '3.20', 'ip2' => '3.40']) }}" class="badge badge-its" style="text-transform: none;">3.20 & 3.40 (Sangat Memuaskan)</a>
            <a href="{{ route('ipk.hitung', ['ip1' => '2.75', 'ip2' => '2.85']) }}" class="badge" style="background: rgba(255,255,255,0.06); color: #cbd5e1; text-transform: none;">2.75 & 2.85 (Memuaskan)</a>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function handleCalculate(e) {
        e.preventDefault();
        const ip1 = parseFloat(document.getElementById('input_ip1').value).toFixed(2);
        const ip2 = parseFloat(document.getElementById('input_ip2').value).toFixed(2);
        
        // Buat url tujuan menggunakan skema named route
        const baseUrl = '{{ route('ipk.hitung', ['ip1' => 'VAL1', 'ip2' => 'VAL2']) }}';
        const targetUrl = baseUrl.replace('VAL1', ip1).replace('VAL2', ip2);
        window.location.href = targetUrl;
    }
</script>
@endpush
