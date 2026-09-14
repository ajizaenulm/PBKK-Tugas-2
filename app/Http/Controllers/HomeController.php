<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman Home utama yang berisi:
     * 1. Sambutan hangat khas ITS.
     * 2. Profil ringkas interaktif mahasiswa.
     * 3. Landing page presentasi ide platform "Magentic" (Agentic AI IDE).
     */
    public function index()
    {
        $mahasiswa = [
            'nama' => 'Aji Zaenul Musthofa',
            'nrp' => '5025241065',
            'departemen' => 'Teknik Informatika',
            'fakultas' => 'Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC)',
            'universitas' => 'Institut Teknologi Sepuluh Nopember (ITS)',
            'semester' => 5,
            'status' => 'Aktif',
            'email' => 'ajizaenulm33@gmail.com',
            'github' => 'https://github.com/ajizaenulm',
        ];

        $platform = [
            'nama' => 'Magentic',
            'tagline' => 'Next-Generation Browser-Based Agentic AI Development Environment',
            'deskripsi' => 'Platform IDE berbasis web generasi berikutnya yang menggabungkan kemampuan penyuntingan kode Monaco Editor ala VS Code, integrasi Git/GitHub, kolaborasi multi-pengguna real-time (WebSockets/Laravel Reverb), dan agen AI otonom sistematis.',
            'agent_loop' => [
                [
                    'step' => 1,
                    'name' => 'Analyze',
                    'icon' => 'search',
                    'desc' => 'Memindai struktur kode, dependency tree, dan mendeteksi anomali atau bug secara mendalam.',
                ],
                [
                    'step' => 2,
                    'name' => 'Plan',
                    'icon' => 'git-pull-request',
                    'desc' => 'Menyusun strategi perbaikan terstruktur, merancang arsitektur patch, dan mitigasi risiko.',
                ],
                [
                    'step' => 3,
                    'name' => 'Execute',
                    'icon' => 'code',
                    'desc' => 'Melakukan patching otomatis, modifikasi file langsung di workspace, dan refactoring presisi.',
                ],
                [
                    'step' => 4,
                    'name' => 'Verify',
                    'icon' => 'check-circle',
                    'desc' => 'Menjalankan test suite otomatis, memeriksa linting, dan memastikan tidak ada regresi.',
                ],
            ],
            'collaborators' => [
                ['name' => 'Aji', 'color' => '#38bdf8', 'file' => 'routes/web.php', 'line' => 24],
                ['name' => 'Arda', 'color' => '#f43f5e', 'file' => 'app/Services/AgentService.php', 'line' => 42],
            ],
            'tech_stack' => [
                'Frontend' => ['Monaco Editor', 'JavaScript ESNext', 'Tailwind / Vanilla CSS', 'Blade Component'],
                'Backend' => ['Laravel 11 / 12', 'PHP 8.4', 'MySQL', 'Laravel Reverb (WebSockets)'],
                'AI & Cloud' => ['Custom Autonomous Agent Loop', 'GitHub REST & GraphQL API', 'Docker Sandboxing'],
            ],
        ];

        return view('home', compact('mahasiswa', 'platform'));
    }
}
