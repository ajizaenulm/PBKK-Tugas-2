@extends('layouts.app')

@section('title', 'Kalkulator Portofolio Akademis — myITS Student Portal')

@section('content')
<div style="display: flex; flex-direction: column; gap: 32px; width: 100%;">

    <!-- Header Hero Banner: Deep Navy (#0F172A ke #1E3A8A) -->
    <div style="background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); border-radius: var(--radius-lg); padding: 36px 32px; color: #FFFFFF; box-shadow: 0 4px 20px rgba(15, 23, 42, 0.15); display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; border: 1px solid rgba(255, 255, 255, 0.12);">
        <div>
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 16px; flex-wrap: wrap;">
                <img src="{{ asset('images/logo-its.png') }}" alt="Logo ITS" style="height: 46px; width: auto; object-fit: contain;">
                <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                    <span class="badge" style="background: rgba(56, 189, 248, 0.2); color: #38BDF8; border: 1px solid rgba(56, 189, 248, 0.3);">SIM Akademik ITS</span>
                    <span class="badge" style="background: rgba(255, 255, 255, 0.12); color: #F8FAFC; border: 1px solid rgba(255, 255, 255, 0.2);">Evaluasi Indeks Prestasi</span>
                </div>
            </div>
            <h1 style="font-size: 32px; font-weight: 800; color: #FFFFFF; margin-bottom: 10px; letter-spacing: -0.02em;">
                Kalkulator Portofolio Akademis: <span style="color: #38BDF8;">Rata-rata IPK 2 Semester</span>
            </h1>
            <p style="color: #CBD5E1; font-size: 15px; max-width: 760px; line-height: 1.6;">
                Simulasi perhitungan akumulasi Indeks Prestasi (IP) semester dan proyeksi IPK kumulatif mahasiswa Institut Teknologi Sepuluh Nopember (ITS).
            </p>
        </div>
        <div>
            <a href="{{ route('home') }}" class="btn" style="background: rgba(255, 255, 255, 0.12); color: #FFFFFF; border: 1px solid rgba(255, 255, 255, 0.25); font-weight: 600;">
                &larr; Kembali ke Home
            </a>
        </div>
    </div>

    <!-- Hasil Kalkulasi Utama (Card Container Putih Bersih & Border Tipis) -->
    <div class="card" style="border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary);">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px; border-bottom: 1px solid var(--border-card); padding-bottom: 20px; margin-bottom: 24px;">
            <div>
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em; margin-bottom: 4px;">
                    Predikat Hasil Komputasi
                </div>
                <div style="font-size: 26px; font-weight: 800; color: var(--navy-dark);">
                    {{ $kalkulasi['predikat'] }}
                </div>
            </div>
            <div>
                <span class="badge" style="background-color: var(--navy-primary); color: #FFFFFF; font-size: 14px; padding: 7px 20px; font-weight: 700;">
                    IPK Rata-rata: {{ $kalkulasi['rata_rata_ipk'] }} / 4.00
                </span>
            </div>
        </div>

        <!-- Metrik 4 Kolom Rapi -->
        <div class="grid-4">
            <!-- Nilai IP Semester 1 -->
            <div style="background-color: #FFFFFF; border: 1.5px solid #CBD5E1; border-top: 3.5px solid var(--navy-primary); border-radius: var(--radius-md); text-align: center; padding: 20px; box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05);">
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                    IP Semester 1
                </div>
                <div style="font-size: 36px; font-weight: 800; color: var(--navy-primary); font-family: 'JetBrains Mono', monospace;">
                    {{ $kalkulasi['ip_semester_1'] }}
                </div>
                <div style="font-size: 12px; color: var(--text-muted); margin-top: 4px;">Skala Maks 4.00</div>
            </div>

            <!-- Nilai IP Semester 2 -->
            <div style="background-color: #FFFFFF; border: 1.5px solid #CBD5E1; border-top: 3.5px solid var(--navy-primary); border-radius: var(--radius-md); text-align: center; padding: 20px; box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05);">
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                    IP Semester 2
                </div>
                <div style="font-size: 36px; font-weight: 800; color: var(--navy-primary); font-family: 'JetBrains Mono', monospace;">
                    {{ $kalkulasi['ip_semester_2'] }}
                </div>
                <div style="font-size: 12px; color: var(--text-muted); margin-top: 4px;">Skala Maks 4.00</div>
            </div>

            <!-- Total Akumulasi IP -->
            <div style="background-color: #FFFFFF; border: 1.5px solid #CBD5E1; border-top: 3.5px solid #64748B; border-radius: var(--radius-md); text-align: center; padding: 20px; box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05);">
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                    Total Penjumlahan IP
                </div>
                <div style="font-size: 36px; font-weight: 800; color: var(--navy-dark); font-family: 'JetBrains Mono', monospace;">
                    {{ $kalkulasi['total_ip'] }}
                </div>
                <div style="font-size: 12px; color: var(--text-muted); margin-top: 4px;">Akumulasi 2 Semester</div>
            </div>

            <!-- Rata-rata IPK -->
            <div style="background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); color: #FFFFFF; border-radius: var(--radius-md); text-align: center; padding: 20px; box-shadow: 0 6px 18px rgba(15, 23, 42, 0.18);">
                <div style="font-size: 12px; color: #93C5FD; text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
                    Rata-rata IPK
                </div>
                <div style="font-size: 36px; font-weight: 800; color: #38BDF8; font-family: 'JetBrains Mono', monospace;">
                    {{ $kalkulasi['rata_rata_ipk'] }}
                </div>
                <div style="font-size: 12px; color: #F8FAFC; font-weight: 600; margin-top: 4px;">Indeks Prestasi Kumulatif</div>
            </div>
        </div>

        <div style="margin-top: 24px; padding: 14px 18px; background-color: var(--navy-subtle); border-radius: var(--radius-md); border-left: 4px solid var(--navy-primary); border: 1px solid var(--navy-border); font-size: 14px; color: var(--navy-dark);">
            <strong style="color: var(--navy-primary);">Analisis Status:</strong> {{ $kalkulasi['analisis'] }}
        </div>
    </div>

    <!-- Form Interaktif Pengujian Nilai IP Baru -->
    <div class="card" style="border: 1.5px solid #CBD5E1; border-left: 5px solid var(--navy-primary);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 14px;">
            <div style="width: 40px; height: 40px; border-radius: 10px; background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); display: flex; align-items: center; justify-content: center; color: #FFFFFF; box-shadow: 0 4px 10px rgba(30, 58, 138, 0.2);">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
            <div>
                <h3 style="font-size: 18px; margin: 0; color: var(--navy-dark); font-weight: 700;">Uji Mandiri Kombinasi Nilai IP Lain</h3>
                <p style="font-size: 13.5px; color: var(--text-muted); margin: 2px 0 0 0;">
                    Masukkan dua nilai IP semester untuk langsung mengalihkan ke rute kalkulator yang sesuai:
                </p>
            </div>
        </div>

        <form id="calc_form" onsubmit="handleCalculate(event)" style="display: flex; gap: 16px; flex-wrap: wrap; align-items: flex-end;">
            <div style="flex: 1; min-width: 200px;">
                <label for="input_ip1" style="display: block; font-size: 13px; font-weight: 700; color: var(--navy-dark); margin-bottom: 6px;">
                    IP Semester 1 (0.00 - 4.00):
                </label>
                <input type="number" id="input_ip1" step="0.01" min="0" max="4.00" value="{{ $kalkulasi['ip_semester_1'] }}" style="width: 100%; font-family: 'JetBrains Mono', monospace; background: #F8FAFC; border: 1.5px solid #CBD5E1;" required>
            </div>

            <div style="flex: 1; min-width: 200px;">
                <label for="input_ip2" style="display: block; font-size: 13px; font-weight: 700; color: var(--navy-dark); margin-bottom: 6px;">
                    IP Semester 2 (0.00 - 4.00):
                </label>
                <input type="number" id="input_ip2" step="0.01" min="0" max="4.00" value="{{ $kalkulasi['ip_semester_2'] }}" style="width: 100%; font-family: 'JetBrains Mono', monospace; background: #F8FAFC; border: 1.5px solid #CBD5E1;" required>
            </div>

            <button type="submit" class="btn btn-primary" style="padding: 11px 24px;">
                Hitung Ulang &rarr;
            </button>
        </form>

        <!-- Presets Uji Cepat -->
        <div style="display: flex; gap: 10px; margin-top: 20px; flex-wrap: wrap; align-items: center; font-size: 13px;">
            <span style="color: var(--text-muted); font-weight: 600;">Contoh Kombinasi Cepat:</span>
            <a href="{{ route('ipk.hitung', ['ip1' => '4.00', 'ip2' => '4.00']) }}" class="badge" style="background: #EEF2FF; color: #1E3A8A; border: 1px solid #C7D2FE; font-weight: 700; text-transform: none; text-decoration: none; padding: 6px 14px; transition: all 0.15s ease;" onmouseover="this.style.backgroundColor='#1E3A8A'; this.style.color='#FFFFFF';" onmouseout="this.style.backgroundColor='#EEF2FF'; this.style.color='#1E3A8A';">4.00 & 4.00 (Sempurna)</a>
            <a href="{{ route('ipk.hitung', ['ip1' => '3.85', 'ip2' => '3.90']) }}" class="badge" style="background: #EEF2FF; color: #1E3A8A; border: 1px solid #C7D2FE; font-weight: 700; text-transform: none; text-decoration: none; padding: 6px 14px; transition: all 0.15s ease;" onmouseover="this.style.backgroundColor='#1E3A8A'; this.style.color='#FFFFFF';" onmouseout="this.style.backgroundColor='#EEF2FF'; this.style.color='#1E3A8A';">3.85 & 3.90 (Cum Laude)</a>
            <a href="{{ route('ipk.hitung', ['ip1' => '3.20', 'ip2' => '3.40']) }}" class="badge" style="background: #EEF2FF; color: #1E3A8A; border: 1px solid #C7D2FE; font-weight: 700; text-transform: none; text-decoration: none; padding: 6px 14px; transition: all 0.15s ease;" onmouseover="this.style.backgroundColor='#1E3A8A'; this.style.color='#FFFFFF';" onmouseout="this.style.backgroundColor='#EEF2FF'; this.style.color='#1E3A8A';">3.20 & 3.40 (Sangat Memuaskan)</a>
            <a href="{{ route('ipk.hitung', ['ip1' => '2.75', 'ip2' => '2.85']) }}" class="badge" style="background: #EEF2FF; color: #1E3A8A; border: 1px solid #C7D2FE; font-weight: 700; text-transform: none; text-decoration: none; padding: 6px 14px; transition: all 0.15s ease;" onmouseover="this.style.backgroundColor='#1E3A8A'; this.style.color='#FFFFFF';" onmouseout="this.style.backgroundColor='#EEF2FF'; this.style.color='#1E3A8A';">2.75 & 2.85 (Memuaskan)</a>
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
