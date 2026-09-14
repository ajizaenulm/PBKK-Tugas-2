<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="220" alt="Laravel Logo">
  </a>
</p>

<h1 align="center">Tugas Mandiri PBKK — Pertemuan 2: Routing Laravel</h1>

<p align="center">
  Aplikasi profil akademis dan implementasi routing sandbox menggunakan <strong>Laravel 12</strong> & <strong>PHP 8.4</strong>.<br>
  Departemen Teknik Informatika, Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC) ITS.
</p>

---

## Data Mahasiswa

- **Nama** : Aji Zaenul Musthofa
- **NRP** : 5025241065
- **Mata Kuliah** : Pemrograman Berbasis Kerangka Kerja (PBKK)
- **Departemen** : Teknik Informatika - FTEIC ITS

---

## Fitur & Implementasi Rute

Sesuai dengan spesifikasi tugas dan tantangan tambahan (nilai A+), berikut rute yang diimplementasikan:

### 1. Rute Wajib
- **Home (`/`)**
  - Nama rute: `home`
  - Menampilkan sambutan khas ITS ("VIVAT ITS!"), profil ringkas mahasiswa, dan ringkasan ide platform Agentic AI (Magentic).
- **Detail Profil Mahasiswa (`/mahasiswa/{nrp}`)**
  - Nama rute: `mahasiswa.show`
  - Membutuhkan parameter wajib berupa 10 digit NRP mahasiswa.
  - Dilengkapi fitur pencarian NRP dan pintasan cepat (*quick shortcuts*) yang otomatis menandai mahasiswa yang sedang aktif dilihat.
- **Ide Platform Agentic AI (`/agent/{tema?}`)**
  - Nama rute: `agent.show`
  - Parameter `{tema?}` bersifat opsional. Jika kosong, otomatis memakai nilai default: `'General Assistant Agent'`.
  - Jika diisi (contoh: `code-analysis`, `autonomous-bug-fixing`, `collaborative-workflow`), akan menampilkan penjelasan modul terkait.
- **Penerapan Named Routes**
  - Seluruh rute memiliki nama (`->name()`) dan seluruh link navigasi di view menggunakan fungsi helper `route()`.

### 2. Tantangan Tambahan (A+)
- **Pengamanan Regex 10 Digit NRP**
  - Rute `/mahasiswa/{nrp}` diamankan dengan `where('nrp', '^[0-9]{10}$')`.
  - Jika format tidak sesuai (misal kurang/lebih dari 10 digit, atau ada huruf), request otomatis ditolak dan diarahkan ke halaman fallback 404.
- **Kalkulator IPK Portofolio (`/hitung-ipk/{ip1}/{ip2}`)**
  - Nama rute: `ipk.hitung`
  - Mengambil dua nilai IP dari URL, menghitung total penjumlahan dan rata-rata IPK 2 semester, serta menentukan predikat kelulusan ITS (Cum Laude, dsb).
- **Grouping Prefix `/dashboard`**
  - Mengelompokkan rute internal di bawah prefix `/dashboard` menggunakan `Route::prefix('dashboard')->group(...)`.
- **Custom Fallback Route (404)**
  - Menggunakan `Route::fallback()` untuk menangani URL yang tidak terdaftar dengan tampilan error 404 bertema merah standar dan tombol navigasi kembali ke beranda.

---

## Struktur Folder Proyek

Berikut susunan berkas utama dalam proyek ini:

```text
PBKK-Tugas-2/
├── app/Http/Controllers/
│   ├── HomeController.php        # Menampilkan halaman beranda
│   ├── AcademicController.php    # Profil mahasiswa, kalkulator IPK, & dashboard
│   └── AgentController.php       # Platform ide AI Agent (parameter opsional & fallback)
├── public/
│   └── images/                   # Aset visual (logo resmi ITS)
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php         # Master layout (navbar, footer, styling)
│   ├── errors/
│   │   └── fallback.blade.php    # Halaman error 404 kustom
│   ├── home.blade.php            # Tampilan beranda & profil singkat
│   ├── mahasiswa.blade.php       # Tampilan detail profil mahasiswa
│   ├── agent.blade.php           # Tampilan ide platform agent AI
│   ├── ipk.blade.php             # Tampilan kalkulator IPK 2 semester
│   └── dashboard.blade.php       # Tampilan prefix grouping /dashboard
├── routes/
│   └── web.php                   # Definisi seluruh rute, named routes, regex, & fallback
└── tests/Feature/
    └── RoutingTest.php           # Automated test suite (10 test cases, 45 assertions)
```

