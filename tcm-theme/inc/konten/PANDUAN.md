# Panduan Tema TCM v4.3

Diperbarui 27 Agustus 2026. Kelanjutan dari v3.3.

## Yang diperbaiki di v4.3

Kumpulan ikon tema masih memakai gambar lama v3.3, padahal rev9 sudah memakai
versi yang digambar ulang. Ketujuh belas ikon kini diambil dari rev9 —
diperiksa piksel per piksel, dua belas ikon layanan cocok semuanya. Ikon
`i-users` yang sebelumnya dipakai templat tapi belum pernah ada definisinya
(jadi tampil kosong) sekarang ada.

Sekalian dirapikan:

| Perbaikan | Rincian |
|---|---|
| Blok Jambi di halaman Proyek | dikembalikan ke `<section>` sendiri seperti rev9 — sebelumnya kehilangan 192 px jarak atas-bawah |
| Daftar proyek di Beranda | memakai judul, klien, lokasi, dan periode versi singkat seperti rev9; empat kolom baru per proyek, boleh dikosongkan dan otomatis jatuh ke versi lengkap |

Setelah perbaikan ini, empat dari sepuluh halaman **sama persis tingginya**
dengan rev9; sisanya selisih 19–34 px karena satu baris teks membungkus
berbeda — isinya sama.

## Yang diperbaiki di v4.2

Pengalih bahasa ID/EN sebelumnya hanya muncul kalau Polylang sudah aktif, jadi
di WordPress Playground tampilannya seolah hilang. Sekarang ada **mode
pratinjau**: pengelola yang sedang login tetap bisa membuka versi Inggris lewat
`?bahasa=en` tanpa memasang Polylang. Rinciannya di bagian *Dua bahasa* di bawah.

## Yang diperbaiki di v4.1

Versi 4.0 masih memakai foto dan sebagian data bawaan dari v3.3 — termasuk
**foto Direktur versi lama**. Di v4.1 seluruhnya disamakan dengan situs
rev9 / webtcm2.netlify.app:

| Perbaikan | Rincian |
|---|---|
| **Seluruh 99 gambar** | diambil ulang dari rev9 — foto Direktur & Komisaris versi baru, foto tim kantor pusat, foto kegiatan, dan seluruh gambar sertifikat |
| **Logo huruf PACE** | Beranda dan Tentang kini memakai empat logo huruf resmi (P/A/C/E), bukan huruf yang digambar CSS |
| **14 foto proyek** | sebelumnya hanya 8 proyek punya foto; kini keempat belasnya lengkap |
| **Kartu sertifikat di Beranda** | memakai markah ringkas seperti rev9, bukan kartu besar halaman Sertifikat; ditambah kolom "Keterangan Singkat" pada tiap dokumen |
| **Urutan halaman Proyek** | blok Jambi kembali ke posisi rev9 (sesudah tiga proyek unggulan) |
| **Urutan galeri Proyek** | dua foto Area Rokan di depan, seperti rev9 |
| **Tiga berita** | ikut terpasang lewat Alat → Impor Konten TCM, jadi Beranda tidak tayang tanpa berita |
| **Tombol "Lihat Rincian Lingkup Kerja Tiap Proyek"** | ditambahkan di Beranda |
| **Data legalitas** | nomor IUJK, NIB, NPWP, dan tanggal akta disamakan dengan rev9 |

Cara memeriksanya: setiap gambar yang dipakai tema dibandingkan sidik jarinya
(MD5) dengan gambar di halaman rev9 yang bersesuaian. Sekarang **99 dari 99
gambar** berasal dari rev9.

---

## 1. Yang berubah dari v3.3

| | v3.3 | v4.0 |
|---|---|---|
| Kolom isian | 384 | **842** (755 teks + 87 gambar/video) |
| Bahasa | Indonesia saja | **Indonesia + Inggris**, satu tema, lewat Polylang |
| Video pembuka | — | **ada**, muncul di Beranda lalu menutup sendiri |
| Tema HUT ke-26 | hanya di situs statis | **ada di tema**, satu sakelar di panel |
| Blok Jambi | — | **ada** di Beranda dan halaman Proyek |
| Bagian SDM | 4 bagian | **6** — ditambah Tim di Lokasi Operasi dan Literasi AI |
| Bagan struktur grup | tiga kotak sederhana | **lengkap** — rincian kepemilikan, legenda, kalimat rantai |
| Galeri Proyek | 8 foto | **10** foto, keterangannya bisa diubah |
| Instagram | kartu manual saja | **dua mode**: kartu manual atau shortcode plugin feed |
| Formulir kontak | contoh, tidak mengirim | **dua mode**: bawaan tema atau shortcode plugin formulir |
| Templat kembar | 8 salinan ganda | **jembatan** — perbaikan cukup di satu berkas |
| Pencarian kolom | — | **kotak cari** di setiap halaman panel |
| Nomor telepon | (021) 2357 9802 | **(021) 3970 9911 / 9912 / 9913** |

