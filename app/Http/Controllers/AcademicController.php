<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicController extends Controller
{
    /**
     * Menampilkan detail profil mahasiswa berdasarkan parameter wajib NRP (10 digit).
     *
     * @param string $nrp
     * @return \Illuminate\View\View
     */
    public function mahasiswa(string $nrp)
    {
        // Data profil utama jika NRP cocok dengan mahasiswa yang bersangkutan
        if ($nrp === '5025241065') {
            $mahasiswa = [
                'nama' => 'Aji Zaenul Musthofa',
                'nrp' => $nrp,
                'departemen' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC)',
                'kampus' => 'Institut Teknologi Sepuluh Nopember (ITS) Surabaya',
                'angkatan' => '2024',
                'semester' => 5,
                'status_akademik' => 'Mahasiswa Aktif',
                'dosen_wali' => 'Dosen Pembimbing Akademik FTEIC ITS',
                'ipk_kumulatif' => 3.88,
                'sks_ditempuh' => 92,
                'minat_studi' => 'Pemrograman Berbasis Kerangka Kerja (PBKK), Agentic AI Systems, Cloud & Full-Stack Development',
                'mata_kuliah_semester_ini' => [
                    ['kode' => 'IF234501', 'nama' => 'Pemrograman Berbasis Kerangka Kerja (PBKK)', 'sks' => 3, 'kelas' => 'A'],
                    ['kode' => 'IF234502', 'nama' => 'Kecerdasan Komputasional & Agen Otonom', 'sks' => 3, 'kelas' => 'B'],
                    ['kode' => 'IF234503', 'nama' => 'Arsitektur Sistem Terdistribusi', 'sks' => 3, 'kelas' => 'A'],
                    ['kode' => 'IF234504', 'nama' => 'Rekayasa Perangkat Lunak Lanjut', 'sks' => 4, 'kelas' => 'A'],
                    ['kode' => 'IF234505', 'nama' => 'Manajemen Basis Data Terapan', 'sks' => 3, 'kelas' => 'C'],
                ],
                'prestasi' => [
                    'Inisiator & Lead Architect Konsep Platform "Magentic" PBKK 2026',
                    'Kontributor Aktif Open Source & Proyek Mandiri Framework Laravel',
                    'Asisten Praktikum & Pengembang Web Terdistribusi',
                ],
            ];
        } else {
            // Data dinamis jika mahasiswa mencoba menguji 10 digit NRP lainnya
            $mahasiswa = [
                'nama' => 'Mahasiswa ITS (Simulasi NRP ' . $nrp . ')',
                'nrp' => $nrp,
                'departemen' => 'Fakultas Teknologi Elektro dan Informatika Cerdas',
                'fakultas' => 'FTEIC - Kampus Perjuangan Sukolilo',
                'kampus' => 'Institut Teknologi Sepuluh Nopember (ITS)',
                'angkatan' => '20' . substr($nrp, 4, 2),
                'semester' => 5,
                'status_akademik' => 'Mahasiswa Aktif',
                'dosen_wali' => 'Dosen Wali Akademik Departemen',
                'ipk_kumulatif' => 3.75,
                'sks_ditempuh' => 88,
                'minat_studi' => 'Teknologi Informasi & Rekayasa Perangkat Lunak',
                'mata_kuliah_semester_ini' => [
                    ['kode' => 'IF234501', 'nama' => 'Pemrograman Berbasis Kerangka Kerja (PBKK)', 'sks' => 3, 'kelas' => 'A'],
                    ['kode' => 'IF234506', 'nama' => 'Sistem Berkas & Algoritma', 'sks' => 3, 'kelas' => 'B'],
                ],
                'prestasi' => [
                    'Mahasiswa Terdaftar Resmi di SIM Akademik ITS',
                ],
            ];
        }

        return view('mahasiswa', compact('mahasiswa'));
    }

    /**
     * Tantangan 2: Menghitung jumlah dan rata-rata IP mahasiswa dalam 2 semester.
     *
     * @param string|float $ip1
     * @param string|float $ip2
     * @return \Illuminate\View\View
     */
    public function hitungIpk($ip1, $ip2)
    {
        $val1 = (float) $ip1;
        $val2 = (float) $ip2;

        // Normalisasi batas nilai IP (0.00 - 4.00)
        $val1Clamped = max(0.00, min(4.00, $val1));
        $val2Clamped = max(0.00, min(4.00, $val2));

        $totalIp = round($val1Clamped + $val2Clamped, 2);
        $rataRataIpk = round(($val1Clamped + $val2Clamped) / 2, 2);

        // Menentukan predikat kelulusan ITS
        if ($rataRataIpk >= 3.51) {
            $predikat = 'Dengan Pujian (Cum Laude)';
            $badgeColor = 'gold';
        } elseif ($rataRataIpk >= 3.01) {
            $predikat = 'Sangat Memuaskan';
            $badgeColor = 'emerald';
        } elseif ($rataRataIpk >= 2.50) {
            $predikat = 'Memuaskan';
            $badgeColor = 'blue';
        } else {
            $predikat = 'Cukup';
            $badgeColor = 'amber';
        }

        $kalkulasi = [
            'ip_semester_1' => number_format($val1Clamped, 2),
            'ip_semester_2' => number_format($val2Clamped, 2),
            'total_ip' => number_format($totalIp, 2),
            'rata_rata_ipk' => number_format($rataRataIpk, 2),
            'predikat' => $predikat,
            'badge_color' => $badgeColor,
            'analisis' => $rataRataIpk >= 3.50
                ? 'Luar biasa! Portofolio akademis Anda berada pada jalur predikat kehormatan (Cum Laude).'
                : 'Performa akademis yang solid. Terus pertahankan performa untuk semester berikutnya!',
        ];

        return view('ipk', compact('kalkulasi'));
    }

    /**
     * Tantangan 3: Grouping Dashboard Akademis (/dashboard).
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $ringkasan = [
            'mahasiswa' => [
                'nama' => 'Aji Zaenul Musthofa',
                'nrp' => '5025241065',
                'departemen' => 'Teknik Informatika ITS',
                'semester' => 5,
            ],
            'statistik' => [
                'sks_lulus' => 92,
                'ipk_terakhir' => 3.88,
                'status_tugas' => 'Selesai (Pertemuan 2 PBKK)',
                'proyek_unggulan' => 'Magentic Agentic IDE',
            ],
            'quick_links' => [
                ['title' => 'Detail Profil Mahasiswa', 'desc' => 'Parameter NRP: 5025241065', 'route' => 'dashboard.mahasiswa', 'params' => ['nrp' => '5025241065']],
                ['title' => 'Kalkulator IPK Portofolio', 'desc' => 'Simulasi IP 3.85 & 3.90', 'route' => 'dashboard.ipk', 'params' => ['ip1' => '3.85', 'ip2' => '3.90']],
                ['title' => 'Ide Platform Magentic', 'desc' => 'Eksplorasi modul Autonomous Agents', 'route' => 'agent.show', 'params' => ['tema' => 'autonomous-bug-fixing']],
            ],
        ];

        return view('dashboard', compact('ringkasan'));
    }
}
