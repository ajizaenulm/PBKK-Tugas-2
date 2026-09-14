@extends('layouts.app')

@section('title', '404 — Rute Tidak Ditemukan | Magentic Sandbox')

@section('content')
<div style="min-height: 60vh; display: flex; align-items: center; justify-content: center; width: 100%;">
    <div class="card" style="max-width: 620px; text-align: center; padding: 48px 36px; border: 1.5px solid #CBD5E1; border-top: 5px solid #DC2626; box-shadow: var(--shadow-md);">
        
        <!-- Logo ITS 3D -->
        <div style="margin-bottom: 20px;">
            <img src="{{ asset('images/logo-its.png') }}" alt="Logo ITS" style="height: 54px; width: auto; object-fit: contain;">
        </div>

        <!-- Icon 404 Badge: Error Red Gradient -->
        <div style="width: 96px; height: 96px; border-radius: 50%; background: linear-gradient(135deg, #DC2626 0%, #991B1B 100%); margin: 0 auto 22px auto; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 20px rgba(220, 38, 38, 0.35); border: 2px solid rgba(255, 255, 255, 0.2);">
            <span style="font-size: 38px; font-weight: 800; font-family: 'Outfit', sans-serif; color: #FFFFFF; letter-spacing: -1px;">
                404
            </span>
        </div>

        <div style="display: inline-flex; margin-bottom: 16px;">
            <span class="badge" style="background-color: #FEE2E2; color: #991B1B; border: 1px solid #FECACA; font-weight: 700;">
                myITS Portal &bull; Peringatan Error 404
            </span>
        </div>

        <h1 style="font-size: 26px; margin-bottom: 12px; color: #991B1B; font-weight: 800;">Halaman atau Rute Tidak Ditemukan</h1>
        
        <p style="color: var(--text-body); font-size: 14.5px; margin-bottom: 24px; line-height: 1.6;">
            Halaman atau berkas yang Anda tuju tidak ditemukan pada server sistem informasi ITS, atau format NRP yang dimasukkan tidak memenuhi standar 10 digit angka mahasiswa ITS.
        </p>

        <div style="padding: 12px 18px; background-color: #FEF2F2; border-radius: var(--radius-md); border: 1px solid #FECACA; font-family: 'JetBrains Mono', monospace; font-size: 13px; color: #B91C1C; font-weight: 700; margin-bottom: 32px; word-break: break-all;">
            URL Dituju: {{ request()->getRequestUri() }}
        </div>

        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('home') }}" class="btn btn-primary" style="background-color: var(--navy-primary); color: #FFFFFF;">
                &larr; Kembali ke Beranda
            </a>
            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">
                Buka Dashboard
            </a>
            <a href="{{ route('mahasiswa.show', ['nrp' => '5025241065']) }}" class="btn btn-secondary">
                Profil Mahasiswa
            </a>
        </div>
    </div>
</div>
@endsection