---

## 2. Dua bahasa

Tema ini menyimpan isi Indonesia dan Inggris **terpisah**, di dua tempat berbeda
dalam basis data. Panel Konten Website punya tab **Indonesia** dan **English** di
bagian atas: apa yang Bapak ketik pada tab Inggris tidak menimpa yang Indonesia,
dan sebaliknya.

Teks bawaan bahasa Inggris **sudah terisi** — 717 kolom, diambil dari halaman
`/en/` situs statis yang sudah pernah disetujui. Jadi begitu Polylang dipasang,
versi Inggrisnya langsung utuh, bukan mulai dari kosong.

### Yang perlu disiapkan di Polylang

1. **Plugin → Tambah Baru → cari "Polylang" → Pasang → Aktifkan**
2. **Languages → Languages**: tambahkan **Bahasa Indonesia** (jadikan bahasa
   bawaan) lalu **English**
3. **Languages → Settings → URL modifications**: pilih *The language is set from
   the directory name in pretty permalinks* — supaya alamatnya menjadi
   `trimitraciptamandiri.com/en/…` seperti situs statis
4. **Pages**: setiap halaman Indonesia diberi terjemahannya. Buat halaman kosong
   berbahasa Inggris (About, Services, Projects, …), lalu di panel kanan pilih
   **templat** yang sama dengan versi Indonesianya, dan hubungkan sebagai
   terjemahan. Isi halamannya tidak perlu diketik — tampilannya datang dari tema
5. **Proyek dan Sertifikat**: dua tipe konten ini juga bisa diterjemahkan
   Polylang. Judul dan uraiannya perlu diisikan sendiri dalam bahasa Inggris,
   karena isinya tersimpan sebagai pos, bukan sebagai kolom panel

### Melihat versi Inggris SEBELUM Polylang dipasang

Tanpa Polylang, situs berjalan satu bahasa dan pengunjung tidak melihat
pengalih ID/EN — itu memang disengaja, karena tautannya belum ada tujuannya.

Tetapi **selama Bapak login sebagai pengelola**, pengalih ID/EN tetap muncul
dengan garis putus-putus oranye di sekelilingnya. Itu penanda *mode pratinjau*:
klik **EN** dan seluruh halaman berganti ke bahasa Inggris lewat alamat
`?bahasa=en`. Gunanya untuk memeriksa isi terjemahan sebelum Polylang dipasang.

Tiga hal yang perlu diketahui soal mode ini:

- **Pengunjung biasa tidak pernah melihatnya.** Kalau Bapak logout atau membuka
  situs dari jendela penyamaran, pengalih itu hilang
- Halaman pratinjau diberi tanda `noindex`, jadi tidak akan terindeks Google
  sekalipun alamatnya bocor
- Begitu Polylang aktif, mode pratinjau **mati sendiri** dan digantikan alamat
  `/en/…` yang sebenarnya, tanpa garis putus-putus

Isian Inggris tetap tersimpan aman apa pun keadaannya.

---

## 3. Video pembuka

**Konten Website → Beranda → Video Pembuka.**

Animasi logo 3D enam detik yang muncul saat Beranda dibuka, lalu menutup
sendiri. Pengaturannya: nyalakan/matikan, sekali per kunjungan atau setiap kali
halaman dibuka, dan berkas videonya bisa diganti dari Pustaka Media.

Pengaman yang sudah terpasang: kalau peramban menolak autoplay muncul tombol
putar; kalau berkasnya gagal dimuat lapisan langsung ditutup; kalau video tidak
jalan dalam 3,5 detik lapisan menutup sendiri; dan pengunjung yang menyetel
"kurangi gerak" atau memakai mode hemat data tidak dibebani video sama sekali.

