# Catatan rekonstruksi dan verifikasi

## Target dan sumber

Permintaan pengguna: jalankan skill reverse-engineer-anything, buat aplikasi yang sama dengan https://www.ngodingpakeai.com/, lalu uji hasilnya. Pengguna kemudian menyediakan beberapa screenshot, termasuk layar Plan setelah login, ide baru, proyek eksisting, DesainPakeAI, AndalAI, katalog template, serta wizard preferensi teknologi, pertanyaan cash advance, dan peta fitur.

Aplikasi dibuat di `ngoding-ai/` dalam checkout yang sama. Situs TCM sebelumnya tetap utuh. Tidak ada commit, push, atau deployment yang dilakukan.

## Bukti REA

- `reference-result.json`: Evidence `ev_46d3621de36adf15ea859e884e04047978d182f1e6908e5b0b1b801e54d6a424`, operasi `capture_browser_scenario`, provider `rea-playwright-browser-scenario`, Chromium 154.0.8037.57. Menyimpan DOM, accessibility, screenshot, URL, dan observasi jaringan halaman utama.
- `plan-result.json`: Evidence `ev_a518a093f9233c54e81c2ed1a168f64f02dc516f3c057858a563b90b2fb91cac`, navigasi terdeklarasi dari halaman utama ke `/plan`. Capture tepat setelah klik masih menunjukkan state transisi; pengamatan Playwright berikutnya memastikan guest diarahkan ke `/sign-in?redirect=%2Fplan`.
- Input skenario disimpan sebagai `reference-scenario.json` dan `plan-scenario.json`.

REA dijalankan melalui CLI yang terpasang karena MCP tidak tersedia pada tool aktif chat; registrasi Codex sendiri sehat. Browser REA launch awal tidak mewarisi proxy browser dan gagal DNS. Koreksi menggunakan koneksi CDP ke Chromium yang secara eksplisit memakai proxy cloud. Verifikasi sertifikat tetap aktif. Akses awal target sempat ditolak kebijakan jaringan; setelah perubahan pengguna, browser dapat memuat situs.

Batas evidence REA: attach CDP tidak merekam event sebelum attach, beberapa request belum selesai saat capture berakhir, screenshot runtime bukan source asli, dan tidak ada bukti eksekusi backend privat. Bukti DOM/asset tambahan, harga, login, serta template berasal dari **Playwright biasa**, bukan diberi label REA Evidence. Lihat `auth-pricing.md` dan `templates.md`.

## Observasi vs keputusan implementasi

| Bagian | Dasar | Hasil |
|---|---|---|
| Beranda, teks, warna, logo, font, ilustrasi | REA + browser publik | Dicocokkan, aset dilayani lokal |
| Login Google dan harga | Browser publik | Tampilan dan interaksi periode direkonstruksi; layanan eksternal belum terhubung |
| Katalog dan detail template | Browser publik | Kartu, chooser, auth gate, tab, galeri, dan tautan GitHub |
| DesainPakeAI dan AndalAI | Klik publik + screenshot pengguna | Tautan eksternal dipertahankan sesuai perilaku asal |
| Pilihan proyek, ide baru, proyek eksisting, teknologi, klarifikasi, peta fitur | Screenshot pengguna | Susunan, copy utama, warna, dan stepper direkonstruksi |
| Hasil PRD/Task/Roadmap dan CRUD | Keputusan implementasi lokal | Template deterministik, persistensi browser, edit/ekspor/impor; bukan klaim backend asli |
| Sinkronisasi proyek eksisting | Keputusan lokal | Prompt lokal + impor JSON; tidak membuat token atau meniru layanan asli |

## Checklist akhir

- [x] Target publik dan pembatasan login dipahami.
- [x] Halaman publik direkonstruksi dan screenshot pengguna diterapkan.
- [x] Build TypeScript/Vite dapat dijalankan dengan lockfile.
- [x] Login demo, harga, template, Plan baru/eksisting, dan dokumen dapat dicoba.
- [x] Tes unit, browser, responsivitas, dan build dijalankan; detail hasil ada di laporan/log lokal.
- [ ] OAuth Google, pembayaran, backend AI, dan sinkronisasi server produksi: tidak tersedia di mode lokal; memerlukan implementasi layanan serta konfigurasi/credential nyata.

Implementasi tidak mengklaim kesamaan backend atau persamaan piksel pada setiap state. Ilustrasi publik dibekukan pada frame teramati; avatar lokal menggunakan inisial, bukan foto akun pengguna.
