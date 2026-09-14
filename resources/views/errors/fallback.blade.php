@extends('layouts.app')

@section('title', '404 — Rute Tidak Ditemukan | Magentic Sandbox')

@section('content')
<div style="min-height: 60vh; display: flex; align-items: center; justify-content: center;">
    <div class="card card-elevated" style="max-width: 650px; text-align: center; padding: 48px 36px; border-color: rgba(244, 63, 94, 0.35); position: relative;">
        
        <!-- Glow accent -->
        <div style="width: 120px; height: 120px; border-radius: 50%; background: radial-gradient(circle, rgba(244, 63, 94, 0.25), transparent 70%); margin: 0 auto 16px auto; display: flex; align-items: center; justify-content: center;">
            <span style="font-size: 54px; font-weight: 800; font-family: 'Outfit', sans-serif; color: var(--magentic-rose); letter-spacing: -2px;">
                404
            </span>
        </div>

        <div style="display: inline-flex; margin-bottom: 16px;">
            <span class="badge" style="background: rgba(244, 63, 94, 0.15); color: #f43f5e; border: 1px solid rgba(244, 63, 94, 0.3);">
                Tantangan 3 &bull; Route::fallback() Handler
            </span>
        </div>

        <h1 style="font-size: 26px; margin-bottom: 12px;">Halaman atau Rute Tidak Ditemukan</h1>
        
        <p style="color: var(--text-muted); font-size: 14px; margin-bottom: 24px; line-height: 1.6;">
            Alamat rute yang Anda coba tuju tidak terdaftar dalam routing sandbox atau parameter tidak memenuhi syarat validasi regex (seperti NRP yang bukan 10 digit angka).
        </p>

        <div style="padding: 12px 18px; background: #070d17; border-radius: var(--radius-sm); border: 1px solid var(--border-subtle); font-family: 'JetBrains Mono', monospace; font-size: 13px; color: #fda4af; margin-bottom: 32px; word-break: break-all;">
            URL Dituju: {{ request()->getRequestUri() }}
        </div>

        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('home') }}" class="btn btn-primary">
                &larr; Kembali ke Beranda
            </a>
            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">
                Buka Dashboard
            </a>
            <a href="{{ route('mahasiswa.show', ['nrp' => '5025241065']) }}" class="btn btn-gold">
                Profil Mahasiswa (5025241065)
            </a>
        </div>
    </div>
</div>
@endsection