> Saat memperagakan situs ke direktur, ubah sementara menjadi **"Setiap kali
> halaman dibuka"**, lalu kembalikan ke **"Sekali per kunjungan"** sebelum situs
> dipakai umum.

---

## 4. Tema HUT ke-26

**Konten Website → Umum & Kaki Halaman → Tema HUT ke-26.**

Satu pilihan menyalakan seluruh hiasan sekaligus: pita pengumuman di atas menu,
lambang 26 di samping logo, aksen warna emas, bagian khusus di Beranda, dan
angka "25+ Tahun Pengalaman" berubah menjadi "26".

Dinyalakan menjelang 8 November 2026, dimatikan lagi setelah acara selesai.
Semua tulisannya bisa diubah dari panel yang sama.

---

## 5. Instagram — dua mode

**Konten Website → Beranda → Instagram TCM.**

| Mode | Cara kerja | Syarat |
|---|---|---|
| **Kartu manual** | Unggah gambar dan tempel tautannya sendiri | tidak ada |
| **Plugin feed** | Postingan dan Reels ditarik otomatis | akun TCM harus **Bisnis atau Kreator** |

Untuk mode plugin: pasang plugin feed Instagram (mis. *Instagram Feed* dari
Smash Balloon — versi gratisnya sudah mendukung Reels), sambungkan akun TCM di
pengaturan plugin, lalu salin shortcode-nya ke kolom **Shortcode plugin feed**
dan ubah **Sumber tampilan** menjadi *Plugin feed*.

**Kalau shortcode-nya salah atau pluginnya belum aktif, situs otomatis kembali
ke kartu manual** dan hanya pengelola yang melihat catatan penyebabnya —
pengunjung tidak pernah melihat bagian kosong.

> Meta menutup API akun pribadi pada 4 Desember 2024. Tanpa akun Bisnis/Kreator,
> feed otomatis tidak mungkin — dan token aksesnya perlu diperpanjang berkala.

---

## 6. Formulir kontak — WAJIB dibaca sebelum go-live

Formulir bawaan tema **tidak mengirim apa pun**. Itu formulir contoh dari masa
prototipe: pesan yang diketik pengunjung hilang begitu saja.

Sebelum situs dipakai umum:

1. **Plugin → Tambah Baru**, pasang salah satu: *WPForms Lite*, *Fluent Forms*,
   atau *Contact Form 7*
2. Buat satu formulir, atur tujuan surelnya ke `tcm@trimitraciptamandiri.com`
3. Salin shortcode-nya, tempel di **Konten Website → Kontak → Shortcode plugin
   formulir**
4. Ubah **Formulir yang dipakai** menjadi *Plugin formulir*
5. **Uji kirim satu pesan** dan pastikan masuk ke kotak surel perusahaan

---

## 7. Cara memasang

1. **Tampilan → Tema → Tambah Tema Baru → Unggah Tema**
2. Pilih `tcm-theme-v4.0.zip` → **Pasang Sekarang** → **Aktifkan**
3. Kalau v3.3 masih terpasang, hapus dulu (WordPress tidak mau menimpa tema
   dengan nama folder sama). Seluruh isian, proyek, sertifikat, berita, dan
   gambar **tidak ikut terhapus** — semuanya tersimpan di basis data
4. **Alat → Impor Konten TCM** → *Impor sekarang*, lalu *Pasang gambar*
   (hanya sekali, saat pemasangan pertama)

> Cobalah dulu di <https://playground.wordpress.net> atau di Local, jangan
> langsung di situs asli.

---

## 8. Isi menu Konten Website

| Submenu | Kolom |
|---|--:|
| Beranda | 255 |
| Tentang Kami | 94 |
| Layanan | 93 |
| Proyek | 117 |
| Sertifikat | 27 |
| ESG | 29 |
| Kontak | 42 |
| Karier | 28 |
| SDM & Human Capital | 58 |
| Kebijakan | 45 |
| Berita | 6 |
| Umum & Kaki Halaman | 48 |

Kotak **Cari kolom** di atas setiap halaman menyaring kolom sesuai kata yang
diketik — ketik "telepon", "alamat", atau "tombol" untuk langsung menemukannya.
Tekan Esc untuk mengosongkan pencarian.

---

## 9. Yang masih sengaja tidak bisa diubah dari panel

