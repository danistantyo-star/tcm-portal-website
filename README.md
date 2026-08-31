# TCM Portal Website — PT Trimitra Cipta Mandiri

Repositori website PT Trimitra Cipta Mandiri: paket deploy statis untuk Netlify
dan tema WordPress.

## Struktur

| Folder | Isi |
|---|---|
| `netlify-site/` | Situs statis siap deploy ke Netlify — halaman portal (animasi welcome + scroll zoom) dengan website utama di `netlify-site/web/` |
| `tcm-theme/` | Tema WordPress v4.4.0 (source ter-extract) |

## Deploy ke Netlify

Hubungkan repositori ini ke Netlify dan atur:

- **Base directory / Publish directory**: `netlify-site`
- Tanpa build command (situs statis murni).

Urutan yang dilihat pengunjung: popup video logo TCM (6 detik, menutup sendiri,
sekali per sesi peramban) → halaman portal "Welcome to Trimitra Cipta Mandiri" →
scroll masuk ke website utama.

## Catatan revisi terakhir (rev10, 31 Agustus 2026)

Popup video pembuka dipindah ke `netlify-site/index.html` (halaman portal, root).
Sebelumnya popup hanya terpasang di `web/index.html` yang dimuat sebagai iframe
tersembunyi di belakang portal, sehingga video berputar tanpa pernah terlihat
lalu menandai sesi "sudah tampil". Popup di dalam iframe otomatis tidak tampil
dobel karena penanda sessionStorage dibagi antar halaman se-origin.

Detail perilaku popup: lihat `netlify-site/web/CATATAN_POPUP_VIDEO.txt`.

## Tema WordPress

Untuk dipasang di WordPress, zip-kan isi folder `tcm-theme/` lalu unggah lewat
Tampilan → Tema → Tambah Baru → Unggah Tema.

Alat bantu video pembuka di tema (sambil login sebagai admin):

- `?intro=cek` — kotak diagnosa yang memeriksa semua syarat tampilnya video
- `?intro=1` — memaksa video pembuka tampil sekali lagi

Catatan: di WordPress Playground video pembuka tidak dapat diputar (Playground
tidak melayani permintaan HTTP Range untuk berkas video); popup akan menampilkan
poster sebentar lalu menutup sendiri. Uji fitur ini di hosting sungguhan.
