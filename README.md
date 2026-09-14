# 🎓 PBKK Tugas Mandiri 2 — Laravel Local Sandbox & Routing

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.4+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tests](https://img.shields.io/badge/Tests-10%20Passed%20%7C%2045%20Assertions-success?style=for-the-badge&logo=checkmarx&logoColor=white)](https://phpunit.de)
[![ITS Surabaya](https://img.shields.io/badge/ITS-Surabaya-003366?style=for-the-badge)](https://www.its.ac.id)

Aplikasi web profil akademis statis dan platform riset **Magentic (Agentic AI Development Environment)** yang dibangun menggunakan framework **Laravel 12**. Proyek ini disusun untuk memenuhi penugasan mandiri **Mata Kuliah Pemrograman Berbasis Kerangka Kerja (PBKK) — Pertemuan 2 (Instalasi & Routing)**, Departemen Teknik Informatika, Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC), Institut Teknologi Sepuluh Nopember Surabaya.

---

## 👤 Identitas Mahasiswa

- **Nama Lengkap** : Aji Zaenul Musthofa
- **NRP** : 5025241065
- **Departemen** : Teknik Informatika (Informatics Engineering)
- **Fakultas** : Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC)
- **Institusi** : Institut Teknologi Sepuluh Nopember (ITS) Surabaya
- **Mata Kuliah** : Pemrograman Berbasis Kerangka Kerja (PBKK) — Kelas A
- **Dosen Pengampu** : Dosen Departemen Teknik Informatika ITS

---

## 🚀 Fitur & Pemenuhan Spesifikasi Tugas

Proyek ini telah memenuhi seluruh **Spesifikasi Teknis Wajib (Langkah 2/5)** dan **Seluruh Tantangan Nilai A+ (Langkah 3/5)**:

### 1. Rute Wajib (Core Routes)
- **Rute 1: Halaman Home (`/`)**
  - **Named Route**: `home`
  - Menyajikan sambutan hangat khas ITS (*"VIVAT ITS!!!"*), identitas resmi mahasiswa, status portal terintegrasi SIM ITS, terminal interaktif, dan navigasi cepat (*Quick Action Cards*).
- **Rute 2: Detail Profil Mahasiswa (`/mahasiswa/{nrp}`)**
  - **Named Route**: `mahasiswa.show`
  - Parameter wajib `{nrp}`. Mengembalikan data profil akademik mahasiswa (SKS, IPK, matkul, skills), profil Departemen Teknik Informatika ITS, 8 lab riset (termasuk standarisasi nama Netics), form pencarian dinamis, serta tombol pintasan cepat interaktif dengan penanda status aktif.
- **Rute 3: Platform Riset Agentic AI (`/agent/{tema?}`)**
  - **Named Route**: `agent.show`
  - Parameter opsional `{tema?}`. Jika parameter kosong, controller secara otomatis menerapkan fallback default: `'General Assistant Agent'`. Jika tema diisi (`code-analysis`, `autonomous-bug-fixing`, `collaborative-workflow`), aplikasi menyajikan detail modul, fitur, pipeline alur kerja, dan siklus otonom 4 tahap (*Analyze-Plan-Execute-Verify*).
- **Penerapan Named Routes 100%**:
  - Seluruh rute dideklarasikan menggunakan metode `->name()`. Tidak ada tautan *hardcoded* di dalam seluruh blade template maupun respon controller.

### 2. Tantangan Tambahan / Challenge (Nilai A+)
- **Tantangan 1: Pengamanan Parameter Regex (10 Digit Angka ITS)**
  - Mengamankan parameter `{nrp}` pada rute `/mahasiswa/{nrp}` menggunakan constraint `->where('nrp', '^[0-9]{10}$')`.
  - Format yang tidak valid (misal: kurang dari 10 digit, lebih dari 10 digit, atau mengandung karakter selain angka bulat) secara otomatis ditolak dan dialihkan ke Fallback 404.
- **Tantangan 2: Kalkulator Portofolio Akademis (`/hitung-ipk/{ip1}/{ip2}`)**
  - **Named Route**: `ipk.hitung`
  - Menerima dua nilai IP semester melalui URL, memvalidasi bilangan pecahan/desimal via regex, menjumlahkan total IP, dan menghitung nilai rata-rata IPK kumulatif 2 semester secara presisi.
  - Menentukan predikat kelulusan resmi ITS (*Dengan Pujian / Cum Laude*, *Sangat Memuaskan*, *Memuaskan*, *Cukup*) disertai form interaktif simulasi langsung.
- **Tantangan 3: Grouping Prefix Rute Akademis (`/dashboard`)**
  - Mengelompokkan rute layanan internal di bawah prefix modular menggunakan `Route::prefix('dashboard')->name('dashboard.')->group(...)`.
  - Terdiri dari:
    - `/dashboard` (`dashboard.index`)
    - `/dashboard/mahasiswa/{nrp}` (`dashboard.mahasiswa`)
    - `/dashboard/hitung-ipk/{ip1}/{ip2}` (`dashboard.ipk`)
- **Tantangan 3 (Bagian 2): Fallback Route 404 Kustom yang Rapi**
  - **Named Route**: `fallback`
  - Diimplementasikan via `Route::fallback()`. Menampilkan antarmuka khusus bernuansa merah error standar, logo ITS resmi, pill status peringatan, detail target URL, serta tombol cepat untuk kembali ke Beranda ITS.

---

## 🗺️ Matriks Pemetaan Rute (Routing Table)

| No | Metode HTTP | URI / Pattern | Named Route | Controller & Method | Deskripsi & Validasi |
|:--:|:-----------:|:--------------|:------------|:--------------------|:---------------------|
| 1 | `GET` | `/` | `home` | `HomeController@index` | Beranda portal, sambutan ITS & overview profil |
| 2 | `GET` | `/mahasiswa/{nrp}` | `mahasiswa.show` | `AcademicController@mahasiswa` | Detail profil mahasiswa (`where: ^[0-9]{10}$`) |
| 3 | `GET` | `/agent/{tema?}` | `agent.show` | `AgentController@show` | Platform Agentic AI (Default: *General Assistant*) |
| 4 | `GET` | `/hitung-ipk/{ip1}/{ip2}` | `ipk.hitung` | `AcademicController@hitungIpk` | Kalkulator IPK 2 semester (Regex float) |
| 5 | `GET` | `/dashboard` | `dashboard.index` | `AcademicController@dashboard` | Dashboard utama grouping prefix `/dashboard` |
| 6 | `GET` | `/dashboard/mahasiswa/{nrp}` | `dashboard.mahasiswa` | `AcademicController@mahasiswa` | Rute profil di dalam group dashboard |
| 7 | `GET` | `/dashboard/hitung-ipk/{ip1}/{ip2}` | `dashboard.ipk` | `AcademicController@hitungIpk` | Rute kalkulator di dalam group dashboard |
| 8 | `ANY` | `{fallbackPlaceholder}` | `fallback` | `Closure (Route::fallback)` | Penanganan 404 kustom untuk URL tidak valid |

---

## 📋 Prasyarat Sistem (System Requirements)

Sebelum menjalankan aplikasi, pastikan komputer Anda telah terpasang perangkat lunak berikut:

1. **PHP**: Versi `>= 8.2` (Direkomendasikan PHP 8.4)
   - Pastikan ekstensi PHP aktif: `openssl`, `pdo`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `curl`.
2. **Composer**: Versi `>= 2.2`
3. **Git**: Untuk proses cloning repositori.
4. **Web Browser Modern**: Chrome, Edge, Firefox, atau Safari.

Cek kesiapan lingkungan melalui terminal:
```bash
php -v
composer -V
git --version
```

---

## 🛠️ Panduan Instalasi & Menjalankan Proyek (Step-by-Step)

Ikuti langkah-langkah di bawah ini untuk mengkloning dan menjalankan proyek dari awal:

### Langkah 1: Kloning Repositori
Buka terminal / Git Bash / PowerShell, lalu arahkan ke direktori kerja Anda dan jalankan:
```bash
git clone https://github.com/ajizaenulm/PBKK-Tugas-2.git
cd PBKK-Tugas-2
```

### Langkah 2: Pasang Dependensi Composer
Unduh seluruh package dependensi yang dibutuhkan oleh framework Laravel:
```bash
composer install
```

### Langkah 3: Konfigurasi File Environment (`.env`)
Salin file template `.env.example` menjadi file `.env`:

- **Di Linux / macOS / Git Bash:**
  ```bash
  cp .env.example .env
  ```
- **Di Windows Command Prompt (CMD):**
  ```cmd
  copy .env.example .env
  ```
- **Di Windows PowerShell:**
  ```powershell
  Copy-Item .env.example .env
  ```

### Langkah 4: Generate Application Encryption Key
Generate application key unik untuk Laravel:
```bash
php artisan key:generate
```

### Langkah 5: Bersihkan Cache Aplikasi (Rekomendasi)
Untuk memastikan seluruh rute dan view Blade terkompilasi segar:
```bash
php artisan optimize:clear
```

### Langkah 6: Jalankan Server Lokal (Development Server)
Jalankan server bawaan Laravel Artisan:
```bash
php artisan serve
```

Aplikasi sekarang aktif dan dapat diakses melalui web browser pada:
👉 **`http://127.0.0.1:8000`** atau **`http://localhost:8000`**

---

## 🧪 Menjalankan Automated Testing (PHPUnit)

Proyek ini telah dilengkapi dengan unit test otomatis berbasis Feature Testing Laravel untuk menguji seluruh rute, parameter, regex, dan kondisi fallback.

Jalankan perintah pengujian berikut di terminal proyek:
```bash
php artisan test
```

### Output Pengujian yang Diharapkan:
```text
   PASS  Tests\Feature\RoutingTest
  ✓ home route returns ok and contains its welcome and magentic
  ✓ mahasiswa route accepts valid 10 digit nrp
  ✓ mahasiswa route rejects invalid nrp format
  ✓ agent route without param uses default general assistant
  ✓ agent route with custom theme
  ✓ kalkulator ipk computes sum and average accurately
  ✓ dashboard grouped routes are accessible
  ✓ fallback route catches invalid url with 404 status

  Tests:    10 passed (45 assertions)
  Duration: 0.38s
```

---

## 🔗 Daftar URL Pengujian Mandiri (Live Test URLs)

Setelah server lokal berjalan (`php artisan serve`), Anda dapat langsung mencoba seluruh skenario tugas melalui URL berikut:

| Skenario Pengujian | URL Pengujian | Ekspektasi Respon |
|:-------------------|:--------------|:------------------|
| **1. Beranda Utama** | `http://127.0.0.1:8000/` | Status 200, Sambutan VIVAT ITS, data Aji Zaenul Musthofa |
| **2. Profil NRP Valid** | `http://127.0.0.1:8000/mahasiswa/5025241065` | Status 200, Profil mahasiswa lengkap, tombol pintasan menyala biru solid |
| **3. Profil NRP Lain (10 Digit)** | `http://127.0.0.1:8000/mahasiswa/5025241001` | Status 200, Data mahasiswa dinamis |
| **4. Proteksi Regex (Ditolak)** | `http://127.0.0.1:8000/mahasiswa/12345` | **Status 404**, Dialihkan ke Fallback Error Merah |
| **5. Proteksi Regex Huruf (Ditolak)** | `http://127.0.0.1:8000/mahasiswa/50252abcde` | **Status 404**, Dialihkan ke Fallback Error Merah |
| **6. Agent Default** | `http://127.0.0.1:8000/agent` | Status 200, Default: *General Assistant Agent* |
| **7. Agent Parameter Khusus** | `http://127.0.0.1:8000/agent/code-analysis` | Status 200, Modul *Code Analysis & Security Audit* |
| **8. Agent Autonomous** | `http://127.0.0.1:8000/agent/autonomous-bug-fixing` | Status 200, Modul *Autonomous Bug Fixing* |
| **9. Kalkulator IPK** | `http://127.0.0.1:8000/hitung-ipk/3.88/3.92` | Status 200, Total IP 7.80, Rata-rata 3.90, Cum Laude |
| **10. Grouping Dashboard** | `http://127.0.0.1:8000/dashboard` | Status 200, Panel ringkasan prefix `/dashboard` |
| **11. Grouping Mahasiswa** | `http://127.0.0.1:8000/dashboard/mahasiswa/5025241065` | Status 200, Profil di bawah prefix dashboard |
| **12. Grouping Kalkulator** | `http://127.0.0.1:8000/dashboard/hitung-ipk/3.80/3.90` | Status 200, Kalkulator di bawah prefix dashboard |
| **13. Fallback 404 Kustom** | `http://127.0.0.1:8000/halaman-ngawur-tidak-ada` | **Status 404**, Halaman Fallback 404 Kustom ITS |

---

## 📁 Struktur Berkas Kunci (Key Project Structure)

```text
PBKK-Tugas-2/
├── app/
│   └── Http/
│       └── Controllers/
│           ├── AcademicController.php   # Logika profil mahasiswa, IPK, & dashboard
│           ├── AgentController.php      # Logika platform AI Agent (opsional parameter)
│           ├── Controller.php           # Base controller
│           └── HomeController.php       # Logika beranda utama & sambutan ITS
├── config/                              # Berkas konfigurasi aplikasi Laravel
├── public/
│   └── images/                          # Aset visual (Logo ITS Navbar & Logo 3D)
├── resources/
│   └── views/
│       ├── errors/
│           └── fallback.blade.php       # Template halaman 404 kustom bernuansa error merah
│       ├── layouts/
│           └── app.blade.php            # Master layout ITS (Navbar, font Outfit, footer)
│       ├── agent.blade.php              # Tampilan eksplorasi platform Agentic AI
│       ├── dashboard.blade.php          # Tampilan grouping dashboard prefix
│       ├── home.blade.php               # Tampilan landing page profil & sambutan ITS
│       ├── ipk.blade.php                # Tampilan kalkulator IPK 2 semester
│       └── mahasiswa.blade.php          # Tampilan detail mahasiswa & profil Departemen
├── routes/
│   └── web.php                          # Definisi rute web, named routes, regex, grouping, fallback
├── tests/
│   └── Feature/
│       └── RoutingTest.php              # Automated test suite (10 test cases, 45 assertions)
├── .env.example                         # Template environment variables
├── .gitignore                           # Konfigurasi pengabaian berkas sensitif (.env & vendor/)
├── composer.json                        # Definisi dependensi PHP
└── README.md                            # Dokumentasi lengkap proyek
```

---

## 🔒 Keamanan & Kebijakan Repositori

Sesuai dengan **Ketentuan Pengumpulan Tugas (Langkah 5/5)**:
- File `.env` yang memuat kredensial lokal dan direktori `vendor/` yang berisi pustaka pihak ketiga **tidak disertakan** ke dalam git (*git-ignored*).
- Setiap pengembang yang mengkloning repositori dapat membuat konfigurasi lokal sendiri secara aman melalui `.env.example`.

---

## ⚖️ Lisensi & Hak Cipta

Proyek ini dikembangkan oleh **Aji Zaenul Musthofa (5025241065)** untuk kepentingan akademis tugas mata kuliah **Pemrograman Berbasis Kerangka Kerja (PBKK)** di **Departemen Teknik Informatika ITS Surabaya**. Framework Laravel dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).