| Bagian | Alasan |
|---|---|
| Tata letak, warna, huruf | itulah gunanya tema — supaya tampilan tidak rusak |
| Posisi titik pada peta jangkauan | terikat koordinat gambar peta (namanya bisa diubah) |
| Panjang batang warna pada bagan kepemilikan | angka persennya bisa diubah, panjang batangnya mengikuti tema |
| Ikon dan warna aksen tiap layanan | bagian dari rancangan visual |
| Isi berita | ditulis lewat menu Berita, bukan panel |
| Daftar proyek & sertifikat | punya menunya sendiri |

---

## 10. Untuk arsip — cara kerjanya di kode

```php
<h1><?php tcm_kaya( 'beranda', 'hero_judul' ); ?></h1>
<p class="sub"><?php tcm_teks( 'beranda', 'hero_sub' ); ?></p>
<img src="<?php tcm_gambar( 'beranda', 'foto_sampul', 'assets/img/operasi.jpg' ); ?>" alt="…">
```

| Fungsi | Untuk |
|---|---|
| `tcm_teks( $halaman, $kunci )` | teks biasa, di-escape penuh |
| `tcm_kaya( $halaman, $kunci )` | teks yang boleh ada `<em> <b> <br>` |
| `tcm_html( $halaman, $kunci )` | isi editor teks kaya |
| `tcm_gambar( $halaman, $kunci, $cadangan )` | alamat gambar, dengan berkas tema sebagai cadangan |
| `tcm_kwt_nilai( $halaman, $kunci )` | ambil nilainya tanpa dicetak |
| `tcm_bahasa()` | `'id'` atau `'en'` — bahasa yang sedang berlaku |
| `tcm_dwibahasa()` | benar kalau Polylang aktif dengan lebih dari satu bahasa |
| `tcm_hut_nyala()` | benar kalau tema HUT sedang menyala |
| `tcm_ig_sumber()` / `tcm_form_sumber()` | mode Instagram dan formulir, lengkap dengan jalan mundurnya |

Berkas yang berubah di v4.0:

```
tcm-theme/
  bagian/jambi.php              blok Pengalaman Jambi        (BARU)
  bagian/lambang-hut.php        lambang angka 26             (BARU)
  assets/css/hut26.css          tema HUT                     (BARU)
  assets/css/tambahan-v4.css    gaya bagian-bagian baru      (BARU)
  assets/css/video-popup.css    video pembuka                (BARU)
  assets/js/video-popup.js      video pembuka                (BARU)
  assets/video/                 berkas video + poster        (BARU)
  seed/konten-en.json           717 teks bahasa Inggris      (BARU)
  inc/konten/skema.php          842 kolom
  inc/konten/panel.php          tab bahasa, pencarian, tipe kolom video
  inc/konten/admin.js           penyaring kolom, pemilih video
  functions.php                 Polylang, HUT, video, mode Instagram & formulir
  header.php footer.php         pengalih bahasa, isian panel
  page-*.php                    delapan templat kembar jadi jembatan
```

---

## 11. Apa saja yang sudah diuji

Tema ini dijalankan di lingkungan tiruan WordPress — bukan sekadar diperiksa
sintaksnya. Setiap templat benar-benar dirender, hasilnya disimpan sebagai HTML,
lalu dibandingkan kalimat per kalimat dengan situs statis rev9.

| Pemeriksaan | Hasil |
|---|---|
| 22 templat dirender, 11 keadaan berbeda | 0 galat, 0 peringatan |
| `php -l` seluruh berkas PHP | bersih |
| `node --check` seluruh berkas JS | bersih |
| Isi halaman Indonesia vs situs statis rev9 | sama, selain bagian yang memang baru |
| Isi halaman Inggris vs halaman `/en/` statis | sama, selain judul proyek & sertifikat yang diterjemahkan lewat Polylang |
| Video pembuka: tampil, menutup sendiri, dilewati, sesi kedua | benar |
| Instagram: manual / plugin ada / plugin tidak ada | benar, jalan mundurnya bekerja |
| Formulir: bawaan / plugin ada / plugin tidak ada | benar |
| Tema HUT: menyala dan mati | benar |
| Delapan templat jembatan | keluarannya sama persis dengan induknya |
| Tampilan diperiksa lewat tangkapan layar | sesuai rancangan |

**Belum diuji di WordPress sungguhan.** Lingkungan kerja tempat tema ini disusun
tidak bisa mengunduh WordPress. Mohon dicoba dulu di Playground atau Local
sebelum diunggah ke situs asli.
