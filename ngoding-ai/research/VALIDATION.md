# Hasil verifikasi

Target: aplikasi lokal `ngoding-ai/`, 15 Oktober 2026. Versi produksi dibangun dari source dalam folder ini; server preview memakai output `dist/`.

| Pemeriksaan | Hasil | Bukti |
|---|---|---|
| Install ulang dependency dari lockfile (`npm ci`) | Lulus, 28 package terpasang | Eksekusi cloud instance |
| TypeScript strict (`npm run typecheck`) | Lulus | Perintah exit 0 |
| Build produksi (`npm run build`) | Lulus, 27 module | `local/build.log` |
| Model dokumen/persistensi (`npm test`) | 8 lulus, 0 gagal/skipped | `local/unit-tests.log` |
| Browser pada production preview | 12 skenario lulus, 0 gagal | `local/e2e-production.log` |
| Akun/harga, desktop/mobile, dark/light, redirect | 54 pemeriksaan lulus | `account-tests.md`, `account-local/results.json` |
| Wizard teknologi/klarifikasi, persistensi, desktop/mobile | 35 pemeriksaan lulus | `wizard-tests.md` |
| Peta fitur, pan/zoom/edit, modal, PDF requirement dalam PRD | Lulus, tanpa JS error | `feature-map-tests.md` |
| Template list/detail, chooser, tab, galeri, mobile | Lulus, tanpa JS error | `templates-tests.md` |
| Pemeriksaan visual beranda | Font/logo/warna/crop ilustrasi sesuai observasi, tanpa klaim pixel-identical | `local/home-desktop.png` |
| Responsivitas Plan dan route lain | Tidak ada overflow horizontal pada 390, 768, 1440 px | Skenario `test_responsive_routes`, `local/plan-new-*.png` |
| Source TCM yang sudah ada | Tidak ada perubahan tracked | `git diff` kosong; hanya folder aplikasi baru untracked |

## Cakupan E2E produksi

1. Empat kartu dan aset lokal, termasuk logo SVG yang benar-benar terdekode.
2. Tema gelap/terang persisten setelah reload.
3. Route Plan guest dan sesi malformed diarahkan ke login.
4. Login demo, pemilihan proyek, serta validasi ide pendek.
5. Buat PRD, edit/simpan, reload, salin clipboard, unduh Markdown, pindah Task/Roadmap.
6. Batal dan konfirmasi penghapusan plan.
7. Dialog referensi serta pilihan template memengaruhi isi dokumen.
8. Salin/perbesar prompt analisis lokal dan impor ringkasan codebase JSON.
9. Impor invalid dan penyimpanan rusak ditangani tanpa crash.
10. Logout kembali ke beranda dan route tidak dikenal menampilkan 404.
11. Skenario cash advance: stack pilihan tersimpan, lima pertanyaan, peta tujuh fitur, perubahan fase tersimpan, PRD memuat jawaban dan persyaratan foto/PDF.
12. Matriks route dan ukuran desktop/tablet/ponsel tanpa overflow horizontal.

## Temuan yang diperbaiki

- Redirect tujuan hilang ketika berpindah sign-in/sign-up: sekarang dipertahankan dan divalidasi origin.
- Primitive/JSON rusak pada sesi localStorage: dianggap guest, tidak membuka Plan.
- SVG logo standalone tanpa namespace XML: ditambahkan namespace; `naturalWidth > 0` diuji.
- Ilustrasi kartu terlalu kecil saat hanya SVG sumber yang dipakai: ukuran SVG dan crop mengikuti DOM referensi; stroke animasi diselesaikan menjadi ilustrasi statis.
- Perpindahan logout beradu dengan auth guard: navigasi logout sekarang tidak memicu render guest pada route Plan terlebih dahulu. Tes regresi dan suite produksi lulus.

## Belum diverifikasi / di luar mode lokal

Tidak ada login Google nyata, transaksi, aktivasi paket, panggilan model AI, atau sinkronisasi codebase ke server. Konten privat yang tidak tampak pada screenshot tidak diklaim teramati. Tautan layanan eksternal dicocokkan URL-nya, bukan dianggap aplikasi lokal yang dibangun ulang. Deployment dan pengujian pada mesin/task baru belum dilakukan.
