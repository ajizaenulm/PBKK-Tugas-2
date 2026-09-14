<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AgentController extends Controller
{
    /**
     * Menampilkan informasi ide platform Agentic AI "Magentic".
     * Menggunakan parameter opsional {tema?}, dengan default 'General Assistant Agent'.
     *
     * @param string|null $tema
     * @return \Illuminate\View\View
     */
    public function show(?string $tema = null)
    {
        // Nilai fallback default jika parameter tema kosong
        $rawTema = $tema ? trim($tema) : 'General Assistant Agent';
        $normalizedSlug = Str::slug($rawTema);

        // Katalog tema utama platform Magentic
        $katalogTema = [
            'code-analysis' => [
                'judul' => 'Code Analysis & Security Audit Agent',
                'badge' => 'Intelligence',
                'warna' => 'cyan',
                'deskripsi_singkat' => 'Memindai codebase secara real-time untuk mendeteksi anti-pattern, celah keamanan OWASP, dan inefisiensi arsitektural.',
                'fitur' => [
                    'Deep AST (Abstract Syntax Tree) Parser berbasis PHP 8.4 & JS',
                    'Deteksi potensi kerentanan SQL Injection, XSS, & Mass Assignment pada Laravel',
                    'Saran refactoring modular sesuai Clean Architecture & SOLID Principles',
                    'Estimasi Cognitive Complexity per method/function',
                ],
                'alur_kerja' => 'File Saved -> Monaco AST Extractor -> Magentic Security Scanner -> Inline Linting & Highlight',
            ],
            'autonomous-bug-fixing' => [
                'judul' => 'Autonomous Bug Fixing & Patching Agent',
                'badge' => 'Autonomous',
                'warna' => 'emerald',
                'deskripsi_singkat' => 'Bekerja secara otonom dalam siklus Analyze -> Plan -> Execute -> Verify untuk memperbaiki error tanpa campur tangan manual.',
                'fitur' => [
                    'Auto-diagnosis error stack trace dari Laravel Log & browser console',
                    'Generasi unified diff patch yang minimalis dan aman',
                    'Sandbox testing terisolasi untuk memverifikasi perbaikan sebelum commit',
                    'Pembuatan Git branch dan commit pesan otomatis yang deskriptif',
                ],
                'alur_kerja' => 'Error Captured -> Root Cause Analysis -> Patch Generation -> php artisan test -> Auto Merge',
            ],
            'collaborative-workflow' => [
                'judul' => 'Collaborative Workflow & Multi-Agent Concurrency',
                'badge' => 'Collaboration',
                'warna' => 'indigo',
                'deskripsi_singkat' => 'Sinkronisasi real-time antar developer dan agen AI dalam satu berkas menggunakan WebSockets dan CRDT.',
                'fitur' => [
                    'Multiplayer cursor visual tracking (misal kursor Arda & Aji aktif secara simultan)',
                    'Conflict-free Replicated Data Types (CRDT) untuk kolaborasi bebas konflik',
                    'AI Pair Programming Assistant yang hadir sebagai "developer virtual ketiga" di workspace',
                    'Voice/Chat sidecar thread yang terikat pada baris kode spesifik',
                ],
                'alur_kerja' => 'Client Keystroke -> Laravel Reverb Socket Broadcast -> Monaco Remote Cursor Render',
            ],
            'general-assistant-agent' => [
                'judul' => 'General Assistant Agent (Default Engine)',
                'badge' => 'Core Engine',
                'warna' => 'purple',
                'deskripsi_singkat' => 'Agen serbaguna berkesadaran konteks repo (*repository-aware context*) yang siap menjawab pertanyaan, membuat scaffolding, dan menjelaskan kode.',
                'fitur' => [
                    'Index repository penuh menggunakan Vector Search & Semantic Embedding',
                    'Scaffolding instan Controller, Model, Migration, dan Blade template',
                    'Penjelasan alur kerja logika bisnis kompleks dengan diagram Mermaid interaktif',
                    'Dukungan eksekusi perintah terminal terkontrol via container sandbox',
                ],
                'alur_kerja' => 'Developer Prompt -> RAG Repository Context -> LLM Reasoning -> Action Execution',
            ],
        ];

        // Cari detail tema, atau buat tema dinamis jika tema kustom dimasukkan di URL
        if (isset($katalogTema[$normalizedSlug])) {
            $temaAktif = $katalogTema[$normalizedSlug];
            $temaAktif['slug'] = $normalizedSlug;
        } else {
            $temaAktif = [
                'judul' => ucwords(str_replace(['-', '_'], ' ', $rawTema)),
                'badge' => 'Custom Module',
                'warna' => 'blue',
                'deskripsi_singkat' => 'Modul Agen AI khusus yang dieksplorasi secara dinamis untuk topik: "' . htmlspecialchars($rawTema) . '".',
                'fitur' => [
                    'Pemrosesan prompt dinamis berbasis kebutuhan pengguna',
                    'Penyesuaian konfigurasi agen adaptif terhadap modul eksternal',
                    'Integrasi langsung dengan Magentic Agent Framework',
                ],
                'alur_kerja' => 'Custom User Parameter -> Dynamic Orchestrator -> Execution Sandbox',
                'slug' => $normalizedSlug,
            ];
        }

        // 4 Siklus Otonom Inti Platform Magentic
        $autonomousLoop = [
            [
                'fase' => 'Analyze',
                'penjelasan' => 'AI memindai struktur file proyek, membaca konfigurasi, dependency, dan mendiagnosis kebutuhan atau anomali.',
            ],
            [
                'fase' => 'Plan',
                'penjelasan' => 'AI menyusun blueprint langkah perubahan, mempertimbangkan dampak breaking change, dan menyiapkan urutan patch.',
            ],
            [
                'fase' => 'Execute',
                'penjelasan' => 'AI memodifikasi berkas kode secara presisi pada baris tertentu tanpa merusak kode di sekitarnya.',
            ],
            [
                'fase' => 'Verify',
                'penjelasan' => 'AI menjalankan unit test, linter, atau dev server untuk membuktikan bahwa solusi bekerja 100% sempurna.',
            ],
        ];

        return view('agent', compact('temaAktif', 'katalogTema', 'autonomousLoop', 'rawTema'));
    }
}