---

## Daftar Rute (Routing Table)

| Method | URL / Pattern | Nama Rute | Controller | Keterangan |
|:------:|:--------------|:----------|:-----------|:-----------|
| `GET` | `/` | `home` | `HomeController@index` | Halaman utama / beranda |
| `GET` | `/mahasiswa/{nrp}` | `mahasiswa.show` | `AcademicController@mahasiswa` | Detail profil (Regex 10 digit) |
| `GET` | `/agent/{tema?}` | `agent.show` | `AgentController@show` | Ide AI Agent (Parameter opsional) |
| `GET` | `/hitung-ipk/{ip1}/{ip2}` | `ipk.hitung` | `AcademicController@hitungIpk` | Kalkulator rata-rata IPK |
| `GET` | `/dashboard` | `dashboard.index` | `AcademicController@dashboard` | Dashboard utama |
| `GET` | `/dashboard/mahasiswa/{nrp}` | `dashboard.mahasiswa` | `AcademicController@mahasiswa` | Detail mahasiswa via group |
| `GET` | `/dashboard/hitung-ipk/{ip1}/{ip2}` | `dashboard.ipk` | `AcademicController@hitungIpk` | Kalkulator IPK via group |
| `ANY` | `{fallbackPlaceholder}` | `fallback` | `Closure (Route::fallback)` | Halaman 404 kustom |

---

## Cara Menjalankan Project

Jika ingin menjalankan project ini di komputer lokal dari hasil clone repositori:

### 1. Prasyarat
- PHP >= 8.2 (disarankan PHP 8.4)
- Composer
- Git

### 2. Langkah Instalasi

1. **Clone repository ini:**
   ```bash
   git clone https://github.com/ajizaenulm/PBKK-Tugas-2.git
   cd PBKK-Tugas-2
   ```

2. **Install dependensi Composer:**
   ```bash
   composer install
   ```

3. **Buat file konfigurasi `.env`:**
   ```bash
   # Linux / macOS / Git Bash:
   cp .env.example .env

   # Windows PowerShell:
   Copy-Item .env.example .env

   # Windows Command Prompt (CMD):
   copy .env.example .env
   ```

4. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

5. **Jalankan development server:**
   ```bash
   php artisan serve
   ```

6. Buka browser dan akses:
   ```
   http://127.0.0.1:8000
   ```

---

## Menjalankan Unit Test

Project ini sudah dilengkapi feature test otomatis untuk memvalidasi semua rute, regex, parameter opsional, kalkulator IPK, dan rute fallback 404.

Jalankan perintah berikut di terminal:
```bash
php artisan test
```

Hasil test:
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
```

---

## URL Pengujian untuk Demo

Berikut beberapa URL yang bisa langsung dicoba di browser saat server berjalan:

- **Beranda** : `http://127.0.0.1:8000/`
- **Profil NRP Mahasiswa (Valid)** : `http://127.0.0.1:8000/mahasiswa/5025241065`
- **Uji Penolakan Regex (Fallback 404)** : `http://127.0.0.1:8000/mahasiswa/12345`
- **Agent (Default)** : `http://127.0.0.1:8000/agent`
- **Agent (Dengan Parameter)** : `http://127.0.0.1:8000/agent/code-analysis`
- **Kalkulator IPK** : `http://127.0.0.1:8000/hitung-ipk/3.88/3.92`
- **Dashboard Grouping** : `http://127.0.0.1:8000/dashboard`
- **Fallback URL Sembarang** : `http://127.0.0.1:8000/url-tidak-terdaftar`

---

## Catatan Tambahan

File `.env` dan folder `vendor/` tidak disertakan dalam repository ini sesuai dengan ketentuan pengumpulan tugas dan standar `.gitignore` Laravel.
