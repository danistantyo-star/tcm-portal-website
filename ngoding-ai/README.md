# Ngoding Pake AI — rekonstruksi lokal

Aplikasi React + TypeScript yang mengikuti halaman publik ngodingpakeai.com dan screenshot alur Plan yang diberikan pengguna. Proyek terpisah dari `../netlify-site` dan `../tcm-theme`; keduanya tidak diubah.

## Buka langsung tanpa instalasi

Paket mandiri tersedia sebagai `downloads/Ngoding-AI.zip`. Ekstrak, lalu buka `Ngoding-AI.html` di Chrome. Semua font, gambar, CSS, dan JavaScript tertanam di satu file. Navigasi lokal memakai hash; data demo disimpan di browser. File ini tidak membutuhkan server localhost atau Node.js.

Untuk membuat ulang: `npm run build:offline`. Pengujian `tests/offline.py` menjalankan beranda → login demo → ide → teknologi → pertanyaan → peta fitur → PRD, reload, dan unduhan Markdown, tanpa permintaan jaringan eksternal. Pengujian browser cloud memakai server fixture internal karena kebijakan browser cloud memblokir URL file; pembukaan file langsung memakai dukungan file HTML standar pada browser pengguna.

## Jalankan

Prasyarat: Node.js 24 dan npm. Dependency dikunci di `package-lock.json`.

```sh
cd /workspace/tcm-portal-website/ngoding-ai
npm ci
npm run dev -- --port 5173
```

Buka aplikasi melalui server pengembangan. Masuk ke **Log in → Coba demo lokal** untuk mencoba Plan tanpa akun Google. Tidak perlu API key untuk mode ini.

```sh
npm run build
npm run preview -- --port 4173
```

Hasil produksi berada di `dist/`. Untuk hosting statis, arahkan route yang tidak menunjuk file ke `index.html`, agar route langsung seperti `/plan` dan `/templates/saas-template` tetap berjalan. Jangan mengubah publish directory situs TCM tanpa keputusan terpisah.

## Halaman dan perilaku

- `/`: empat kartu layanan, ilustrasi dari referensi, promo, statistik snapshot, tema gelap/terang yang persisten.
- `/sign-in`, `/sign-up`: tampilan autentikasi publik; akun demo lokal dengan redirect internal yang tervalidasi.
- `/pricing`: periode bulanan, tiga bulanan, tahunan, beserta harga dan paket yang diamati.
- `/templates`: empat template, pilihan Bikin plan atau Prompt install, serta detail `/templates/:slug` dengan tab dan galeri.
- `/plan`: pemilihan Proyek baru atau Proyek eksisting sesuai screenshot.
- `/plan?flow=new`: kolom ide, pencatatan URL referensi, dan pemilihan template. Submit membuat draf yang persisten.
- `/plans/:id?step=2`: preferensi teknologi otomatis/demo atau stack pilihan pengguna.
- `/plans/:id?step=3`: lima pertanyaan dengan jawaban teks/chip, pilihan kustom, skip/resume, dan validasi progres.
- `/plans/:id?step=4`: peta fitur bercabang dengan fase/subfitur, pan/zoom/fit, serta editor fitur.
- `/plans/:id?step=5`: hasil PRD, Task, dan Roadmap dari ide, jawaban, stack, dan fitur yang ditinjau.
- `/plan?flow=existing`: prompt analisis lokal yang dapat disalin/diperbesar; impor `plan-summary.json` dari agent.
- `/plan?view=history`: membuka dokumen yang disimpan, mengedit Markdown, menyalin, mengunduh `.md`, dan menghapus dengan konfirmasi.

Plan dan sesi demo disimpan di localStorage pada browser/origin yang sama. Mode ini ditujukan untuk pengembangan dan demonstrasi; tidak menjadi sistem autentikasi atau penyimpanan multiuser.

## Pengujian

```sh
npm test             # 8 pengujian model dokumen dan penyimpanan, Node test runner
npm run typecheck
npm run build
# Jalankan server sebelum E2E.
npm run test:e2e     # 12 skenario browser; termasuk matriks 390/768/1440px
BASE_URL=http://127.0.0.1:4173 npm run test:e2e
```

E2E memakai Python 3.12, paket `playwright`, dan `/usr/bin/chromium`, yang tersedia di cloud environment ini. Untuk mesin lain, sediakan Python Playwright dan sesuaikan executable Chromium pada `tests/e2e.py`. Tidak ada login eksternal atau pembelian yang dilakukan oleh tes.

Tes mencakup navigasi, validasi sesi, tema persisten, pembuatan/pengeditan/pemulihan dokumen, clipboard, unduhan, penghapusan, referensi, template, impor JSON valid/tidak valid, route 404, dan responsivitas. Bukti tambahan pengujian akun/harga (54 pemeriksaan) serta template ada di `research/`. Pengujian wizard tambahan (35 pemeriksaan) ada di `research/wizard-tests.md`; peta fitur di `research/feature-map-tests.md`. Hasil produksi dan screenshot lokal tersimpan di `research/local/`.

## Contoh cash advance

Masukkan ide tracking cash advance dengan foto struk/invoice dan lampiran PDF. Alur teknologi → klarifikasi → peta fitur → dokumen menghasilkan rancangan `Lapor Cash Advance`: pencatatan dari bukti foto, lampiran, riwayat, persetujuan, hak akses, dan pengingat. PRD menyebut verifikasi hasil OCR, nominal/tanggal/merchant, saldo, rekap PDF, dan foto lampiran. Ini rancangan dalam aplikasi pembuat PRD; fitur OCR dan laporan PDF tersebut belum menjadi layanan expense yang dieksekusi oleh aplikasi ini.

## Batas implementasi

- Generator PRD lokal memakai template terstruktur, **bukan model AI**. UI menyatakan mode demo. Tidak ada API key atau rahasia yang ditanam di frontend.
- Google OAuth, pembayaran, langganan nyata, dan backend AI belum terhubung. Tombol terkait memberikan pesan yang sesuai; tidak mengirim kredensial atau melakukan transaksi.
- DesainPakeAI dan AndalAI tetap membuka layanan eksternal seperti situs aslinya. Keduanya bukan aplikasi lokal tambahan.
- Prompt proyek eksisting dibuat khusus untuk analisis lokal dan impor ringkasan; tidak meniru token bootstrap atau menjalankan CLI/sinkronisasi server asli. Jangan memasukkan rahasia ke file ringkasan.
- URL referensi disimpan ke dokumen sebagai referensi yang belum diverifikasi; isi URL tidak diambil atau diklaim telah dianalisis. Input suara belum tersedia dan menampilkan penjelasan.
- Statistik pengguna/download, harga, dan fitur publik merupakan snapshot observasi, bukan statistik penggunaan aplikasi lokal atau jaminan harga terkini.

## Bukti dan sumber

Inspeksi menggunakan skill `reverse-engineer-anything` melalui CLI REA 6.5.0 dan browser Chromium dengan proxy cloud serta TLS terverifikasi. Rincian observasi, asumsi, dan keterbatasan ada di [`research/RECONSTRUCTION.md`](research/RECONSTRUCTION.md).

Font, logo, ilustrasi, dan screenshot template diambil dari aset publik yang dimuat oleh situs referensi untuk rekonstruksi yang diminta. Sumber asal tercatat di `public/reference/PROVENANCE.md`; file tersebut bukan pernyataan kepemilikan merek/aset oleh pembuat rekonstruksi.
