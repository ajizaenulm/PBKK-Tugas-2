@extends('layouts.app')

@section('title', 'Profil Departemen Teknik Informatika & Data Mahasiswa — ITS')

@push('styles')
<style>
    /* Styling Khusus Halaman Profil Departemen & Mahasiswa (Dominan Putih & Aksen Navy Blue) */
    .dept-hero-card {
        background-color: #FFFFFF;
        border: 1.5px solid #CBD5E1;
        border-radius: var(--radius-lg);
        padding: 56px 36px;
        text-align: center;
        box-shadow: var(--shadow-sm);
        position: relative;
        overflow: hidden;
    }

    .dept-hero-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--navy-dark) 0%, var(--navy-primary) 50%, #38BDF8 100%);
    }

    .dept-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background-color: var(--navy-subtle);
        color: var(--navy-primary);
        border: 1px solid var(--navy-border);
        border-radius: var(--radius-full);
        padding: 6px 16px;
        font-size: 12.5px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        margin-bottom: 24px;
    }

    .dept-title {
        color: var(--navy-dark);
        font-size: 46px;
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.03em;
        max-width: 860px;
        margin: 0 auto 20px auto;
    }

    .dept-desc {
        color: var(--text-body);
        font-size: 16px;
        line-height: 1.7;
        max-width: 760px;
        margin: 0 auto 32px auto;
    }

    /* 4 Kartu Statistik dengan Nuansa Biru Navy Terpadu */
    .stat-card-navy {
        background: #0F172A;
        border: 1px solid rgba(30, 58, 138, 0.45);
        border-radius: var(--radius-md);
        padding: 22px 20px;
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.12);
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .stat-card-navy:hover {
        transform: translateY(-2px);
        border-color: #38BDF8;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.25);
    }

    .stat-num-navy {
        font-size: 38px;
        font-weight: 800;
        color: #38BDF8;
        font-family: 'Outfit', sans-serif;
        line-height: 1;
        margin-bottom: 8px;
    }

    .stat-label-navy {
        color: #93C5FD;
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .stat-sub-text {
        color: #CBD5E1;
        font-size: 12.5px;
        line-height: 1.5;
    }

    /* Kartu Visi: Biru Navy Berwibawa */
    .visi-card-navy {
        background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%);
        color: #FFFFFF;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-left: 5px solid #38BDF8;
        border-radius: var(--radius-md);
        padding: 22px 26px;
        box-shadow: 0 4px 16px rgba(15, 23, 42, 0.15);
    }

    /* Grid 8 Laboratorium: Seragam 3 Kolom Presisi */
    .lab-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
    }

    @media (max-width: 920px) {
        .lab-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .lab-grid {
            grid-template-columns: 1fr;
        }
    }

    /* 8 Laboratorium Cards: Ukuran Presisi, Seragam & Selaras */
    .lab-card-item {
        padding: 22px 22px;
        background-color: #FFFFFF;
        border: 1.5px solid #CBD5E1;
        border-left: 4px solid var(--navy-primary);
        border-radius: var(--radius-md);
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05);
        transition: all 0.2s ease;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        min-width: 0;
        height: 100%;
        min-height: 245px;
        box-sizing: border-box;
    }

    .lab-card-item:hover {
        border-color: var(--navy-primary);
        background-color: #F8FAFC;
        box-shadow: 0 8px 20px -4px rgba(30, 58, 138, 0.18);
        transform: translateY(-2px);
    }

    .lab-card-header {
        min-height: 88px;
        margin-bottom: 10px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .lab-badge {
        background-color: var(--navy-primary);
        color: #FFFFFF;
        font-size: 11px;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 6px;
        letter-spacing: 0.05em;
        display: inline-block;
        margin-bottom: 10px;
        width: fit-content;
    }

    .lab-title {
        color: var(--navy-dark);
        font-size: 14.5px;
        font-weight: 700;
        line-height: 1.35;
        margin: 0;
    }

    .lab-desc {
        color: #475569;
        font-size: 12.5px;
        line-height: 1.6;
        margin: 0;
        min-height: 80px;
    }

    /* Chips Skill Teknis Mahasiswa */
    .skill-chip {
        background-color: var(--navy-subtle);
        color: var(--navy-primary);
        border: 1px solid var(--navy-border);
        padding: 6px 14px;
        border-radius: var(--radius-full);
        font-size: 12.5px;
        font-weight: 600;
        display: inline-block;
        transition: all 0.15s ease;
    }

    .skill-chip:hover {
        background-color: var(--navy-primary);
        color: #FFFFFF;
        border-color: var(--navy-primary);
        transform: translateY(-1px);
    }
</style>
@endpush

@section('content')
<div style="display: flex; flex-direction: column; gap: 48px; width: 100%;">

    <!-- ========================================================================= -->
    <!-- 1. HERO SECTION: Departemen Teknik Informatika ITS                        -->
    <!-- ========================================================================= -->
    <div class="dept-hero-card">
        <!-- Logo Resmi ITS -->
        <div style="margin-bottom: 20px;">
            <img src="{{ asset('images/logo-its.png') }}" alt="Logo Institut Teknologi Sepuluh Nopember" style="height: 56px; width: auto; object-fit: contain;">
        </div>

        <!-- Badge dengan Ikon Buku Terbuka -->
        <div class="dept-badge">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
            <span>PROFIL AKADEMIK ITS</span>
        </div>

        <!-- Judul Besar -->
        <h1 class="dept-title">
            Departemen Teknik Informatika ITS
        </h1>

        <!-- Deskripsi Bahasa Indonesia -->
        <p class="dept-desc">
            Mengembangkan sumber daya manusia unggul dan kompetitif di bidang komputasi, rekayasa perangkat lunak, serta kecerdasan artifisial menuju standar internasional.
        </p>

        <!-- Tombol CTA -->
        <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
            <a href="#profil-departemen" class="btn btn-primary" style="padding: 12px 28px;">
                Profil Departemen
            </a>
            <a href="#data-mahasiswa" class="btn btn-secondary" style="padding: 12px 28px;">
                Tim Kami
            </a>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- 2. TENTANG DEPARTEMEN & STATISTIK SECTION                                 -->
    <!-- ========================================================================= -->
    <div id="profil-departemen" style="padding-top: 8px;">
        <div style="text-align: center; margin-bottom: 36px;">
            <div style="color: var(--navy-primary); font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 6px;">
                TENTANG DEPARTEMEN
            </div>
            <h2 style="font-size: 34px; color: var(--navy-dark); font-weight: 800; letter-spacing: -0.02em;">
                Profil Departemen
            </h2>
        </div>

        <div class="grid-2" style="align-items: start; gap: 32px;">
            
            <!-- Kolom Kiri: 2 Paragraf Narasi + Kartu Visi -->
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div class="card" style="line-height: 1.8; color: var(--text-body); font-size: 14.5px;">
                    <p style="margin-bottom: 16px;">
                        Departemen Teknik Informatika (TC) di Institut Teknologi Sepuluh Nopember (ITS) Surabaya berfokus pada pendidikan, penelitian mutakhir, dan inovasi di bidang ilmu komputasi, rekayasa perangkat lunak, dan kecerdasan artifisial. Departemen ini berkomitmen untuk melahirkan lulusan berdaya saing global yang dibekali landasan teori yang kokoh, keterampilan praktis, dan kemampuan untuk mengatasi tantangan teknologi yang kompleks.
                    </p>
                    <p style="margin: 0;">
                        Melalui sinergi kurikulum Outcome-Based Education (OBE), kegiatan riset laboratorium intensif, dan proyek nyata berorientasi industri, departemen memberikan kesempatan luas bagi mahasiswa untuk mengeksplorasi rekayasa perangkat lunak, sains data, sistem cerdas, jaringan komputer, hingga komputasi awan demi mendorong kemajuan teknologi nasional maupun internasional.
                    </p>
                </div>

                <!-- Kartu Visi: Biru Navy Berwibawa -->
                <div class="visi-card-navy">
                    <div style="display: flex; align-items: center; gap: 8px; color: #38BDF8; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 8px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>VISI DEPARTEMEN</span>
                    </div>
                    <p style="color: #F8FAFC; font-size: 14.5px; line-height: 1.7; margin: 0; font-weight: 500;">
                        "Visi departemen adalah menjadi institusi pendidikan tinggi terkemuka yang diakui secara internasional di bidang Teknik Informatika dan Sains Komputasi."
                    </p>
                </div>
            </div>

            <!-- Kolom Kanan: 4 Kartu Statistik Biru Navy (1985, 5+, 10+, 50+) & Akreditasi -->
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
                    <!-- 1985 ESTABLISHED -->
                    <div class="stat-card-navy">
                        <div class="stat-num-navy">1985</div>
                        <div class="stat-label-navy">TAHUN BERDIRI</div>
                        <div class="stat-sub-text">Pionir pendidikan ilmu komputer di kawasan Indonesia timur</div>
                    </div>

                    <!-- 5+ STUDY PROGRAM -->
                    <div class="stat-card-navy">
                        <div class="stat-num-navy">5+</div>
                        <div class="stat-label-navy">PROGRAM STUDI</div>
                        <div class="stat-sub-text">S1 Reguler, S1 IUP Internasional, S2, S3, dan Fast-Track</div>
                    </div>

                    <!-- 10+ RESEARCH GROUP -->
                    <div class="stat-card-navy">
                        <div class="stat-num-navy">10+</div>
                        <div class="stat-label-navy">KELOMPOK RISET</div>
                        <div class="stat-sub-text">Laboratorium riset mutakhir & klaster komputasi AI</div>
                    </div>

                    <!-- 50+ LECTURER -->
                    <div class="stat-card-navy">
                        <div class="stat-num-navy">50+</div>
                        <div class="stat-label-navy">DOSEN & PENELITI</div>
                        <div class="stat-sub-text">Guru besar, doktor, dan praktisi industri bersertifikasi</div>
                    </div>
                </div>

                <!-- Box Akreditasi Internasional -->
                <div class="card" style="padding: 22px; border-left: 4px solid var(--navy-primary);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <span style="font-size: 13px; font-weight: 700; color: var(--navy-dark); text-transform: uppercase; letter-spacing: 0.05em;">Akreditasi Standar Global</span>
                        <span class="badge badge-navy">ASIIN & Unggul</span>
                    </div>
                    <p style="font-size: 13.5px; color: var(--text-body); line-height: 1.6; margin: 0;">
                        Tersertifikasi akreditasi internasional <strong>ASIIN Jerman</strong> dengan standar EUR-ACE Bachelor Label serta meraih predikat <strong>Akreditasi Unggul</strong> nasional dari BAN-PT / LAM INFOKOM.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- 3. MISI & EKOSISTEM RISET                                                 -->
    <!-- ========================================================================= -->
    <div>
        <div style="text-align: center; margin-bottom: 32px;">
            <div style="color: var(--navy-primary); font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 6px;">
                MISI & EKOSISTEM RISET
            </div>
            <h2 style="font-size: 30px; color: var(--navy-dark); font-weight: 800; letter-spacing: -0.02em;">
                Keunggulan Akademik & Laboratorium
            </h2>
        </div>

        <!-- 3 Pilar Misi -->
        <div class="grid-3" style="margin-bottom: 28px;">
            <div class="card" style="border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary); padding: 24px;">
                <div style="width: 38px; height: 38px; border-radius: 8px; background: #0F172A; color: #38BDF8; display: flex; align-items: center; justify-content: center; font-size: 15px; font-weight: 800; font-family: 'JetBrains Mono', monospace; margin-bottom: 14px; box-shadow: 0 2px 8px rgba(15, 23, 42, 0.15);">01.</div>
                <h3 style="color: var(--navy-dark); font-size: 16.5px; margin-bottom: 8px; font-weight: 700;">Pendidikan Berkualitas Dunia</h3>
                <p style="color: var(--text-body); font-size: 13.5px; line-height: 1.65; margin: 0;">
                    Menyelenggarakan kurikulum adaptif berbasis Outcome-Based Education (OBE) untuk mencetak technopreneur dan software engineer berdaya saing global.
                </p>
            </div>

            <div class="card" style="border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary); padding: 24px;">
                <div style="width: 38px; height: 38px; border-radius: 8px; background: #0F172A; color: #38BDF8; display: flex; align-items: center; justify-content: center; font-size: 15px; font-weight: 800; font-family: 'JetBrains Mono', monospace; margin-bottom: 14px; box-shadow: 0 2px 8px rgba(15, 23, 42, 0.15);">02.</div>
                <h3 style="color: var(--navy-dark); font-size: 16.5px; margin-bottom: 8px; font-weight: 700;">Riset & Publikasi Bereputasi</h3>
                <p style="color: var(--text-body); font-size: 13.5px; line-height: 1.65; margin: 0;">
                    Menghasilkan riset inovatif dan publikasi ilmiah berimpak tinggi pada jurnal serta konferensi internasional terindeks Scopus & IEEE.
                </p>
            </div>

            <div class="card" style="border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary); padding: 24px;">
                <div style="width: 38px; height: 38px; border-radius: 8px; background: #0F172A; color: #38BDF8; display: flex; align-items: center; justify-content: center; font-size: 15px; font-weight: 800; font-family: 'JetBrains Mono', monospace; margin-bottom: 14px; box-shadow: 0 2px 8px rgba(15, 23, 42, 0.15);">03.</div>
                <h3 style="color: var(--navy-dark); font-size: 16.5px; margin-bottom: 8px; font-weight: 700;">Hilirisasi & Pengabdian</h3>
                <p style="color: var(--text-body); font-size: 13.5px; line-height: 1.65; margin: 0;">
                    Menerapkan solusi kecerdasan artifisial dan rekayasa perangkat lunak tepat guna untuk mendukung transformasi digital dan kemandirian bangsa.
                </p>
            </div>
        </div>

        <!-- Laboratorium Bidang Minat / Riset -->
        <div class="card" style="padding: 28px; border: 1.5px solid #CBD5E1;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 22px; flex-wrap: wrap; gap: 12px;">
                <div>
                    <h3 style="color: var(--navy-dark); font-size: 18px; margin-bottom: 4px; font-weight: 700;">Laboratorium Bidang Minat / Riset</h3>
                    <p style="color: var(--text-muted); font-size: 13.5px; margin: 0;">Fasilitas penelitian, keahlian akademik, dan pengembangan teknologi mahasiswa Departemen Teknik Informatika ITS</p>
                </div>
                <span class="badge" style="background-color: var(--navy-primary); color: #FFFFFF; font-weight: 700;">FTEIC ITS Surabaya</span>
            </div>

            <div class="lab-grid">
                <!-- 1. RPL -->
                <div class="lab-card-item">
                    <div class="lab-card-header">
                        <span class="lab-badge">RPL</span>
                        <h4 class="lab-title">Laboratorium Rekayasa Perangkat Lunak (RPL)</h4>
                    </div>
                    <p class="lab-desc">Fokus pada rekayasa, desain, pengembangan, dan dokumentasi perangkat lunak.</p>
                </div>

                <!-- 2. KBJ -->
                <div class="lab-card-item">
                    <div class="lab-card-header">
                        <span class="lab-badge">KBJ</span>
                        <h4 class="lab-title">Laboratorium Komputasi Berbasis Jaringan (KBJ)</h4>
                    </div>
                    <p class="lab-desc">Fokus pada sistem jaringan komputer, infrastruktur, dan komputasi berbasis jaringan.</p>
                </div>

                <!-- 3. KCV -->
                <div class="lab-card-item">
                    <div class="lab-card-header">
                        <span class="lab-badge">KCV</span>
                        <h4 class="lab-title">Laboratorium Komputasi Cerdas dan Visi (KCV)</h4>
                    </div>
                    <p class="lab-desc">Fokus pada bidang kecerdasan buatan (Artificial Intelligence), pengolahan citra, dan visi komputer.</p>
                </div>

                <!-- 4. Smart Network and Cyber Security (Netics) -->
                <div class="lab-card-item">
                    <div class="lab-card-header">
                        <span class="lab-badge">Netics</span>
                        <h4 class="lab-title">Laboratorium Teknologi Jaringan dan Keamanan Siber Cerdas (Netics)</h4>
                    </div>
                    <p class="lab-desc">Fokus pada keamanan siber, arsitektur jaringan komputer, serta teknologi jaringan cerdas.</p>
                </div>

                <!-- 5. GIGa -->
                <div class="lab-card-item">
                    <div class="lab-card-header">
                        <span class="lab-badge">GIGa</span>
                        <h4 class="lab-title">Laboratorium Grafika, Interaksi, Gim dan Analitik (GIGa)</h4>
                    </div>
                    <p class="lab-desc">Fokus pada grafika komputer, interaksi manusia-komputer, teknik pengembangan gim, animasi, pemodelan 3D, serta Virtual/Augmented Reality.</p>
                </div>

                <!-- 6. Alpro -->
                <div class="lab-card-item">
                    <div class="lab-card-header">
                        <span class="lab-badge">Alpro</span>
                        <h4 class="lab-title">Laboratorium Algoritma dan Pemrograman (Alpro)</h4>
                    </div>
                    <p class="lab-desc">Fokus pada fondasi logika, struktur data, dan teknik pemrograman dasar.</p>
                </div>

                <!-- 7. MCI -->
                <div class="lab-card-item">
                    <div class="lab-card-header">
                        <span class="lab-badge">MCI</span>
                        <h4 class="lab-title">Laboratorium Manajemen Cerdas Informasi (MCI)</h4>
                    </div>
                    <p class="lab-desc">Fokus pada pengelolaan data cerdas, basis data tingkat lanjut, temu kembali informasi (Information Retrieval), dan sistem berbasis pengetahuan.</p>
                </div>

                <!-- 8. PKT -->
                <div class="lab-card-item">
                    <div class="lab-card-header">
                        <span class="lab-badge">PKT</span>
                        <h4 class="lab-title">Laboratorium Pemodelan dan Komputasi Terapan (PKT)</h4>
                    </div>
                    <p class="lab-desc">Fokus pada pemodelan sistem, simulasi, dan komputasi terapan untuk menyelesaikan berbagai persoalan kompleks.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- 4. TIM KAMI & DATA MAHASISWA (NRP 10 Digit & Syarat Rute 2)                -->
    <!-- ========================================================================= -->
    <div id="data-mahasiswa" style="padding-top: 8px;">
        <div style="text-align: center; margin-bottom: 32px;">
            <div style="color: var(--navy-primary); font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 6px;">
                TIM KAMI & DATA MAHASISWA
            </div>
            <h2 style="font-size: 30px; color: var(--navy-dark); font-weight: 800; letter-spacing: -0.02em;">
                Profil Mahasiswa Aktif
            </h2>
            <p style="color: var(--text-muted); font-size: 14.5px; max-width: 650px; margin: 6px auto 0 auto;">
                Data resmi mahasiswa yang tercatat dalam pangkalan data SIM Akademik FTEIC Institut Teknologi Sepuluh Nopember.
            </p>
        </div>

        <!-- Header Profil Card Mahasiswa -->
        <div class="card" style="margin-bottom: 24px; border-left: 4px solid var(--navy-primary);">
            <div style="display: flex; align-items: center; gap: 24px; flex-wrap: wrap;">
                <div style="width: 76px; height: 76px; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--navy-primary) 0%, #3B82F6 100%); display: flex; align-items: center; justify-content: center; font-size: 30px; font-weight: 800; color: #FFFFFF; box-shadow: 0 4px 14px rgba(30, 58, 138, 0.25);">
                    {{ substr($mahasiswa['nama'], 0, 1) }}
                </div>
                <div style="flex: 1; min-width: 260px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 6px; flex-wrap: wrap;">
                        <h3 style="font-size: 24px; color: var(--navy-dark); margin: 0; font-weight: 700;">{{ $mahasiswa['nama'] }}</h3>
                        <span class="badge badge-navy">{{ $mahasiswa['status_akademik'] }}</span>
                        <span class="badge badge-subtle">Angkatan {{ $mahasiswa['angkatan'] }}</span>
                    </div>
                    <div style="font-size: 14px; color: var(--navy-primary); font-family: 'JetBrains Mono', monospace; font-weight: 600; margin-bottom: 4px;">
                        NRP: {{ $mahasiswa['nrp'] }} &bull; Program Studi: {{ $mahasiswa['prodi'] ?? 'Teknik Informatika' }}
                    </div>
                    <p style="color: var(--text-muted); font-size: 13.5px; margin: 0;">
                        {{ $mahasiswa['departemen'] }} &bull; (FTEIC) &bull; {{ $mahasiswa['kampus'] }}
                    </p>
                </div>
                <div>
                    <a href="{{ route('ipk.hitung', ['ip1' => '3.88', 'ip2' => '3.92']) }}" class="btn btn-primary">
                        <span>Kalkulator IPK</span>
                        &rarr;
                    </a>
                </div>
            </div>
        </div>

        <!-- Detail Statistik Akademis Mahasiswa -->
        <div class="grid-3" style="margin-bottom: 24px;">
            <div class="card" style="text-align: center; padding: 24px; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary);">
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 0.08em; margin-bottom: 6px;">
                    Semester Berjalan
                </div>
                <div style="font-size: 38px; font-weight: 800; color: var(--navy-dark); font-family: 'Outfit', sans-serif;">
                    {{ $mahasiswa['semester'] }}
                </div>
                <div style="font-size: 12.5px; color: var(--text-muted); margin-top: 4px;">Tahun Akademik 2026/2027 Ganjil</div>
            </div>

            <div class="card" style="text-align: center; padding: 24px; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary);">
                <div style="font-size: 12px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 0.08em; margin-bottom: 6px;">
                    Total SKS Ditempuh
                </div>
                <div style="font-size: 38px; font-weight: 800; color: var(--navy-primary); font-family: 'Outfit', sans-serif;">
                    {{ $mahasiswa['sks_ditempuh'] }} SKS
                </div>
                <div style="font-size: 12.5px; color: var(--text-muted); margin-top: 4px;">SKS Lulus & Terverifikasi</div>
            </div>

            <div class="card" style="text-align: center; padding: 24px; background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); color: #FFFFFF; border: none; box-shadow: 0 4px 14px rgba(15, 23, 42, 0.15);">
                <div style="font-size: 12px; color: #93C5FD; text-transform: uppercase; font-weight: 700; letter-spacing: 0.08em; margin-bottom: 6px;">
                    IPK Kumulatif Terakhir
                </div>
                <div style="font-size: 38px; font-weight: 800; color: #38BDF8; font-family: 'Outfit', sans-serif;">
                    {{ number_format($mahasiswa['ipk_kumulatif'], 2) }}
                </div>
                <div style="font-size: 12.5px; color: #F8FAFC; font-weight: 600; margin-top: 4px;">Predikat: Cum Laude</div>
            </div>
        </div>

        <!-- Mata Kuliah Semester 5 & Minat Studi -->
        <div class="grid-2" style="margin-bottom: 24px;">
            <!-- Tabel Data Mata Kuliah -->
            <div class="card" style="border: 1.5px solid #CBD5E1;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid var(--border-card);">
                    <h3 style="font-size: 17px; color: var(--navy-dark); margin: 0; font-weight: 700;">Mata Kuliah Semester Ini</h3>
                    <span class="badge" style="background-color: var(--navy-primary); color: #FFFFFF; font-weight: 700;">{{ count($mahasiswa['mata_kuliah_semester_ini']) }} Kelas</span>
                </div>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    @foreach($mahasiswa['mata_kuliah_semester_ini'] as $mk)
                        <div style="padding: 13px 16px; background-color: #FFFFFF; border: 1px solid #CBD5E1; border-left: 3.5px solid var(--navy-primary); border-radius: var(--radius-md); display: flex; justify-content: space-between; align-items: center; box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);">
                            <div>
                                <div style="font-size: 14px; font-weight: 700; color: var(--navy-dark);">{{ $mk['nama'] }}</div>
                                <div style="font-size: 12px; color: var(--navy-primary); font-family: 'JetBrains Mono', monospace; font-weight: 600; margin-top: 2px;">{{ $mk['kode'] }} &bull; Kelas {{ $mk['kelas'] }}</div>
                            </div>
                            <div>
                                <span class="badge" style="background-color: var(--navy-subtle); color: var(--navy-primary); border: 1px solid var(--navy-border); font-size: 12px; font-weight: 700;">{{ $mk['sks'] }} SKS</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Fokus Riset & Portofolio Proyek -->
            <div class="card" style="border: 1.5px solid #CBD5E1;">
                <div style="margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid var(--border-card);">
                    <h3 style="font-size: 17px; color: var(--navy-dark); margin: 0; font-weight: 700;">Fokus Riset & Portofolio</h3>
                </div>
                <div style="margin-bottom: 18px;">
                    <div style="padding: 16px 20px; background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); color: #FFFFFF; border-radius: var(--radius-md); box-shadow: 0 4px 14px rgba(15, 23, 42, 0.12);">
                        <div style="font-size: 11.5px; color: #93C5FD; font-weight: 700; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.08em;">MINAT RISET & STUDI:</div>
                        <div style="font-size: 13.5px; color: #FFFFFF; font-weight: 600; line-height: 1.6;">
                            {{ $mahasiswa['minat_studi'] }}
                        </div>
                    </div>
                </div>

                <div style="font-size: 12px; color: var(--navy-primary); font-weight: 700; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.05em;">Catatan & Kontribusi Unggulan:</div>
                <ul style="padding-left: 20px; font-size: 13.5px; color: var(--text-body); display: flex; flex-direction: column; gap: 8px; margin: 0;">
                    @foreach($mahasiswa['prestasi'] as $p)
                        <li>{{ $p }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Daftar Keahlian & Skill Teknis Mahasiswa -->
        <div class="card" style="margin-bottom: 24px; border: 1.5px solid #CBD5E1;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--border-card); flex-wrap: wrap; gap: 12px;">
                <div>
                    <h3 style="font-size: 18px; color: var(--navy-dark); margin: 0 0 4px 0; font-weight: 700;">Daftar Skill & Kompetensi Keahlian</h3>
                    <p style="color: var(--text-muted); font-size: 13.5px; margin: 0;">Penguasaan teknologi rekayasa perangkat lunak, agentic AI, dan komputasi awan</p>
                </div>
                <span class="badge" style="background-color: var(--navy-primary); color: #FFFFFF; font-weight: 700;">Technical Skills Matrix</span>
            </div>

            <div class="grid-2" style="gap: 20px;">
                @if(isset($mahasiswa['daftar_skill']))
                    @foreach($mahasiswa['daftar_skill'] as $kat)
                        <div style="padding: 22px; background-color: #FFFFFF; border: 1.5px solid #CBD5E1; border-top: 4px solid var(--navy-primary); border-radius: var(--radius-md); box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);">
                            <div style="color: var(--navy-dark); font-size: 12.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 14px; display: flex; align-items: center; gap: 8px;">
                                <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--navy-primary); display: inline-block;"></span>
                                <span>{{ $kat['kategori'] }}</span>
                            </div>
                            <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                                @foreach($kat['skills'] as $skill)
                                    <span class="skill-chip" style="background-color: var(--navy-subtle); color: var(--navy-primary); border: 1px solid var(--navy-border); font-weight: 600;">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Form Pencarian Mahasiswa Lain Berdasarkan NRP 10 Digit -->
        <div class="card" style="border: 1.5px solid #CBD5E1; border-left: 5px solid var(--navy-primary); background: #FFFFFF;">
            <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 16px;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 100%); display: flex; align-items: center; justify-content: center; color: #FFFFFF; box-shadow: 0 4px 12px rgba(30, 58, 138, 0.25); flex-shrink: 0;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <div>
                    <span class="badge" style="background-color: var(--navy-primary); color: #FFFFFF; font-weight: 700; margin-bottom: 4px; display: inline-block; font-size: 11px;">DIREKTORI MAHASISWA ITS</span>
                    <h3 style="font-size: 19px; color: var(--navy-dark); margin: 0; font-weight: 700;">Pencarian Profil Mahasiswa Berdasarkan NRP</h3>
                </div>
            </div>

            <p style="font-size: 14px; color: var(--text-body); margin: 0 0 18px 0; line-height: 1.6;">
                Masukkan 10 digit NRP resmi mahasiswa ITS untuk memuat data akademik yang terdaftar di SIM Akademik FTEIC ITS.
            </p>

            <form id="form_cari_nrp" onsubmit="event.preventDefault(); const nrp = document.getElementById('test_nrp').value.trim(); if(nrp) window.location.href = '{{ route('mahasiswa.show', ['nrp' => 'REPLACE_NRP']) }}'.replace('REPLACE_NRP', encodeURIComponent(nrp)) + (nrp.length === 10 ? '#data-mahasiswa' : '');" style="display: flex; gap: 12px; flex-wrap: wrap;">
                <input type="text" id="test_nrp" value="{{ $mahasiswa['nrp'] }}" placeholder="Masukkan 10 digit NRP (misal: 5025241001)" style="flex: 1; min-width: 280px; background: #F8FAFC; border: 1.5px solid #CBD5E1; padding: 12px 16px; font-family: 'JetBrains Mono', monospace; font-size: 14px; border-radius: var(--radius-sm);" required>
                <button type="submit" class="btn btn-primary" style="padding: 12px 24px;">
                    Cari Data Mahasiswa
                </button>
            </form>

            <div style="margin-top: 18px;">
                <div style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center; font-size: 13px;">
                    <span style="color: var(--text-muted); font-weight: 600;">Pintasan Cepat:</span>
                    
                    @php
                        $currentNrp = $mahasiswa['nrp'] ?? '';
                        $isAji = ($currentNrp === '5025241065');
                        $isLain = ($currentNrp === '5025241001');
                    @endphp

                    <!-- Pintasan 1: Aji Zaenul Musthofa (5025241065) -->
                    <a href="{{ route('mahasiswa.show', ['nrp' => '5025241065']) }}#data-mahasiswa" 
                       onclick="document.getElementById('test_nrp').value = '5025241065';"
                       class="badge" 
                       style="background-color: {{ $isAji ? '#1E3A8A' : '#EEF2FF' }}; color: {{ $isAji ? '#FFFFFF' : '#1E3A8A' }}; border: 1px solid {{ $isAji ? '#1E3A8A' : '#C7D2FE' }}; font-weight: 700; text-decoration: none; padding: 6px 14px; transition: all 0.15s ease;" 
                       onmouseover="this.style.backgroundColor='{{ $isAji ? '#0F172A' : '#1E3A8A' }}'; this.style.color='#FFFFFF';" 
                       onmouseout="this.style.backgroundColor='{{ $isAji ? '#1E3A8A' : '#EEF2FF' }}'; this.style.color='{{ $isAji ? '#FFFFFF' : '#1E3A8A' }}';">
                        5025241065 (Aji Zaenul Musthofa)
                    </a>

                    <!-- Pintasan 2: Mahasiswa Lain (5025241001) -->
                    <a href="{{ route('mahasiswa.show', ['nrp' => '5025241001']) }}#data-mahasiswa" 
                       onclick="document.getElementById('test_nrp').value = '5025241001';"
                       class="badge" 
                       style="background-color: {{ $isLain ? '#1E3A8A' : '#EEF2FF' }}; color: {{ $isLain ? '#FFFFFF' : '#1E3A8A' }}; border: 1px solid {{ $isLain ? '#1E3A8A' : '#C7D2FE' }}; font-weight: 700; text-decoration: none; padding: 6px 14px; transition: all 0.15s ease;" 
                       onmouseover="this.style.backgroundColor='{{ $isLain ? '#0F172A' : '#1E3A8A' }}'; this.style.color='#FFFFFF';" 
                       onmouseout="this.style.backgroundColor='{{ $isLain ? '#1E3A8A' : '#EEF2FF' }}'; this.style.color='{{ $isLain ? '#FFFFFF' : '#1E3A8A' }}';">
                        5025241001 (Mahasiswa Lain)
                    </a>

                    <!-- Pintasan 3: Demo Uji Tolak Regex (12345) -->
                    <a href="{{ route('mahasiswa.show', ['nrp' => '12345']) }}" 
                       onclick="document.getElementById('test_nrp').value = '12345';"
                       class="badge" 
                       style="background-color: #EEF2FF; color: #1E3A8A; border: 1px solid #C7D2FE; font-weight: 700; text-decoration: none; padding: 6px 14px; transition: all 0.15s ease;" 
                       onmouseover="this.style.backgroundColor='#1E3A8A'; this.style.color='#FFFFFF';" 
                       onmouseout="this.style.backgroundColor='#EEF2FF'; this.style.color='#1E3A8A';" 
                       title="Klik untuk menguji proteksi regex: ditolak dan dialihkan ke 404">
                        12345 (Format Tidak Sesuai)
                    </a>
                </div>
                <div style="font-size: 12px; color: var(--text-muted); margin-top: 8px;">
                    * <em>Tips Pengujian</em>: Klik tombol <strong>5025241001</strong> untuk memuat data mahasiswa lain, atau klik <strong>12345</strong> untuk mendemokan proteksi <strong>Tantangan 1 (Regex 10 Digit)</strong> yang otomatis dialihkan ke Fallback 404.
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
