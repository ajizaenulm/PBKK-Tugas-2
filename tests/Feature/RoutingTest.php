<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * Rute 1: Menguji halaman Home (/).
     * Memastikan status 200, sambutan khas ITS, dan presentasi platform Magentic.
     */
    public function test_home_route_returns_ok_and_contains_its_welcome_and_magentic(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('Vivat ITS!');
        $response->assertSee('Magentic');
        $response->assertSee('Aji Zaenul Musthofa');
        $response->assertSee('5025241065');
        $response->assertSee('Analyze');
        $response->assertSee('Plan');
        $response->assertSee('Execute');
        $response->assertSee('Verify');
    }

    /**
     * Rute 2 & Tantangan 1: Menguji rute /mahasiswa/{nrp} dengan 10 digit angka valid.
     */
    public function test_mahasiswa_route_accepts_valid_10_digit_nrp(): void
    {
        $response = $this->get(route('mahasiswa.show', ['nrp' => '5025241065']));

        $response->assertStatus(200);
        $response->assertSee('Aji Zaenul Musthofa');
        $response->assertSee('5025241065');
        $response->assertSee('Teknik Informatika');
        $response->assertSee('Pemrograman Berbasis Kerangka Kerja');
    }

    /**
     * Tantangan 1 (Regex): Menguji penolakan parameter NRP yang tidak 10 digit.
     * Harus ditolak oleh regex dan dialihkan ke fallback 404.
     */
    public function test_mahasiswa_route_rejects_invalid_nrp_format(): void
    {
        // Terlalu pendek (5 digit)
        $responseShort = $this->get('/mahasiswa/12345');
        $responseShort->assertStatus(404);
        $responseShort->assertSee('Halaman atau Rute Tidak Ditemukan');

        // Mengandung huruf
        $responseAlpha = $this->get('/mahasiswa/50252abcde');
        $responseAlpha->assertStatus(404);
        $responseAlpha->assertSee('Halaman atau Rute Tidak Ditemukan');

        // Terlalu panjang (11 digit)
        $responseLong = $this->get('/mahasiswa/50252410651');
        $responseLong->assertStatus(404);
        $responseLong->assertSee('Halaman atau Rute Tidak Ditemukan');
    }

    /**
     * Rute 3: Menguji rute /agent/{tema?} tanpa parameter.
     * Harus mengembalikan nilai default 'General Assistant Agent'.
     */
    public function test_agent_route_without_param_uses_default_general_assistant(): void
    {
        $response = $this->get(route('agent.show'));

        $response->assertStatus(200);
        $response->assertSee('General Assistant Agent');
        $response->assertSee('Default Fallback Route Aktif');
    }

    /**
     * Rute 3: Menguji rute /agent/{tema?} dengan parameter khusus.
     */
    public function test_agent_route_with_custom_theme(): void
    {
        $response = $this->get(route('agent.show', ['tema' => 'code-analysis']));

        $response->assertStatus(200);
        $response->assertSee('Code Analysis & Security Audit Agent');

        $responseBugFix = $this->get(route('agent.show', ['tema' => 'autonomous-bug-fixing']));
        $responseBugFix->assertStatus(200);
        $responseBugFix->assertSee('Autonomous Bug Fixing');
    }

    /**
     * Tantangan 2: Menguji kalkulator portofolio akademis /hitung-ipk/{ip1}/{ip2}.
     * Memastikan penjumlahan dan rata-rata IPK dihitung secara tepat.
     */
    public function test_kalkulator_ipk_computes_sum_and_average_accurately(): void
    {
        $response = $this->get(route('ipk.hitung', ['ip1' => '3.80', 'ip2' => '3.90']));

        $response->assertStatus(200);
        $response->assertSee('3.80');
        $response->assertSee('3.90');
        $response->assertSee('7.70'); // Total penjumlahan
        $response->assertSee('3.85'); // Rata-rata IPK
        $response->assertSee('Dengan Pujian (Cum Laude)');
    }

    /**
     * Tantangan 3: Menguji Grouping Prefix /dashboard.
     */
    public function test_dashboard_grouped_routes_are_accessible(): void
    {
        // 1. Dashboard Index
        $responseIndex = $this->get(route('dashboard.index'));
        $responseIndex->assertStatus(200);
        $responseIndex->assertSee('Dashboard Akademis Mahasiswa');

        // 2. Dashboard Mahasiswa
        $responseMahasiswa = $this->get(route('dashboard.mahasiswa', ['nrp' => '5025241065']));
        $responseMahasiswa->assertStatus(200);
        $responseMahasiswa->assertSee('Aji Zaenul Musthofa');

        // 3. Dashboard Kalkulator IPK
        $responseIpk = $this->get(route('dashboard.ipk', ['ip1' => '3.75', 'ip2' => '3.85']));
        $responseIpk->assertStatus(200);
        $responseIpk->assertSee('7.60');
        $responseIpk->assertSee('3.80');
    }

    /**
     * Tantangan 3: Menguji Fallback Route (Penanganan 404 Kustom).
     */
    public function test_fallback_route_catches_invalid_url_with_404_status(): void
    {
        $response = $this->get('/alamat-url-ngawur-yang-pasti-tidak-ada');

        $response->assertStatus(404);
        $response->assertSee('Halaman atau Rute Tidak Ditemukan');
        $response->assertSee('/alamat-url-ngawur-yang-pasti-tidak-ada');
    }
}
