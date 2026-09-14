<?php

use App\Http\Controllers\AcademicController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Tugas Mandiri PBKK: Pertemuan 2 (Instalasi & Routing)
|--------------------------------------------------------------------------
| Mahasiswa : Aji Zaenul Musthofa
| NRP       : 5025241065
| Kampus    : Departemen Teknik Informatika - FTEIC ITS Surabaya
| Proyek    : Sandbox Routing & Proyeksi Platform Agentic AI "Magentic"
|--------------------------------------------------------------------------
*/

// =========================================================================
// 1. RUTE WAJIB 1: Halaman Home (Landing Page & Profil Mahasiswa)
// =========================================================================
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// =========================================================================
// 2. RUTE WAJIB 2: Detail Profil Mahasiswa (Wajib Parameter NRP)
//    + TANTANGAN 1: Pengamanan Parameter Regex 10 Digit Angka Bulat ITS
// =========================================================================
Route::get('/mahasiswa/{nrp}', [AcademicController::class, 'mahasiswa'])
    ->where('nrp', '^[0-9]{10}$')
    ->name('mahasiswa.show');

// =========================================================================
// 3. RUTE WAJIB 3: Ide Platform Agentic AI "Magentic" (Parameter Opsional)
//    Jika tema tidak diisi, controller otomatis menggunakan 'General Assistant Agent'
// =========================================================================
Route::get('/agent/{tema?}', [AgentController::class, 'show'])
    ->name('agent.show');

// =========================================================================
// 4. TANTANGAN 2: Kalkulator Portofolio Akademis (Hitung IPK 2 Semester)
//    Menerima parameter IP semester 1 & 2 dengan pengaman regex bilangan/desimal
// =========================================================================
Route::get('/hitung-ipk/{ip1}/{ip2}', [AcademicController::class, 'hitungIpk'])
    ->where([
        'ip1' => '^[0-9]+(\.[0-9]{1,2})?$',
        'ip2' => '^[0-9]+(\.[0-9]{1,2})?$',
    ])
    ->name('ipk.hitung');

// =========================================================================
// 5. TANTANGAN 3: Grouping Prefix Rute Akademis (/dashboard)
//    Menerapkan Route::prefix() dan Route::name() untuk pengelompokan modular
// =========================================================================
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    // 5.1 Beranda Dashboard Akademis
    Route::get('/', [AcademicController::class, 'dashboard'])
        ->name('index');

    // 5.2 Profil Mahasiswa di dalam group dashboard
    Route::get('/mahasiswa/{nrp}', [AcademicController::class, 'mahasiswa'])
        ->where('nrp', '^[0-9]{10}$')
        ->name('mahasiswa');

    // 5.3 Kalkulator IPK di dalam group dashboard
    Route::get('/hitung-ipk/{ip1}/{ip2}', [AcademicController::class, 'hitungIpk'])
        ->where([
            'ip1' => '^[0-9]+(\.[0-9]{1,2})?$',
            'ip2' => '^[0-9]+(\.[0-9]{1,2})?$',
        ])
        ->name('ipk');
});

// =========================================================================
// 6. TANTANGAN 3 (Bagian 2): Fallback Route (Penanganan 404 Kustom)
//    Menangani segala URL/parameter yang tidak valid atau ditolak regex
// =========================================================================
Route::fallback(function () {
    return response()->view('errors.fallback', [], 404);
})->name('fallback');
