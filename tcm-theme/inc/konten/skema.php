<?php
/**
 * Daftar seluruh kolom isian, dikelompokkan per halaman.
 *
 * DIBUAT OTOMATIS dari isi tema TCM v3.1 — nilai bawaannya diambil persis
 * dari teks yang sudah ada di tema, jadi tampilan situs tidak berubah
 * sedikit pun sebelum ada yang mengeditnya.
 *
 * Tipe: text | textarea | kaya (boleh <em> <b> <br>) | editor | url | email |
 *       telepon | gambar | pilihan | info (bukan isian, hanya catatan)
 * Peran hanya memengaruhi kotak Pratinjau, bukan situs.
 *
 * @package tcm-konten-web
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function tcm_kwt_skema() {
	return array(

		'beranda' => array(
			'menu'    => 'Beranda',
			'judul'   => 'Konten Beranda',
			'bagian' => array(

				'tombol_proyek' => array(
					'judul'       => 'Tombol ke Halaman Proyek',
					'kolom'      => array(
						'proyek_tombol' => array( 'label' => 'Tulisan tombol di bawah daftar proyek', 'tipe' => 'text', 'bawaan' => 'Lihat Rincian Lingkup Kerja Tiap Proyek', 'peran' => 'tombol' ),
					),
				),

				'pace_logo' => array(
					'judul'       => 'Logo Huruf PACE',
					'keterangan'  => 'Empat logo huruf P, A, C, E versi resmi holding — bukan huruf yang digambar CSS.',
					'kolom'      => array(
						'pace1_logo' => array( 'label' => 'PACE 1 — logo huruf', 'tipe' => 'gambar', 'bawaan' => '', 'bantuan' => 'Logo huruf resmi PACE dari holding RAJA Group. Kosongkan untuk memakai berkas bawaan tema.' ),
						'pace2_logo' => array( 'label' => 'PACE 2 — logo huruf', 'tipe' => 'gambar', 'bawaan' => '' ),
						'pace3_logo' => array( 'label' => 'PACE 3 — logo huruf', 'tipe' => 'gambar', 'bawaan' => '' ),
						'pace4_logo' => array( 'label' => 'PACE 4 — logo huruf', 'tipe' => 'gambar', 'bawaan' => '' ),
					),
				),

				'pace_nilai' => array(
					'judul'       => 'Empat Nilai PACE',
					'keterangan'  => 'Nama, terjemahan, dan uraian empat nilai PACE di Beranda. Nama nilainya ditetapkan holding RAJA Group — kolom ini terutama disediakan agar teksnya bisa diterjemahkan ke bahasa Inggris.',
					'kolom'      => array(
						'pace1_nama' => array( 'label' => 'PACE 1 — nama nilai', 'tipe' => 'text', 'bawaan' => 'Performance Excellence', 'peran' => 'judul' ),
						'pace1_sub' => array( 'label' => 'PACE 1 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Keunggulan & Efisiensi Operasional', 'peran' => 'label' ),
						'pace1_teks' => array( 'label' => 'PACE 1 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Mengejar keunggulan operasional agar setiap pekerjaan berjalan efektif dan efisien, dengan hasil bermutu tinggi di seluruh lini.', 'peran' => 'teks' ),
						'pace2_nama' => array( 'label' => 'PACE 2 — nama nilai', 'tipe' => 'text', 'bawaan' => 'Adaptive Agility', 'peran' => 'judul' ),
						'pace2_sub' => array( 'label' => 'PACE 2 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Kelincahan & Adaptasi terhadap Perubahan', 'peran' => 'label' ),
						'pace2_teks' => array( 'label' => 'PACE 2 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Menumbuhkan pola pikir berkembang agar mampu menyesuaikan diri terhadap tantangan baru dan mempercepat inovasi.', 'peran' => 'teks' ),
						'pace3_nama' => array( 'label' => 'PACE 3 — nama nilai', 'tipe' => 'text', 'bawaan' => 'Customer-Centric Mindset', 'peran' => 'judul' ),
						'pace3_sub' => array( 'label' => 'PACE 3 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Orientasi & Fokus pada Pelanggan', 'peran' => 'label' ),
						'pace3_teks' => array( 'label' => 'PACE 3 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Memahami harapan pelanggan, memberi nilai secara konsisten, dan membangun hubungan kerja sama jangka panjang.', 'peran' => 'teks' ),
						'pace4_nama' => array( 'label' => 'PACE 4 — nama nilai', 'tipe' => 'text', 'bawaan' => 'Empowered Collaboration & Synergy', 'peran' => 'judul' ),
						'pace4_sub' => array( 'label' => 'PACE 4 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Kolaborasi & Sinergi Lintas Unit RAJA Group', 'peran' => 'label' ),
						'pace4_teks' => array( 'label' => 'PACE 4 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Meruntuhkan sekat antarunit sehingga koordinasi dan kolaborasi di seluruh RAJA Group berjalan mulus dan saling menguatkan.', 'peran' => 'teks' ),
					),
				),

				'label_beranda' => array(
					'judul'       => 'Label & Tombol di Beranda',
					'keterangan'  => 'Tulisan pada tombol penyaring proyek, tab kelompok sertifikat, dan keterangan foto galeri serta foto penghargaan.',
					'kolom'      => array(
						'gal_cap1' => array( 'label' => 'Galeri 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Welding Services' ),
						'gal_cap2' => array( 'label' => 'Galeri 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Mechanical & Valve' ),
						'gal_cap3' => array( 'label' => 'Galeri 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Shut Down Turn Around' ),
						'gal_cap4' => array( 'label' => 'Galeri 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Fabrikasi & Instalasi' ),
						'gal_cap5' => array( 'label' => 'Galeri 5 — keterangan', 'tipe' => 'text', 'bawaan' => 'Heat Exchanger Cleaning' ),
						'gal_cap6' => array( 'label' => 'Galeri 6 — keterangan', 'tipe' => 'text', 'bawaan' => 'Road Repair & Maintenance' ),
						'filt1' => array( 'label' => 'Tombol saring 1', 'tipe' => 'text', 'bawaan' => 'Semua', 'peran' => 'tombol' ),
						'filt2' => array( 'label' => 'Tombol saring 2', 'tipe' => 'text', 'bawaan' => 'Panas Bumi', 'peran' => 'tombol' ),
						'filt3' => array( 'label' => 'Tombol saring 3', 'tipe' => 'text', 'bawaan' => 'Minyak & Gas', 'peran' => 'tombol' ),
						'filt4' => array( 'label' => 'Tombol saring 4', 'tipe' => 'text', 'bawaan' => 'Konstruksi & Sipil', 'peran' => 'tombol' ),
						'tab1' => array( 'label' => 'Tab sertifikat 1', 'tipe' => 'text', 'bawaan' => 'Sertifikasi ISO & SMK3', 'peran' => 'tombol' ),
						'tab2' => array( 'label' => 'Tab sertifikat 2', 'tipe' => 'text', 'bawaan' => 'CSMS & Pra-Kualifikasi', 'peran' => 'tombol' ),
						'tab3' => array( 'label' => 'Tab sertifikat 3', 'tipe' => 'text', 'bawaan' => 'Penghargaan', 'peran' => 'tombol' ),
						'tab4' => array( 'label' => 'Tab sertifikat 4', 'tipe' => 'text', 'bawaan' => 'Izin Usaha & Legalitas', 'peran' => 'tombol' ),
						'awfoto1_judul' => array( 'label' => 'Foto penghargaan 1 — judul', 'tipe' => 'text', 'bawaan' => 'Penghargaan HSE', 'peran' => 'judul' ),
						'aw1_ket' => array( 'label' => 'Foto penghargaan 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Star Energy Geothermal Salak · 21 Oktober 2025', 'peran' => 'label' ),
						'awfoto2_judul' => array( 'label' => 'Foto penghargaan 2 — judul', 'tipe' => 'text', 'bawaan' => 'Penghargaan CSR', 'peran' => 'judul' ),
						'aw2_ket' => array( 'label' => 'Foto penghargaan 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'CSMS Forum · Star Energy Geothermal Salak', 'peran' => 'label' ),
						'berita_baca' => array( 'label' => 'Tulisan tautan baca berita', 'tipe' => 'text', 'bawaan' => 'Baca selengkapnya', 'peran' => 'tombol' ),
					),
				),

				'peta_penanda' => array(
					'judul'       => 'Nama Penanda pada Peta',
					'keterangan'  => 'Nama dan keterangan titik operasi pada peta Indonesia. Posisi titiknya tetap diatur tema karena terikat koordinat gambar peta.',
					'kolom'      => array(
						'mk1_nama' => array( 'label' => 'Penanda 1 — nama', 'tipe' => 'text', 'bawaan' => 'Area Rokan', 'peran' => 'judul' ),
						'mk1_ket' => array( 'label' => 'Penanda 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Riau — fasilitas minyak bumi', 'peran' => 'label' ),
						'mk2_nama' => array( 'label' => 'Penanda 2 — nama', 'tipe' => 'text', 'bawaan' => 'Cilegon', 'peran' => 'judul' ),
						'mk2_ket' => array( 'label' => 'Penanda 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Banten — kompresor gas', 'peran' => 'label' ),
						'mk3_nama' => array( 'label' => 'Penanda 3 — nama', 'tipe' => 'text', 'bawaan' => 'Tambun–Tegal Gede', 'peran' => 'judul' ),
						'mk3_ket' => array( 'label' => 'Penanda 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Bekasi — pipa gas', 'peran' => 'label' ),
						'mk4_nama' => array( 'label' => 'Penanda 4 — nama', 'tipe' => 'text', 'bawaan' => 'Gunung Salak', 'peran' => 'judul' ),
						'mk4_ket' => array( 'label' => 'Penanda 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Sukabumi — pembangkit panas bumi', 'peran' => 'label' ),
						'mk5_nama' => array( 'label' => 'Penanda 5 — nama', 'tipe' => 'text', 'bawaan' => 'Wayang Windu', 'peran' => 'judul' ),
						'mk5_ket' => array( 'label' => 'Penanda 5 — keterangan', 'tipe' => 'text', 'bawaan' => 'Bandung Barat — pembangkit panas bumi', 'peran' => 'label' ),
						'mk6_nama' => array( 'label' => 'Penanda 6 — nama', 'tipe' => 'text', 'bawaan' => 'Gresik', 'peran' => 'judul' ),
						'mk6_ket' => array( 'label' => 'Penanda 6 — keterangan', 'tipe' => 'text', 'bawaan' => 'Jawa Timur — pipa gas', 'peran' => 'label' ),
						'mk7_nama' => array( 'label' => 'Penanda 7 — nama', 'tipe' => 'text', 'bawaan' => 'Kantor Pusat', 'peran' => 'judul' ),
						'mk7_ket' => array( 'label' => 'Penanda 7 — keterangan', 'tipe' => 'text', 'bawaan' => 'Graha Iskandarsyah, Jakarta Selatan', 'peran' => 'label' ),
					),
				),

				'klien_nama' => array(
					'judul'       => 'Nama & Keterangan Klien',
					'keterangan'  => 'Nama sepuluh klien dan mitra beserta keterangannya. Logonya diatur di bagian Logo Klien.',
					'kolom'      => array(
						'kli1_nama' => array( 'label' => 'Klien 1 — nama', 'tipe' => 'text', 'bawaan' => 'Star Energy Geothermal', 'peran' => 'judul' ),
						'kli1_ket' => array( 'label' => 'Klien 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Salak · Salak Pratama · Wayang Windu', 'peran' => 'label', 'bantuan' => 'Kosongkan namanya untuk menyembunyikan klien ini dari dinding logo.' ),
						'kli2_nama' => array( 'label' => 'Klien 2 — nama', 'tipe' => 'text', 'bawaan' => 'PT Triguna Internusa Pratama', 'peran' => 'judul' ),
						'kli2_ket' => array( 'label' => 'Klien 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Induk operasional — Rukun Raharja', 'peran' => 'label' ),
						'kli3_nama' => array( 'label' => 'Klien 3 — nama', 'tipe' => 'text', 'bawaan' => 'PT Pertamina Gas', 'peran' => 'judul' ),
						'kli3_ket' => array( 'label' => 'Klien 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Fasilitas penyaluran gas bumi', 'peran' => 'label' ),
						'kli4_nama' => array( 'label' => 'Klien 4 — nama', 'tipe' => 'text', 'bawaan' => 'PT PLN (Persero)', 'peran' => 'judul' ),
						'kli4_ket' => array( 'label' => 'Klien 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Pembangkit listrik & rock muffler', 'peran' => 'label' ),
						'kli5_nama' => array( 'label' => 'Klien 5 — nama', 'tipe' => 'text', 'bawaan' => 'PLN Indonesia Power', 'peran' => 'judul' ),
						'kli5_ket' => array( 'label' => 'Klien 5 — keterangan', 'tipe' => 'text', 'bawaan' => 'Fasilitas pembangkit Gunung Salak', 'peran' => 'label' ),
						'kli6_nama' => array( 'label' => 'Klien 6 — nama', 'tipe' => 'text', 'bawaan' => 'PT Energasindo Heksa Karya', 'peran' => 'judul' ),
						'kli6_ket' => array( 'label' => 'Klien 6 — keterangan', 'tipe' => 'text', 'bawaan' => 'Fasilitas penyalur gas, Jambi', 'peran' => 'label' ),
						'kli7_nama' => array( 'label' => 'Klien 7 — nama', 'tipe' => 'text', 'bawaan' => 'PT Transportasi Gas Indonesia', 'peran' => 'judul' ),
						'kli7_ket' => array( 'label' => 'Klien 7 — keterangan', 'tipe' => 'text', 'bawaan' => 'Pra-kualifikasi CSMS', 'peran' => 'label' ),
						'kli8_nama' => array( 'label' => 'Klien 8 — nama', 'tipe' => 'text', 'bawaan' => 'PT Daya Mas Cisolok Geothermal', 'peran' => 'judul' ),
						'kli8_ket' => array( 'label' => 'Klien 8 — keterangan', 'tipe' => 'text', 'bawaan' => 'Pengembangan panas bumi Cisolok', 'peran' => 'label' ),
						'kli9_nama' => array( 'label' => 'Klien 9 — nama', 'tipe' => 'text', 'bawaan' => 'PT Trakindo Utama', 'peran' => 'judul' ),
						'kli9_ket' => array( 'label' => 'Klien 9 — keterangan', 'tipe' => 'text', 'bawaan' => 'Kemitraan perawatan mesin diesel', 'peran' => 'label' ),
						'kli10_nama' => array( 'label' => 'Klien 10 — nama', 'tipe' => 'text', 'bawaan' => 'PT Artifisial Teknologi Persada', 'peran' => 'judul' ),
						'kli10_ket' => array( 'label' => 'Klien 10 — keterangan', 'tipe' => 'text', 'bawaan' => 'Mitra grup — RAJA Group', 'peran' => 'label' ),
					),
				),

				'video_pembuka' => array(
					'judul'       => 'Video Pembuka',
					'keterangan'  => 'Animasi logo yang muncul sekilas saat Beranda dibuka, lalu menutup sendiri.',
					'kolom'      => array(
						'vid_aktif' => array( 'label' => 'Tampilkan video pembuka?', 'tipe' => 'pilihan', 'bawaan' => 'tampil', 'pilihan' => array( 'tampil' => 'Ya, tampilkan', 'sembunyi' => 'Tidak, matikan' ) ),
						'vid_ulang' => array( 'label' => 'Seberapa sering muncul', 'tipe' => 'pilihan', 'bawaan' => 'sesi', 'pilihan' => array( 'sesi' => 'Sekali per kunjungan (dianjurkan)', 'selalu' => 'Setiap kali halaman dibuka' ), 'bantuan' => 'Pilih "setiap kali" hanya saat memperagakan situs; kembalikan ke "sekali per kunjungan" sebelum situs dipakai umum.' ),
						'vid_berkas' => array( 'label' => 'Berkas video', 'tipe' => 'video', 'bawaan' => '', 'pratinjau' => 'assets/video/tcmlogo3d1080p.mp4', 'bantuan' => 'Kosongkan untuk memakai animasi logo bawaan tema. Sebaiknya video pendek tanpa suara, di bawah 10 detik dan 5 MB.' ),
						'vid_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Video pembuka hanya muncul di Beranda. Pengunjung selalu bisa melewatinya lewat tombol Lewati, tombol Esc, atau klik latar. Kalau berkasnya gagal dimuat, lapisan menutup sendiri supaya pengunjung tidak terkurung.' ),
					),
				),

				'sampul' => array(
					'judul'       => 'Sampul Depan',
					'keterangan'  => 'Bagian paling atas beranda.',
					'kolom'      => array(
						'hero_badge' => array( 'label' => 'Label kecil di atas judul', 'tipe' => 'text', 'bawaan' => 'MEMBER OF RUKUN RAHARJA TBK', 'peran' => 'label' ),
						'hero_judul' => array( 'label' => 'Judul utama', 'tipe' => 'kaya', 'bawaan' => 'Menjaga Keandalan <em>Energi</em> Indonesia', 'peran' => 'judul', 'bantuan' => 'Kata di dalam <em>…</em> tampil dengan warna aksen. Sebaiknya di bawah 70 karakter.' ),
						'hero_sub' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Jasa operasi, pemeliharaan, dan penunjang fasilitas minyak & gas bumi, panas bumi, serta pembangkit listrik — dengan standar keselamatan tanpa kompromi.', 'peran' => 'subjudul' ),
						'hero_tombol1' => array( 'label' => 'Tombol utama', 'tipe' => 'text', 'bawaan' => 'Lihat Layanan Kami', 'peran' => 'tombol' ),
						'hero_tombol2' => array( 'label' => 'Tombol kedua', 'tipe' => 'text', 'bawaan' => 'Hubungi Kami', 'peran' => 'tombol' ),
					),
				),

				'angka' => array(
					'judul'       => 'Angka Kunci',
					'keterangan'  => 'Empat angka berjajar di bawah sampul.',
					'kolom'      => array(
						'angka1_nilai' => array( 'label' => 'Angka 1 — nilai', 'tipe' => 'text', 'bawaan' => '25', 'peran' => 'nilai' ),
						'angka1_akhiran' => array( 'label' => 'Angka 1 — akhiran', 'tipe' => 'text', 'bawaan' => '+' ),
						'angka1_label' => array( 'label' => 'Angka 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Tahun Pengalaman', 'peran' => 'label' ),
						'angka1_kecil' => array( 'label' => 'Angka 1 — baris kecil', 'tipe' => 'text', 'bawaan' => 'Sejak 8 November 2000' ),
						'angka2_nilai' => array( 'label' => 'Angka 2 — nilai', 'tipe' => 'text', 'bawaan' => '256', 'peran' => 'nilai', 'bantuan' => 'Jumlah personel — perbarui kalau berubah.' ),
						'angka2_label' => array( 'label' => 'Angka 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Personel Profesional', 'peran' => 'label' ),
						'angka2_kecil' => array( 'label' => 'Angka 2 — baris kecil', 'tipe' => 'text', 'bawaan' => 'Tersebar di 4 wilayah kerja' ),
						'angka3_nilai' => array( 'label' => 'Angka 3 — nilai', 'tipe' => 'text', 'bawaan' => '7', 'peran' => 'nilai' ),
						'angka3_label' => array( 'label' => 'Angka 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Titik Operasi Nasional', 'peran' => 'label' ),
						'angka3_kecil' => array( 'label' => 'Angka 3 — baris kecil', 'tipe' => 'text', 'bawaan' => 'Sumatera hingga Jawa Timur' ),
						'angka4_nilai' => array( 'label' => 'Angka 4 — nilai', 'tipe' => 'text', 'bawaan' => '17', 'peran' => 'nilai' ),
						'angka4_label' => array( 'label' => 'Angka 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Sertifikasi & Penghargaan', 'peran' => 'label' ),
						'angka4_kecil' => array( 'label' => 'Angka 4 — baris kecil', 'tipe' => 'text', 'bawaan' => 'ISO, SMK3, CSMS & award klien' ),
					),
				),

				'tentang' => array(
					'judul'       => 'Blok Tentang Kami',
					'kolom'      => array(
						'tentang_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Tentang Kami', 'peran' => 'label' ),
						'tentang_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Mitra Terpercaya <em>Sektor Energi</em>', 'peran' => 'judul' ),
						'tentang_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'PT Trimitra Cipta Mandiri berdiri sejak tahun 2000 sebagai perusahaan jasa penunjang minyak dan gas bumi. Sejak bergabung dengan Rukun Raharja Group pada 2011, kami terus berkembang hingga kini dipercaya menangani fasilitas energi berskala besar di seluruh Indonesia.', 'peran' => 'teks' ),
						'tentang_tag_judul' => array( 'label' => 'Label pada foto — judul', 'tipe' => 'text', 'bawaan' => 'Zero Accident', 'peran' => 'label' ),
						'tentang_tag_teks' => array( 'label' => 'Label pada foto — keterangan', 'tipe' => 'text', 'bawaan' => 'Penghargaan nihil kecelakaan kerja tahun 2024' ),
						'tentang_tombol' => array( 'label' => 'Tombol', 'tipe' => 'text', 'bawaan' => 'Selengkapnya Tentang Kami', 'peran' => 'tombol' ),
					),
				),

				'grup' => array(
					'judul'       => 'Blok Struktur Grup',
					'kolom'      => array(
						'grup_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Struktur Grup', 'peran' => 'label' ),
						'grup_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Bagian dari <em>Rukun Raharja</em>', 'peran' => 'judul' ),
						'grup_lede' => array( 'label' => 'Paragraf', 'tipe' => 'kaya', 'bawaan' => 'PT Trimitra Cipta Mandiri berada di segmen <b>Midstream — Infrastructure & Utilities</b> dalam struktur grup PT Rukun Raharja Tbk (IDX: RAJA), perusahaan energi terintegrasi dari hulu ke hilir.', 'peran' => 'teks' ),
						'grup_kapsi' => array( 'label' => 'Keterangan di bawah bagan', 'tipe' => 'textarea', 'bawaan' => 'Struktur grup PT Rukun Raharja Tbk — klik gambar untuk memperbesar. Posisi TCM ditandai dengan garis oranye.', 'peran' => 'teks' ),
						'n1_nama' => array( 'label' => 'Kotak 1 — nama perusahaan', 'tipe' => 'text', 'bawaan' => 'PT Rukun Raharja Tbk', 'peran' => 'judul' ),
						'n1_peran' => array( 'label' => 'Kotak 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Perusahaan induk · IDX: RAJA' ),
						'n1_own' => array( 'label' => 'Kotak 1 — label kepemilikan', 'tipe' => 'text', 'bawaan' => 'PERUSAHAAN TERBUKA', 'peran' => 'label' ),
						'n1_osub' => array( 'label' => 'Kotak 1 — rincian', 'tipe' => 'text', 'bawaan' => 'Tercatat di Bursa Efek Indonesia' ),
						'n2_nama' => array( 'label' => 'Kotak 2 — nama perusahaan', 'tipe' => 'text', 'bawaan' => 'PT Triguna Internusa Pratama', 'peran' => 'judul' ),
						'n2_own' => array( 'label' => 'Kotak 2 — label kepemilikan', 'tipe' => 'text', 'bawaan' => '99,9% MILIK RAJA', 'peran' => 'label' ),
						'n2_osub' => array( 'label' => 'Kotak 2 — rincian pemegang saham', 'tipe' => 'kaya', 'bawaan' => '<b>99,9%</b> PT Rukun Raharja Tbk<br><b>0,1%</b> pemegang saham lain' ),
						'n3_nama' => array( 'label' => 'Kotak 3 — nama perusahaan', 'tipe' => 'text', 'bawaan' => 'PT Trimitra Cipta Mandiri', 'peran' => 'judul' ),
						'n3_own' => array( 'label' => 'Kotak 3 — label kepemilikan', 'tipe' => 'text', 'bawaan' => '99% MILIK TIP', 'peran' => 'label' ),
						'n3_osub' => array( 'label' => 'Kotak 3 — rincian pemegang saham', 'tipe' => 'kaya', 'bawaan' => '<b>99%</b> PT Triguna Internusa Pratama<br><b>1%</b> pemegang saham lain' ),
						'legenda1' => array( 'label' => 'Legenda warna 1', 'tipe' => 'text', 'bawaan' => 'Kepemilikan grup RAJA', 'peran' => 'label' ),
						'legenda2' => array( 'label' => 'Legenda warna 2', 'tipe' => 'text', 'bawaan' => 'Kepemilikan pemegang saham lain', 'peran' => 'label' ),
						'grup_rantai' => array( 'label' => 'Kalimat rantai kepemilikan', 'tipe' => 'textarea', 'bawaan' => 'Rantai kepemilikan: PT Rukun Raharja Tbk menguasai 99,9% saham PT Triguna Internusa Pratama, yang selanjutnya menguasai 99% saham PT Trimitra Cipta Mandiri.', 'peran' => 'teks' ),
						'grup_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Angka kepemilikan (99,9% dan 99%) sekarang bisa diubah dari sini. RAJA adalah emiten terbuka — pastikan angkanya sesuai laporan resmi sebelum tayang. Panjang batang warna pada bagan masih mengikuti tema.' ),
					),
				),

				'layanan' => array(
					'judul'       => 'Blok Layanan',
					'keterangan'  => 'Sembilan kartu layanan pada beranda.',
					'kolom'      => array(
						'layanan_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Kompetensi Inti', 'peran' => 'label' ),
						'layanan_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Layanan <em>Kami</em>', 'peran' => 'judul' ),
						'layanan_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Layanan rutin dan non-rutin untuk mendukung keandalan operasi fasilitas energi, dari mekanikal hingga sipil dan alat berat.', 'peran' => 'teks' ),
						'svc1_judul' => array( 'label' => 'Kartu 1 — judul', 'tipe' => 'text', 'bawaan' => 'Operations Support', 'peran' => 'label' ),
						'svc1_teks' => array( 'label' => 'Kartu 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Dukungan operator, preventive maintenance line distribution, dan pemantauan fasilitas secara berkala.', 'peran' => 'teks' ),
						'svc2_judul' => array( 'label' => 'Kartu 2 — judul', 'tipe' => 'text', 'bawaan' => 'Mechanical & Valve', 'peran' => 'label' ),
						'svc2_teks' => array( 'label' => 'Kartu 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Inspeksi, perbaikan, stroking dan greasing LCV serta STBV pada fasilitas produksi.', 'peran' => 'teks' ),
						'svc3_judul' => array( 'label' => 'Kartu 3 — judul', 'tipe' => 'text', 'bawaan' => 'Welding Services', 'peran' => 'label' ),
						'svc3_teks' => array( 'label' => 'Kartu 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Perbaikan discharge header, screen tube ATCS, scrubber, dan jalur perpipaan bertekanan.', 'peran' => 'teks' ),
						'svc4_judul' => array( 'label' => 'Kartu 4 — judul', 'tipe' => 'text', 'bawaan' => 'Civil Works', 'peran' => 'label' ),
						'svc4_teks' => array( 'label' => 'Kartu 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Pekerjaan drainase, out station building, hingga cleaning cooling tower dan cold basin.', 'peran' => 'teks' ),
						'svc5_judul' => array( 'label' => 'Kartu 5 — judul', 'tipe' => 'text', 'bawaan' => 'Scaffolding Services', 'peran' => 'label' ),
						'svc5_teks' => array( 'label' => 'Kartu 5 — keterangan', 'tipe' => 'text', 'bawaan' => 'Supply material, instalasi, dan dismantle scaffolding oleh tenaga bersertifikat.', 'peran' => 'teks' ),
						'svc6_judul' => array( 'label' => 'Kartu 6 — judul', 'tipe' => 'text', 'bawaan' => 'Electrical & Instrument', 'peran' => 'label' ),
						'svc6_teks' => array( 'label' => 'Kartu 6 — keterangan', 'tipe' => 'text', 'bawaan' => 'Perbaikan dan pemeliharaan sistem kelistrikan serta instrumentasi fasilitas energi.', 'peran' => 'teks' ),
						'svc7_judul' => array( 'label' => 'Kartu 7 — judul', 'tipe' => 'text', 'bawaan' => 'HSE & Emergency', 'peran' => 'label' ),
						'svc7_teks' => array( 'label' => 'Kartu 7 — keterangan', 'tipe' => 'text', 'bawaan' => 'Rescue team, dukungan SHE, dan kesiapan tanggap darurat di area operasi.', 'peran' => 'teks' ),
						'svc8_judul' => array( 'label' => 'Kartu 8 — judul', 'tipe' => 'text', 'bawaan' => 'Alat Berat & Lifting', 'peran' => 'label' ),
						'svc8_teks' => array( 'label' => 'Kartu 8 — keterangan', 'tipe' => 'text', 'bawaan' => 'Penyediaan alat berat, rigging, dan dukungan pengangkatan untuk pekerjaan konstruksi.', 'peran' => 'teks' ),
						'svc9_judul' => array( 'label' => 'Kartu 9 — judul', 'tipe' => 'text', 'bawaan' => 'Rotating Machines', 'peran' => 'label' ),
						'svc9_teks' => array( 'label' => 'Kartu 9 — keterangan', 'tipe' => 'text', 'bawaan' => 'Pembuatan part, repair, dan maintenance pump serta diaphragm pada mesin berputar.', 'peran' => 'teks' ),
						'layanan_note_judul' => array( 'label' => 'Kotak non-rutin — judul', 'tipe' => 'text', 'bawaan' => 'Layanan Non-Rutin:', 'peran' => 'label' ),
						'layanan_note_teks' => array( 'label' => 'Kotak non-rutin — isi', 'tipe' => 'text', 'bawaan' => 'Shut Down Turn Around (SDTA) · Call Out Service · Painting · Rental Scaffolding · Road Repair & Maintenance · Vehicle Rental', 'peran' => 'teks' ),
						'layanan_tombol' => array( 'label' => 'Tombol', 'tipe' => 'text', 'bawaan' => 'Lihat Rincian Tiap Layanan', 'peran' => 'tombol' ),
					),
				),

				'proyek' => array(
					'judul'       => 'Blok Proyek',
					'keterangan'  => 'Tiga proyek unggulan yang ditulis langsung di beranda. Daftar proyek lengkap tetap diambil dari menu Proyek.',
					'kolom'      => array(
						'proyek_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Portofolio', 'peran' => 'label' ),
						'proyek_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Proyek yang <em>Telah Dikerjakan</em>', 'peran' => 'judul' ),
						'proyek_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Rekam jejak nyata menangani fasilitas panas bumi, minyak dan gas bumi, serta pembangkit listrik bersama operator terkemuka di Indonesia.', 'peran' => 'teks' ),
						'unggul1_chip' => array( 'label' => 'Unggulan 1 — label kategori', 'tipe' => 'text', 'bawaan' => 'PANAS BUMI', 'peran' => 'label' ),
						'unggul1_nilai' => array( 'label' => 'Unggulan 1 — angka besar', 'tipe' => 'text', 'bawaan' => '377 MW', 'peran' => 'nilai' ),
						'unggul1_judul' => array( 'label' => 'Unggulan 1 — judul', 'tipe' => 'text', 'bawaan' => 'Star Energy Geothermal Salak', 'peran' => 'label' ),
						'unggul1_teks' => array( 'label' => 'Unggulan 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Operation & Maintenance Support Services untuk salah satu PLTP terbesar di dunia — mencakup mekanikal, elektrikal & instrumentasi, sipil, scaffolding, welding, machining, hingga dukungan SHE dan logistik.', 'peran' => 'teks' ),
						'unggul1_meta' => array( 'label' => 'Unggulan 1 — lokasi & periode', 'tipe' => 'text', 'bawaan' => 'Gunung Salak, Sukabumi · 2024–2027' ),
						'unggul2_chip' => array( 'label' => 'Unggulan 2 — label kategori', 'tipe' => 'text', 'bawaan' => 'PANAS BUMI', 'peran' => 'label' ),
						'unggul2_nilai' => array( 'label' => 'Unggulan 2 — angka besar', 'tipe' => 'text', 'bawaan' => 'Well Hook-Up', 'peran' => 'nilai' ),
						'unggul2_judul' => array( 'label' => 'Unggulan 2 — judul', 'tipe' => 'text', 'bawaan' => 'Wayang Windu — Drilling Preparation', 'peran' => 'label' ),
						'unggul2_teks' => array( 'label' => 'Unggulan 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Drilling preparation dan well hook-up construction: land clearing, pembangunan akses dan pondasi, instalasi pipa dan valve, welding, insulation, serta sistem instrumentasi hingga commissioning.', 'peran' => 'teks' ),
						'unggul2_meta' => array( 'label' => 'Unggulan 2 — lokasi & periode', 'tipe' => 'text', 'bawaan' => 'Bandung Barat, Jawa Barat · 2025–2027' ),
						'unggul3_chip' => array( 'label' => 'Unggulan 3 — label kategori', 'tipe' => 'text', 'bawaan' => 'MINYAK & GAS', 'peran' => 'label', 'bantuan' => 'Catatan: foto proyek Rokan perlu diperiksa — diduga memakai foto dari Salak.' ),
						'unggul3_nilai' => array( 'label' => 'Unggulan 3 — angka besar', 'tipe' => 'text', 'bawaan' => '360 km', 'peran' => 'nilai' ),
						'unggul3_judul' => array( 'label' => 'Unggulan 3 — judul', 'tipe' => 'text', 'bawaan' => 'Area Rokan, Riau', 'peran' => 'label' ),
						'unggul3_teks' => array( 'label' => 'Unggulan 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Penyediaan tenaga kerja dan kendaraan ringan penumpang, serta pekerjaan konstruksi fasilitas pendukung operasi dan pemeliharaan di area produksi minyak bumi terbesar di Indonesia.', 'peran' => 'teks' ),
						'unggul3_meta' => array( 'label' => 'Unggulan 3 — lokasi & periode', 'tipe' => 'text', 'bawaan' => 'Area Rokan, Riau · 2025–2028' ),
						'proyek_daftar_judul' => array( 'label' => 'Judul daftar proyek', 'tipe' => 'text', 'bawaan' => 'Daftar Proyek', 'peran' => 'judul' ),
						'proyek_daftar_lede' => array( 'label' => 'Kalimat di bawah daftar', 'tipe' => 'textarea', 'bawaan' => 'proyek tercatat di Gunung Salak, Wayang Windu, Area Rokan, dan Jambi — berjalan maupun telah selesai.', 'peran' => 'teks', 'bantuan' => 'Jumlah proyek di depan kalimat dihitung otomatis oleh sistem.' ),
					),
				),

				'jangkauan' => array(
					'judul'       => 'Blok Jangkauan Operasi',
					'keterangan'  => 'Penanda pada peta diatur di tema, bukan di panel ini.',
					'kolom'      => array(
						'jangkauan_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Cakupan Nasional', 'peran' => 'label' ),
						'jangkauan_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Jangkauan <em>Operasi</em>', 'peran' => 'judul' ),
						'jangkauan_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Hadir dari Sumatera hingga Jawa Timur, mendukung infrastruktur energi nasional. Arahkan kursor ke penanda untuk melihat detail lokasi.', 'peran' => 'teks' ),
						'jangkauan_hint' => array( 'label' => 'Petunjuk geser peta', 'tipe' => 'text', 'bawaan' => 'Geser peta ke samping untuk melihat seluruh wilayah' ),
						'leg1_judul' => array( 'label' => 'Keterangan 1 — judul', 'tipe' => 'text', 'bawaan' => 'Minyak & Gas Bumi', 'peran' => 'label' ),
						'leg1_teks' => array( 'label' => 'Keterangan 1 — isi', 'tipe' => 'text', 'bawaan' => 'Area Rokan, Riau · Cilegon · Tambun–Tegal Gede, Bekasi', 'peran' => 'teks' ),
						'leg2_judul' => array( 'label' => 'Keterangan 2 — judul', 'tipe' => 'text', 'bawaan' => 'Panas Bumi', 'peran' => 'label' ),
						'leg2_teks' => array( 'label' => 'Keterangan 2 — isi', 'tipe' => 'text', 'bawaan' => 'Gunung Salak, Sukabumi · Wayang Windu, Bandung Barat', 'peran' => 'teks' ),
						'leg3_judul' => array( 'label' => 'Keterangan 3 — judul', 'tipe' => 'text', 'bawaan' => 'Terminal & Pipa Gas', 'peran' => 'label' ),
						'leg3_teks' => array( 'label' => 'Keterangan 3 — isi', 'tipe' => 'text', 'bawaan' => 'Gresik, Jawa Timur', 'peran' => 'teks' ),
						'leg4_judul' => array( 'label' => 'Keterangan 4 — judul', 'tipe' => 'text', 'bawaan' => 'Kantor Pusat', 'peran' => 'label' ),
						'leg4_teks' => array( 'label' => 'Keterangan 4 — isi', 'tipe' => 'text', 'bawaan' => 'Graha Iskandarsyah Lt. 4, Kebayoran Baru, Jakarta Selatan', 'peran' => 'teks' ),
					),
				),

				'hse' => array(
					'judul'       => 'Blok HSE & Penghargaan',
					'kolom'      => array(
						'hse_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Keselamatan Kerja', 'peran' => 'label' ),
						'hse_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'HSE & <em>Penghargaan</em>', 'peran' => 'judul' ),
						'hse_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Keselamatan adalah nilai utama kami — dibuktikan dengan pengakuan dari klien maupun pemerintah, serta sertifikasi standar internasional.', 'peran' => 'teks' ),
						'aw1_judul' => array( 'label' => 'Penghargaan 1 — judul', 'tipe' => 'text', 'bawaan' => 'Zero Accident 2024', 'peran' => 'label' ),
						'aw1_teks' => array( 'label' => 'Penghargaan 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Nihil kecelakaan kerja', 'peran' => 'teks' ),
						'aw2_judul' => array( 'label' => 'Penghargaan 2 — judul', 'tipe' => 'text', 'bawaan' => 'Zero Incident SEGS 2026', 'peran' => 'label' ),
						'aw2_teks' => array( 'label' => 'Penghargaan 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Star Energy Geothermal Salak', 'peran' => 'teks' ),
						'aw3_judul' => array( 'label' => 'Penghargaan 3 — judul', 'tipe' => 'text', 'bawaan' => 'Best Contractor', 'peran' => 'label' ),
						'aw3_teks' => array( 'label' => 'Penghargaan 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Kontraktor terbaik pilihan klien', 'peran' => 'teks' ),
						'aw4_judul' => array( 'label' => 'Penghargaan 4 — judul', 'tipe' => 'text', 'bawaan' => 'ISO 9001 · 14001 · 45001', 'peran' => 'label' ),
						'aw4_teks' => array( 'label' => 'Penghargaan 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Mutu, lingkungan, dan K3', 'peran' => 'teks' ),
						'motto_tebal' => array( 'label' => 'Moto — bagian tebal', 'tipe' => 'text', 'bawaan' => 'Think Safe', 'peran' => 'label' ),
						'motto_sisa' => array( 'label' => 'Moto — lanjutannya', 'tipe' => 'text', 'bawaan' => '· Work Safe · Go Home Safe' ),
					),
				),

				'sertifikat' => array(
					'judul'       => 'Blok Sertifikat',
					'keterangan'  => 'Isi tab diambil dari menu Sertifikat.',
					'kolom'      => array(
						'sert_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Kredibilitas', 'peran' => 'label' ),
						'sert_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Sertifikat & <em>Penghargaan</em>', 'peran' => 'judul' ),
						'sert_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Seluruh sertifikasi, kualifikasi, penghargaan, dan legalitas perusahaan dalam satu halaman. Klik gambar untuk melihat dokumen selengkapnya.', 'peran' => 'teks' ),
						'sert_kaki' => array( 'label' => 'Catatan kaki', 'tipe' => 'textarea', 'bawaan' => 'Seluruh dokumen ditampilkan dengan tanda air resmi PT Trimitra Cipta Mandiri. Salinan tanpa tanda air dapat diminta melalui kontak resmi perusahaan.', 'peran' => 'teks' ),
						'sert_tombol' => array( 'label' => 'Tombol', 'tipe' => 'text', 'bawaan' => 'Buka Halaman Sertifikat & Penghargaan', 'peran' => 'tombol' ),
						'sert_watermark' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Setiap gambar sertifikat dan penghargaan wajib sudah diberi watermark logo TCM sebelum diunggah.' ),
					),
				),

				'galeri' => array(
					'judul'       => 'Blok Galeri',
					'keterangan'  => 'Foto galeri diatur di tema.',
					'kolom'      => array(
						'galeri_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Dokumentasi', 'peran' => 'label' ),
						'galeri_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Kegiatan di <em>Lapangan</em>', 'peran' => 'judul' ),
						'galeri_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Aktivitas nyata tim TCM di area operasi panas bumi Gunung Salak dan Wayang Windu.', 'peran' => 'teks' ),
					),
				),

				'klien' => array(
					'judul'       => 'Blok Klien & Mitra',
					'keterangan'  => 'Daftar logo klien diatur di tema.',
					'kolom'      => array(
						'klien_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Kepercayaan', 'peran' => 'label' ),
						'klien_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Klien & <em>Mitra</em>', 'peran' => 'judul' ),
						'klien_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Bermitra jangka panjang dengan perusahaan energi dan migas terkemuka.', 'peran' => 'teks' ),
					),
				),

				'berita' => array(
					'judul'       => 'Blok Berita',
					'keterangan'  => 'Isi berita diambil dari menu Pos.',
					'kolom'      => array(
						'berita_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Informasi Terbaru', 'peran' => 'label' ),
						'berita_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Berita & <em>Kegiatan</em>', 'peran' => 'judul' ),
						'berita_tombol' => array( 'label' => 'Tombol', 'tipe' => 'text', 'bawaan' => 'Lihat Semua Berita', 'peran' => 'tombol' ),
					),
				),

				'ajakan' => array(
					'judul'       => 'Kotak Ajakan Penutup',
					'kolom'      => array(
						'cta_judul' => array( 'label' => 'Judul', 'tipe' => 'text', 'bawaan' => 'Mari Berkolaborasi', 'peran' => 'judul' ),
						'cta_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Kami siap mendukung keandalan operasi dan pemeliharaan fasilitas energi Anda, dengan tim bersertifikat dan rekam jejak keselamatan yang terbukti.', 'peran' => 'teks' ),
						'cta_tombol' => array( 'label' => 'Tombol', 'tipe' => 'text', 'bawaan' => 'Hubungi Kami', 'peran' => 'tombol' ),
					),
				),

				'foto_utama' => array(
					'judul'       => 'Foto Utama',
					'keterangan'  => 'Kosongkan kalau ingin memakai foto bawaan tema.',
					'kolom'      => array(
						'foto_sampul' => array( 'label' => 'Foto sampul depan', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/operasi-panas-bumi.jpg', 'bantuan' => 'Ukuran ideal 1920 × 1080 piksel.' ),
						'foto_tentang' => array( 'label' => 'Foto blok Tentang Kami', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/tim-tcm-di-area-operasi.jpg' ),
					),
				),

				'logo_rantai' => array(
					'judul'       => 'Logo Rantai Kepemilikan',
					'kolom'      => array(
						'logo_raja' => array( 'label' => 'Logo PT Rukun Raharja Tbk', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/rukun-raharja.png' ),
						'logo_triguna' => array( 'label' => 'Logo PT Triguna Internusa Pratama', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/triguna-internusa-pratama.png' ),
						'logo_tcm' => array( 'label' => 'Logo PT Trimitra Cipta Mandiri', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-trimitra-cipta-mandiri-2.png' ),
						'gambar_bagan' => array( 'label' => 'Gambar bagan struktur grup', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/struktur-organisasi-holding-pt-rukun-raharja-tbk.png', 'bantuan' => 'Sebaiknya PNG lebar atau SVG supaya tidak buram saat diperbesar.' ),
					),
				),

				'foto_proyek' => array(
					'judul'       => 'Foto Proyek Unggulan',
					'kolom'      => array(
						'foto_unggul1' => array( 'label' => 'Foto proyek unggulan 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/star-energy-geothermal-salak.jpg' ),
						'foto_unggul2' => array( 'label' => 'Foto proyek unggulan 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/wayang-windu-drilling-preparation.jpg' ),
						'foto_unggul3' => array( 'label' => 'Foto proyek unggulan 3', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/area-rokan-riau.jpg', 'bantuan' => 'Foto Rokan yang sekarang diduga memakai foto dari Salak — mohon diperiksa.' ),
					),
				),

				'foto_hse' => array(
					'judul'       => 'Foto Penghargaan HSE',
					'kolom'      => array(
						'foto_hse1' => array( 'label' => 'Foto penghargaan 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/penyerahan-penghargaan-hse-kepada-pt-trimitra-ci.jpg' ),
						'foto_hse2' => array( 'label' => 'Foto penghargaan 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/penyerahan-penghargaan-csr-pada-csms-forum-star-.jpg' ),
					),
				),

				'foto_galeri' => array(
					'judul'       => 'Foto Galeri Lapangan',
					'keterangan'  => 'Enam foto kegiatan di area operasi.',
					'kolom'      => array(
						'foto_galeri1' => array( 'label' => 'Foto galeri 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/welding.jpg' ),
						'foto_galeri2' => array( 'label' => 'Foto galeri 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/valve.jpg' ),
						'foto_galeri3' => array( 'label' => 'Foto galeri 3', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/sdta.jpg' ),
						'foto_galeri4' => array( 'label' => 'Foto galeri 4', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/aft.jpg' ),
						'foto_galeri5' => array( 'label' => 'Foto galeri 5', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/heat-exchanger.jpg' ),
						'foto_galeri6' => array( 'label' => 'Foto galeri 6', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/road-repair.jpg' ),
					),
				),

				'logo_klien' => array(
					'judul'       => 'Logo Klien & Mitra',
					'keterangan'  => 'Sepuluh logo pada dinding klien.',
					'kolom'      => array(
						'logo_klien1' => array( 'label' => 'Logo klien 1 — Star Energy Geothermal', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/star-energy-geothermal.png' ),
						'logo_klien2' => array( 'label' => 'Logo klien 2 — PT Triguna Internusa Pratama', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/triguna-internusa-pratama.png' ),
						'logo_klien3' => array( 'label' => 'Logo klien 3 — PT Pertamina Gas', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-pertamina-gas.png' ),
						'logo_klien4' => array( 'label' => 'Logo klien 4 — PT PLN (Persero)', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-pln-persero.png' ),
						'logo_klien5' => array( 'label' => 'Logo klien 5 — PLN Indonesia Power', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pln-indonesia-power.png' ),
						'logo_klien6' => array( 'label' => 'Logo klien 6 — PT Energasindo Heksa Karya', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-energasindo-heksa-karya.png' ),
						'logo_klien7' => array( 'label' => 'Logo klien 7 — PT Transportasi Gas Indonesia', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-transportasi-gas-indonesia.png' ),
						'logo_klien8' => array( 'label' => 'Logo klien 8 — PT Daya Mas Cisolok Geothermal', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-daya-mas-cisolok-geothermal.png' ),
						'logo_klien9' => array( 'label' => 'Logo klien 9 — PT Trakindo Utama', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-trakindo-utama.png' ),
						'logo_klien10' => array( 'label' => 'Logo klien 10 — PT Artifisial Teknologi Persada', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-artifisial-teknologi-persada.png', 'bantuan' => 'Logo ATP yang sekarang masih JPG berlatar putih; versi PNG transparan lebih rapi.' ),
					),
				),

				'instagram' => array(
					'judul'       => 'Instagram TCM',
					'keterangan'  => 'Bagian baru di Beranda, di bawah Berita & Kegiatan. Isinya diatur sendiri — unggah gambar postingan lalu tempel tautannya.',
					'kolom'      => array(
						'ig_aktif' => array( 'label' => 'Tampilkan bagian ini?', 'tipe' => 'pilihan', 'bawaan' => 'sembunyi', 'pilihan' => array( 'tampil' => 'Ya, tampilkan di Beranda', 'sembunyi' => 'Belum — sembunyikan dulu' ) ),
						'ig_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Media Sosial', 'peran' => 'label' ),
						'ig_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Kegiatan Kami di <em>Instagram</em>', 'peran' => 'judul' ),
						'ig_lede' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Dokumentasi kegiatan terbaru tim TCM di lapangan maupun di kantor.', 'peran' => 'teks' ),
						'ig_akun' => array( 'label' => 'Nama akun', 'tipe' => 'text', 'bawaan' => '@trimitraciptamandiri', 'peran' => 'label', 'bantuan' => 'Ditulis lengkap dengan tanda @.' ),
						'ig_url' => array( 'label' => 'Alamat profil Instagram', 'tipe' => 'url', 'bawaan' => 'https://www.instagram.com/', 'bantuan' => 'Tempel alamat lengkap profil Instagram TCM.' ),
						'ig_tombol' => array( 'label' => 'Tulisan tombol', 'tipe' => 'text', 'bawaan' => 'Ikuti di Instagram', 'peran' => 'tombol' ),
						'ig_sumber' => array( 'label' => 'Sumber tampilan', 'tipe' => 'pilihan', 'bawaan' => 'manual', 'pilihan' => array( 'manual' => 'Kartu manual — diisi sendiri di bawah', 'plugin' => 'Plugin feed Instagram — otomatis' ), 'bantuan' => 'Pilih "plugin" hanya kalau plugin feed Instagram sudah terpasang DAN akun @trimitraciptamandiri sudah bertipe Bisnis atau Kreator.' ),
						'ig_shortcode' => array( 'label' => 'Shortcode plugin feed', 'tipe' => 'text', 'bawaan' => '', 'bantuan' => 'Contoh: [instagram-feed feed=1] untuk plugin Instagram Feed (Smash Balloon), atau [spotlight_instagram] untuk Spotlight. Salin persis dari halaman pengaturan pluginnya.' ),
						'ig_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'DUA CARA MENAMPILKAN INSTAGRAM. (1) Kartu manual: unggah gambar dan tempel tautannya di bawah — tidak pernah rusak, tapi harus diperbarui sendiri. (2) Plugin feed: postingan dan Reels ditarik otomatis. Syarat plugin: akun TCM harus bertipe Bisnis atau Kreator, karena Meta menutup API akun pribadi pada 4 Desember 2024, dan token aksesnya perlu diperpanjang berkala. Kalau mode plugin dipilih tapi shortcode kosong atau pluginnya belum aktif, situs otomatis kembali memakai kartu manual — jadi bagian ini tidak pernah tampil kosong ke pengunjung.' ),
						'ig1_gambar' => array( 'label' => 'Postingan 1 — gambar', 'tipe' => 'gambar', 'bawaan' => '', 'bantuan' => 'Unggah gambar postingan (persegi paling rapi).' ),
						'ig1_teks' => array( 'label' => 'Postingan 1 — keterangan', 'tipe' => 'text', 'bawaan' => '' ),
						'ig1_url' => array( 'label' => 'Postingan 1 — tautan', 'tipe' => 'url', 'bawaan' => '', 'bantuan' => 'Tempel alamat postingannya. Kosongkan kalau tidak perlu ditautkan.' ),
						'ig2_gambar' => array( 'label' => 'Postingan 2 — gambar', 'tipe' => 'gambar', 'bawaan' => '' ),
						'ig2_teks' => array( 'label' => 'Postingan 2 — keterangan', 'tipe' => 'text', 'bawaan' => '' ),
						'ig2_url' => array( 'label' => 'Postingan 2 — tautan', 'tipe' => 'url', 'bawaan' => '' ),
						'ig3_gambar' => array( 'label' => 'Postingan 3 — gambar', 'tipe' => 'gambar', 'bawaan' => '' ),
						'ig3_teks' => array( 'label' => 'Postingan 3 — keterangan', 'tipe' => 'text', 'bawaan' => '' ),
						'ig3_url' => array( 'label' => 'Postingan 3 — tautan', 'tipe' => 'url', 'bawaan' => '' ),
						'ig4_gambar' => array( 'label' => 'Postingan 4 — gambar', 'tipe' => 'gambar', 'bawaan' => '' ),
						'ig4_teks' => array( 'label' => 'Postingan 4 — keterangan', 'tipe' => 'text', 'bawaan' => '' ),
						'ig4_url' => array( 'label' => 'Postingan 4 — tautan', 'tipe' => 'url', 'bawaan' => '' ),
						'ig5_gambar' => array( 'label' => 'Postingan 5 — gambar', 'tipe' => 'gambar', 'bawaan' => '' ),
						'ig5_teks' => array( 'label' => 'Postingan 5 — keterangan', 'tipe' => 'text', 'bawaan' => '' ),
						'ig5_url' => array( 'label' => 'Postingan 5 — tautan', 'tipe' => 'url', 'bawaan' => '' ),
						'ig6_gambar' => array( 'label' => 'Postingan 6 — gambar', 'tipe' => 'gambar', 'bawaan' => '' ),
						'ig6_teks' => array( 'label' => 'Postingan 6 — keterangan', 'tipe' => 'text', 'bawaan' => '' ),
						'ig6_url' => array( 'label' => 'Postingan 6 — tautan', 'tipe' => 'url', 'bawaan' => '' ),
						'ig7_gambar' => array( 'label' => 'Postingan 7 — gambar', 'tipe' => 'gambar', 'bawaan' => '' ),
						'ig7_teks' => array( 'label' => 'Postingan 7 — keterangan', 'tipe' => 'text', 'bawaan' => '' ),
						'ig7_url' => array( 'label' => 'Postingan 7 — tautan', 'tipe' => 'url', 'bawaan' => '' ),
						'ig8_gambar' => array( 'label' => 'Postingan 8 — gambar', 'tipe' => 'gambar', 'bawaan' => '' ),
						'ig8_teks' => array( 'label' => 'Postingan 8 — keterangan', 'tipe' => 'text', 'bawaan' => '' ),
						'ig8_url' => array( 'label' => 'Postingan 8 — tautan', 'tipe' => 'url', 'bawaan' => '' ),
					),
				),
			),
		),

		'tentang' => array(
			'menu'    => 'Tentang Kami',
			'judul'   => 'Konten Halaman Tentang Kami',
			'bagian' => array(

				'pace_logo' => array(
					'judul'       => 'Logo Huruf PACE',
					'keterangan'  => 'Empat logo huruf P, A, C, E versi resmi holding — bukan huruf yang digambar CSS.',
					'kolom'      => array(
						'pace1_logo' => array( 'label' => 'PACE 1 — logo huruf', 'tipe' => 'gambar', 'bawaan' => '', 'bantuan' => 'Logo huruf resmi PACE dari holding RAJA Group. Kosongkan untuk memakai berkas bawaan tema.' ),
						'pace2_logo' => array( 'label' => 'PACE 2 — logo huruf', 'tipe' => 'gambar', 'bawaan' => '' ),
						'pace3_logo' => array( 'label' => 'PACE 3 — logo huruf', 'tipe' => 'gambar', 'bawaan' => '' ),
						'pace4_logo' => array( 'label' => 'PACE 4 — logo huruf', 'tipe' => 'gambar', 'bawaan' => '' ),
					),
				),

				'sisa' => array(
					'judul'       => 'Profil Pimpinan & Wilayah Kerja',
					'keterangan'  => 'Bagian yang sebelumnya terkunci di tema. Kini bisa diubah — dan yang lebih penting, bisa diterjemahkan ke bahasa Inggris.',
					'kolom'      => array(
						'pim1_nama' => array( 'label' => 'Pimpinan 1 — nama', 'tipe' => 'text', 'bawaan' => 'Rony Hartanto', 'peran' => 'judul' ),
						'pim1_jabatan' => array( 'label' => 'Pimpinan 1 — jabatan', 'tipe' => 'text', 'bawaan' => 'KOMISARIS', 'peran' => 'label' ),
						'pim2_nama' => array( 'label' => 'Pimpinan 2 — nama', 'tipe' => 'text', 'bawaan' => 'Fattah Hermana', 'peran' => 'judul' ),
						'pim2_jabatan' => array( 'label' => 'Pimpinan 2 — jabatan', 'tipe' => 'text', 'bawaan' => 'DIREKTUR', 'peran' => 'label' ),
						'pim1_bio2' => array( 'label' => 'Pimpinan 1 — paragraf 2', 'tipe' => 'textarea', 'bawaan' => 'Sebelumnya, beliau menjabat sebagai Direktur PT Petrotech Penta Nusa (subholding Energy Infrastructure PT Rukun Raharja Tbk) serta President Director PT Artifisial Teknologi Persada (2022–2025). Pengalaman kepemimpinan operasionalnya juga terasah di PT Elnusa Tbk — antara lain sebagai Operation Director (2021), Vice President of Oilfield Services (2016–2021), dan Managing Director of Drilling Oilfield (2014–2016) — setelah mengawali karier sebagai Wireline Field Engineer di Schlumberger.', 'peran' => 'teks' ),
						'pim1_bio3' => array( 'label' => 'Pimpinan 1 — paragraf 3', 'tipe' => 'textarea', 'bawaan' => 'Beliau adalah lulusan Sarjana Teknik Elektro Universitas Gadjah Mada (UGM) serta pemegang sertifikasi Strategic Business Management dari Prasetiya Mulya Business School.', 'peran' => 'teks' ),
						'pim2_bio2' => array( 'label' => 'Pimpinan 2 — paragraf 2', 'tipe' => 'textarea', 'bawaan' => 'Perjalanan karier profesionalnya dimulai pada tahun 2004 sebagai Engineer di Perusahaan Gas Negara. Selanjutnya, beliau menjabat sebagai Kepala Bagian Perencanaan SDM & Pusdiklat di PT Timah (Persero) Tbk (2008–2011), Senior HR Manager di PT Lintas Multi Benua (2011–2016), Senior Human Capital Specialist di PT Rukun Raharja Tbk (2016–2018), serta HR & OMSS Manager di PT Triguna Internusa Pratama (2018–2023).', 'peran' => 'teks' ),
						'pim2_bio3' => array( 'label' => 'Pimpinan 2 — paragraf 3', 'tipe' => 'textarea', 'bawaan' => 'Sejak April 2023, beliau menjabat sebagai Direktur PT Trimitra Cipta Mandiri dengan membawa pengalaman kepemimpinan lebih dari dua dekade di berbagai sektor — energi, pertambangan, serta pengelolaan dan pengembangan SDM. Dalam perannya saat ini, beliau berfokus memimpin transformasi bisnis perusahaan, memperluas portofolio usaha, meningkatkan daya saing, serta memperkuat posisi perusahaan di tingkat nasional.', 'peran' => 'teks' ),
						'pace_catatan' => array( 'label' => 'Catatan di bawah nilai PACE', 'tipe' => 'textarea', 'bawaan' => 'PACE adalah nilai bersama seluruh entitas dalam grup PT Rukun Raharja Tbk. Setiap huruf mewakili satu nilai inti, dengan warna resminya masing-masing.', 'peran' => 'teks' ),
						'wil1_nama' => array( 'label' => 'Wilayah 1 — nama', 'tipe' => 'text', 'bawaan' => 'Jakarta Selatan', 'peran' => 'judul' ),
						'wil1_ket' => array( 'label' => 'Wilayah 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Kantor pusat — Graha Iskandarsyah', 'peran' => 'label' ),
						'wil2_nama' => array( 'label' => 'Wilayah 2 — nama', 'tipe' => 'text', 'bawaan' => 'Gunung Salak', 'peran' => 'judul' ),
						'wil2_ket' => array( 'label' => 'Wilayah 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Sukabumi, Jawa Barat', 'peran' => 'label' ),
						'wil3_nama' => array( 'label' => 'Wilayah 3 — nama', 'tipe' => 'text', 'bawaan' => 'Wayang Windu', 'peran' => 'judul' ),
						'wil3_ket' => array( 'label' => 'Wilayah 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Bandung Barat, Jawa Barat', 'peran' => 'label' ),
						'wil4_nama' => array( 'label' => 'Wilayah 4 — nama', 'tipe' => 'text', 'bawaan' => 'Area Rokan', 'peran' => 'judul' ),
						'wil4_ket' => array( 'label' => 'Wilayah 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Riau, Sumatera', 'peran' => 'label' ),
						'wil5_nama' => array( 'label' => 'Wilayah 5 — nama', 'tipe' => 'text', 'bawaan' => 'Jawa Timur', 'peran' => 'judul' ),
						'wil5_ket' => array( 'label' => 'Wilayah 5 — keterangan', 'tipe' => 'text', 'bawaan' => 'Gresik', 'peran' => 'label' ),
						'peta_tombol' => array( 'label' => 'Tombol peta jangkauan', 'tipe' => 'text', 'bawaan' => 'Lihat Peta Jangkauan Operasi', 'peran' => 'tombol' ),
						'cta_tombol' => array( 'label' => 'Tombol ajakan bawah', 'tipe' => 'text', 'bawaan' => 'Hubungi Kami', 'peran' => 'tombol' ),
					),
				),

				'pace_nilai' => array(
					'judul'       => 'Empat Nilai PACE',
					'keterangan'  => 'Nama, terjemahan, dan uraian empat nilai PACE. Nama nilainya ditetapkan holding RAJA Group — ubah hanya kalau holding memperbaruinya. Kolom ini terutama disediakan agar teksnya bisa diterjemahkan ke bahasa Inggris.',
					'kolom'      => array(
						'pace1_nama' => array( 'label' => 'PACE 1 — nama nilai', 'tipe' => 'text', 'bawaan' => 'Performance Excellence', 'peran' => 'judul' ),
						'pace1_sub' => array( 'label' => 'PACE 1 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Keunggulan & Efisiensi Operasional', 'peran' => 'label' ),
						'pace1_teks' => array( 'label' => 'PACE 1 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Mengejar keunggulan operasional agar setiap pekerjaan berjalan efektif dan efisien, dengan hasil bermutu tinggi di seluruh lini.', 'peran' => 'teks' ),
						'pace2_nama' => array( 'label' => 'PACE 2 — nama nilai', 'tipe' => 'text', 'bawaan' => 'Adaptive Agility', 'peran' => 'judul' ),
						'pace2_sub' => array( 'label' => 'PACE 2 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Kelincahan & Adaptasi terhadap Perubahan', 'peran' => 'label' ),
						'pace2_teks' => array( 'label' => 'PACE 2 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Menumbuhkan pola pikir berkembang agar mampu menyesuaikan diri terhadap tantangan baru dan mempercepat inovasi.', 'peran' => 'teks' ),
						'pace3_nama' => array( 'label' => 'PACE 3 — nama nilai', 'tipe' => 'text', 'bawaan' => 'Customer-Centric Mindset', 'peran' => 'judul' ),
						'pace3_sub' => array( 'label' => 'PACE 3 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Orientasi & Fokus pada Pelanggan', 'peran' => 'label' ),
						'pace3_teks' => array( 'label' => 'PACE 3 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Memahami harapan pelanggan, memberi nilai secara konsisten, dan membangun hubungan kerja sama jangka panjang.', 'peran' => 'teks' ),
						'pace4_nama' => array( 'label' => 'PACE 4 — nama nilai', 'tipe' => 'text', 'bawaan' => 'Empowered Collaboration & Synergy', 'peran' => 'judul' ),
						'pace4_sub' => array( 'label' => 'PACE 4 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Kolaborasi & Sinergi Lintas Unit RAJA Group', 'peran' => 'label' ),
						'pace4_teks' => array( 'label' => 'PACE 4 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Meruntuhkan sekat antarunit sehingga koordinasi dan kolaborasi di seluruh RAJA Group berjalan mulus dan saling menguatkan.', 'peran' => 'teks' ),
					),
				),

				'kepala' => array(
					'judul'       => 'Kepala Halaman',
					'kolom'      => array(
						'kepala_judul' => array( 'label' => 'Judul halaman', 'tipe' => 'kaya', 'bawaan' => 'Tentang <em>Kami</em>', 'peran' => 'judul' ),
						'kepala_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Dua puluh lima tahun menjaga keandalan operasi fasilitas energi Indonesia — dari minyak dan gas bumi hingga panas bumi dan pembangkit listrik.', 'peran' => 'subjudul' ),
					),
				),

				'manajemen' => array(
					'judul'       => 'Jajaran Manajemen',
					'keterangan'  => 'Riwayat singkat komisaris dan direktur.',
					'kolom'      => array(
						'man_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Jajaran Manajemen', 'peran' => 'label' ),
						'man_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Kepemimpinan <em>yang Berpengalaman</em>', 'peran' => 'judul' ),
						'kom_nama' => array( 'label' => 'Komisaris — nama', 'tipe' => 'text', 'bawaan' => 'Rony Hartanto', 'peran' => 'label' ),
						'kom_jabatan' => array( 'label' => 'Komisaris — jabatan', 'tipe' => 'text', 'bawaan' => 'Komisaris' ),
						'kom_bio' => array( 'label' => 'Komisaris — riwayat', 'tipe' => 'editor', 'bawaan' => '<p>Rony Hartanto adalah seorang eksekutif senior dengan pengalaman lebih dari dua puluh lima tahun di sektor energi, minyak dan gas, serta infrastruktur energi. Saat ini beliau juga menjabat sebagai Direktur Teknik dan Operasi PT Triguna Internusa Pratama, dengan tanggung jawab meliputi pengembangan standar teknis dan operasional proyek-proyek strategis serta perumusan strategi jangka menengah dan panjang yang selaras dengan peta jalan bisnis perusahaan induk.</p>', 'peran' => 'teks', 'bantuan' => 'Paragraf pertama saja. Dua paragraf berikutnya masih di tema.' ),
						'dir_nama' => array( 'label' => 'Direktur — nama', 'tipe' => 'text', 'bawaan' => 'Fattah Hermana', 'peran' => 'label' ),
						'dir_jabatan' => array( 'label' => 'Direktur — jabatan', 'tipe' => 'text', 'bawaan' => 'Direktur' ),
						'dir_bio' => array( 'label' => 'Direktur — riwayat', 'tipe' => 'editor', 'bawaan' => '<p>Fattah Hermana merupakan seorang profesional dengan keahlian utama di bidang pengembangan organisasi serta pengelolaan dan manajemen operasi. Berbekal latar belakang teknik yang solid dan pemahaman strategis terhadap dunia usaha, beliau dikenal mampu mengintegrasikan pendekatan pengelolaan sumber daya manusia (SDM) dan operasi dalam mendorong pertumbuhan serta peningkatan kinerja perusahaan. Beliau adalah lulusan Sarjana Teknik Industri dari Institut Teknologi Sepuluh Nopember (ITS) serta Magister Manajemen dari PPM School of Management.</p>', 'peran' => 'teks', 'bantuan' => 'Paragraf pertama saja. Dua paragraf berikutnya masih di tema.' ),
					),
				),

				'sekilas' => array(
					'judul'       => 'Sekilas Perusahaan',
					'kolom'      => array(
						'sekilas_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Sekilas Perusahaan', 'peran' => 'label' ),
						'sekilas_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Jasa Operasi & <em>Pemeliharaan</em>', 'peran' => 'judul' ),
						'sekilas_p1' => array( 'label' => 'Paragraf 1', 'tipe' => 'textarea', 'bawaan' => 'PT Trimitra Cipta Mandiri (TCM) adalah perusahaan penyedia jasa operasi, pemeliharaan, dan penunjang untuk fasilitas sektor energi di Indonesia. Berdiri sejak 8 November 2000, TCM kini menjadi bagian dari grup PT Rukun Raharja Tbk.', 'peran' => 'teks', 'bantuan' => 'Penulisan induk perusahaan: cukup "Member of Rukun Raharja Tbk" — jangan disandingkan dengan "sejak 2000", karena TCM baru bergabung 2011.' ),
						'sekilas_p2' => array( 'label' => 'Paragraf 2', 'tipe' => 'textarea', 'bawaan' => 'Lingkup kami mencakup fasilitas minyak dan gas bumi, pembangkit listrik tenaga panas bumi, serta terminal dan jaringan pipa gas — didukung tim bersertifikat dan sistem manajemen mutu, lingkungan, serta keselamatan kerja berstandar internasional.', 'peran' => 'teks' ),
						'pil1_judul' => array( 'label' => 'Poin 1 — judul', 'tipe' => 'text', 'bawaan' => '25+ tahun pengalaman', 'peran' => 'label' ),
						'pil1_teks' => array( 'label' => 'Poin 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Beroperasi sejak tahun 2000 di industri penunjang migas dan energi.', 'peran' => 'teks' ),
						'pil2_judul' => array( 'label' => 'Poin 2 — judul', 'tipe' => 'text', 'bawaan' => '256 personel profesional', 'peran' => 'label' ),
						'pil2_teks' => array( 'label' => 'Poin 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Tersebar di kantor pusat dan seluruh wilayah operasi perusahaan.', 'peran' => 'teks' ),
						'pil3_judul' => array( 'label' => 'Poin 3 — judul', 'tipe' => 'text', 'bawaan' => 'Nihil kecelakaan kerja', 'peran' => 'label' ),
						'pil3_teks' => array( 'label' => 'Poin 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Penghargaan Zero Accident 2024 dan Zero Incident dari Star Energy Geothermal Salak.', 'peran' => 'teks' ),
						'sekilas_tag_judul' => array( 'label' => 'Label foto — judul', 'tipe' => 'text', 'bawaan' => 'Sejak 2000', 'peran' => 'label' ),
						'sekilas_tag_teks' => array( 'label' => 'Label foto — keterangan', 'tipe' => 'text', 'bawaan' => 'Melayani industri energi Indonesia' ),
					),
				),

				'perjalanan' => array(
					'judul'       => 'Perjalanan Perusahaan',
					'keterangan'  => 'Enam tonggak sejarah.',
					'kolom'      => array(
						'jalan_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Perjalanan Kami', 'peran' => 'label' ),
						'jalan_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Dua Dekade <em>Bertumbuh</em>', 'peran' => 'judul' ),
						'jalan_lede' => array( 'label' => 'Paragraf', 'tipe' => 'text', 'bawaan' => 'Enam tonggak yang membentuk TCM seperti sekarang.', 'peran' => 'teks' ),
						'tl1_tahun' => array( 'label' => 'Tonggak 1 — tahun', 'tipe' => 'text', 'bawaan' => '2000', 'peran' => 'nilai' ),
						'tl1_judul' => array( 'label' => 'Tonggak 1 — judul', 'tipe' => 'text', 'bawaan' => 'Pendirian perusahaan', 'peran' => 'label' ),
						'tl1_teks' => array( 'label' => 'Tonggak 1 — cerita', 'tipe' => 'text', 'bawaan' => 'PT Trimitra Cipta Mandiri didirikan pada 8 November 2000 di Jakarta Pusat sebagai perusahaan jasa penunjang minyak dan gas bumi.', 'peran' => 'teks' ),
						'tl2_tahun' => array( 'label' => 'Tonggak 2 — tahun', 'tipe' => 'text', 'bawaan' => '2011', 'peran' => 'nilai' ),
						'tl2_judul' => array( 'label' => 'Tonggak 2 — judul', 'tipe' => 'text', 'bawaan' => 'Bergabung dengan Rukun Raharja', 'peran' => 'label' ),
						'tl2_teks' => array( 'label' => 'Tonggak 2 — cerita', 'tipe' => 'text', 'bawaan' => 'TCM diakuisisi oleh PT Triguna Internusa Pratama dan menjadi bagian dari grup PT Rukun Raharja Tbk (IDX: RAJA) pada segmen Midstream — Infrastructure & Utilities.', 'peran' => 'teks' ),
						'tl3_tahun' => array( 'label' => 'Tonggak 3 — tahun', 'tipe' => 'text', 'bawaan' => '2016', 'peran' => 'nilai' ),
						'tl3_judul' => array( 'label' => 'Tonggak 3 — judul', 'tipe' => 'text', 'bawaan' => 'Operasi fasilitas penyalur gas', 'peran' => 'label' ),
						'tl3_teks' => array( 'label' => 'Tonggak 3 — cerita', 'tipe' => 'text', 'bawaan' => 'Memulai jasa pengoperasian dan pemeliharaan fasilitas penyalur gas bumi di Sei Gelam dan Payo Selincah, Provinsi Jambi, bersama PT Energasindo Heksa Karya.', 'peran' => 'teks' ),
						'tl4_tahun' => array( 'label' => 'Tonggak 4 — tahun', 'tipe' => 'text', 'bawaan' => '2023', 'peran' => 'nilai' ),
						'tl4_judul' => array( 'label' => 'Tonggak 4 — judul', 'tipe' => 'text', 'bawaan' => 'Ekspansi ke sektor energi', 'peran' => 'label' ),
						'tl4_teks' => array( 'label' => 'Tonggak 4 — cerita', 'tipe' => 'text', 'bawaan' => 'Memperluas layanan ke fasilitas panas bumi dan pembangkit listrik, sekaligus memulai penyediaan tenaga kerja dan konstruksi fasilitas pendukung di Area Rokan, Riau.', 'peran' => 'teks' ),
						'tl5_tahun' => array( 'label' => 'Tonggak 5 — tahun', 'tipe' => 'text', 'bawaan' => '2024', 'peran' => 'nilai' ),
						'tl5_judul' => array( 'label' => 'Tonggak 5 — judul', 'tipe' => 'text', 'bawaan' => 'Kontrak OMSS panas bumi', 'peran' => 'label' ),
						'tl5_teks' => array( 'label' => 'Tonggak 5 — cerita', 'tipe' => 'text', 'bawaan' => 'Dipercaya menangani Operation & Maintenance Support Services untuk Star Energy Geothermal Salak dan Wayang Windu — dua pembangkit panas bumi utama di Jawa Barat.', 'peran' => 'teks' ),
						'tl6_tahun' => array( 'label' => 'Tonggak 6 — tahun', 'tipe' => 'text', 'bawaan' => '2026', 'peran' => 'nilai' ),
						'tl6_judul' => array( 'label' => 'Tonggak 6 — judul', 'tipe' => 'text', 'bawaan' => 'Pengakuan keselamatan kerja', 'peran' => 'label' ),
						'tl6_teks' => array( 'label' => 'Tonggak 6 — cerita', 'tipe' => 'text', 'bawaan' => 'Menerima penghargaan Zero Incident dari Star Energy Geothermal Salak, melengkapi Zero Accident Award dan predikat Best Contractor yang diraih sebelumnya.', 'peran' => 'teks' ),
					),
				),

				'visimisi' => array(
					'judul'       => 'Visi & Misi',
					'kolom'      => array(
						'vm_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Arah Perusahaan', 'peran' => 'label' ),
						'vm_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Visi & <em>Misi</em>', 'peran' => 'judul' ),
						'visi_teks' => array( 'label' => 'Isi visi', 'tipe' => 'textarea', 'bawaan' => 'Menjadi perusahaan jasa operasi dan pemeliharaan serta penunjang sektor energi yang diakui di tingkat nasional.', 'peran' => 'teks' ),
						'misi1' => array( 'label' => 'Misi 1', 'tipe' => 'textarea', 'bawaan' => 'Menjamin keandalan sistem operasional dan pemeliharaan fasilitas infrastruktur sektor energi.', 'peran' => 'teks' ),
						'misi2' => array( 'label' => 'Misi 2', 'tipe' => 'textarea', 'bawaan' => 'Mengedepankan mutu serta sistem kerja yang efektif dan efisien.', 'peran' => 'teks' ),
						'misi3' => array( 'label' => 'Misi 3', 'tipe' => 'textarea', 'bawaan' => 'Mengutamakan keselamatan dan kesehatan kerja di setiap aktivitas.', 'peran' => 'teks' ),
					),
				),

				'nilai' => array(
					'judul'       => 'Nilai PACE',
					'kolom'      => array(
						'pace_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Nilai Perusahaan', 'peran' => 'label' ),
						'pace_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Empat Nilai <em>PACE</em>', 'peran' => 'judul' ),
						'pace_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Sejak 2026 TCM menggunakan PACE — nilai bersama seluruh entitas PT Rukun Raharja Tbk (RAJA Group) — sebagai dasar cara kami bekerja dan melayani pelanggan.', 'peran' => 'teks' ),
						'pace_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Nama dan definisi keempat nilai PACE ditetapkan holding RAJA Group, jadi sengaja TIDAK dibuat bisa diubah dari panel ini. Kalau holding mengubahnya, perubahan dilakukan di tema.' ),
					),
				),

				'wilayah' => array(
					'judul'       => 'Wilayah Kerja',
					'kolom'      => array(
						'wil_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Sebaran Tim', 'peran' => 'label' ),
						'wil_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Wilayah <em>Kerja Kami</em>', 'peran' => 'judul' ),
						'wil_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => '256 personel profesional yang tersebar di kantor pusat dan wilayah operasi di Sumatera hingga Jawa Timur.', 'peran' => 'teks' ),
					),
				),

				'ajakan' => array(
					'judul'       => 'Kotak Ajakan Penutup',
					'kolom'      => array(
						'cta_judul' => array( 'label' => 'Judul', 'tipe' => 'text', 'bawaan' => 'Mari Berkolaborasi', 'peran' => 'judul' ),
						'cta_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Kami siap mendukung keandalan operasi dan pemeliharaan fasilitas energi Anda, dengan tim bersertifikat dan rekam jejak keselamatan yang terbukti.', 'peran' => 'teks' ),
					),
				),

				'gambar' => array(
					'judul'       => 'Foto & Gambar',
					'keterangan'  => 'Kosongkan kalau ingin memakai gambar bawaan tema.',
					'kolom'      => array(
						'foto_komisaris' => array( 'label' => 'Foto Komisaris', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/rony-hartanto-komisaris-pt-trimitra-cipta-mandir.jpg', 'bantuan' => 'Foto potret, sebaiknya rasio 3:4.' ),
						'foto_direktur' => array( 'label' => 'Foto Direktur', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/fattah-hermana-direktur-pt-trimitra-cipta-mandir.jpg', 'bantuan' => 'Foto potret, sebaiknya rasio 3:4.' ),
						'foto_sekilas' => array( 'label' => 'Foto blok Sekilas Perusahaan', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/tim-tcm-di-area-operasi.jpg' ),
						'gambar_pace' => array( 'label' => 'Gambar nilai PACE', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/value-holding-pace.png' ),
					),
				),
			),
		),

		'layanan' => array(
			'menu'    => 'Layanan',
			'judul'   => 'Konten Halaman Layanan',
			'bagian' => array(

				'angka_keahlian' => array(
					'judul'       => 'Angka Kapabilitas, Keahlian & Tombol',
					'kolom'      => array(
						'num1_label' => array( 'label' => 'Angka 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Personel profesional', 'peran' => 'label' ),
						'num2_label' => array( 'label' => 'Angka 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Unit armada & alat berat', 'peran' => 'label' ),
						'num3_label' => array( 'label' => 'Angka 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Tahun pengalaman', 'peran' => 'label' ),
						'num4_label' => array( 'label' => 'Angka 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Sertifikasi sistem manajemen', 'peran' => 'label' ),
						'keahlian' => array( 'label' => 'Daftar keahlian khusus', 'tipe' => 'textarea', 'bawaan' => 'Shut Down Turn Around (SDTA)
Call Out Service
Painting & Coating
Rental Scaffolding
Road Repair & Maintenance
Vehicle Rental
Well Hook-Up Construction
Heat Exchanger Cleaning
Rock Muffler Fabrication', 'bantuan' => 'Satu keahlian per baris.' ),
						'sert_tombol' => array( 'label' => 'Tombol ke halaman Sertifikat', 'tipe' => 'text', 'bawaan' => 'Lihat Sertifikasi Kami', 'peran' => 'tombol' ),
						'proyek_tombol' => array( 'label' => 'Tombol ke halaman Proyek', 'tipe' => 'text', 'bawaan' => 'Lihat Proyek yang Sudah Dikerjakan', 'peran' => 'tombol' ),
						'cta_tombol' => array( 'label' => 'Tombol ajakan bawah', 'tipe' => 'text', 'bawaan' => 'Hubungi Kami', 'peran' => 'tombol' ),
					),
				),

				'kartu_alur' => array(
					'judul'       => 'Kartu Kelompok & Alur Kerja',
					'keterangan'  => 'Tiga kartu ringkasan di bagian atas halaman, dan lima langkah alur kerja.',
					'kolom'      => array(
						'grp1_judul' => array( 'label' => 'Kartu kelompok 1 — judul', 'tipe' => 'text', 'bawaan' => 'Operasi & Pemeliharaan', 'peran' => 'judul' ),
						'grp1_teks' => array( 'label' => 'Kartu kelompok 1 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Menjaga fasilitas tetap berproduksi — operator lapangan, pemeliharaan preventif, inspeksi berkala, dan penanganan gangguan, dijalankan sebagai tim residen di lokasi klien.', 'peran' => 'teks' ),
						'grp2_judul' => array( 'label' => 'Kartu kelompok 2 — judul', 'tipe' => 'text', 'bawaan' => 'Konstruksi & Fabrikasi', 'peran' => 'judul' ),
						'grp2_teks' => array( 'label' => 'Kartu kelompok 2 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Membangun dan memperbaiki — pekerjaan sipil, perpipaan, fabrikasi baja, welding, scaffolding, hingga perbaikan jalan akses di area operasi.', 'peran' => 'teks' ),
						'grp3_judul' => array( 'label' => 'Kartu kelompok 3 — judul', 'tipe' => 'text', 'bawaan' => 'Dukungan Lapangan', 'peran' => 'judul' ),
						'grp3_teks' => array( 'label' => 'Kartu kelompok 3 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Menopang keduanya — alat berat dan lifting, tim tanggap darurat, penyediaan tenaga kerja dan kendaraan, serta administrasi, SAP, dan logistik.', 'peran' => 'teks' ),
						'grp_tombol' => array( 'label' => 'Tulisan tautan pada ketiga kartu', 'tipe' => 'text', 'bawaan' => 'Lihat rinciannya', 'peran' => 'tombol' ),
						'alur1_judul' => array( 'label' => 'Langkah 1 — judul', 'tipe' => 'text', 'bawaan' => 'Permintaan Kerja', 'peran' => 'judul' ),
						'alur1_teks' => array( 'label' => 'Langkah 1 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Work Order atau instruksi dari klien diterima dan ditinjau kebutuhan teknisnya.', 'peran' => 'teks' ),
						'alur2_judul' => array( 'label' => 'Langkah 2 — judul', 'tipe' => 'text', 'bawaan' => 'Perencanaan', 'peran' => 'judul' ),
						'alur2_teks' => array( 'label' => 'Langkah 2 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Penentuan metode kerja, kebutuhan tenaga, material, peralatan, dan penilaian risiko.', 'peran' => 'teks' ),
						'alur3_judul' => array( 'label' => 'Langkah 3 — judul', 'tipe' => 'text', 'bawaan' => 'Izin & Keselamatan', 'peran' => 'judul' ),
						'alur3_teks' => array( 'label' => 'Langkah 3 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Pengurusan izin kerja, toolbox meeting, dan penyiapan alat pelindung serta pengaman.', 'peran' => 'teks' ),
						'alur4_judul' => array( 'label' => 'Langkah 4 — judul', 'tipe' => 'text', 'bawaan' => 'Pelaksanaan', 'peran' => 'judul' ),
						'alur4_teks' => array( 'label' => 'Langkah 4 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Pekerjaan dijalankan tim bersertifikat dengan pengawasan mutu dan keselamatan di lapangan.', 'peran' => 'teks' ),
						'alur5_judul' => array( 'label' => 'Langkah 5 — judul', 'tipe' => 'text', 'bawaan' => 'Serah Terima', 'peran' => 'judul' ),
						'alur5_teks' => array( 'label' => 'Langkah 5 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Pengujian, dokumentasi, laporan pekerjaan, dan serah terima kepada klien.', 'peran' => 'teks' ),
					),
				),

				'rincian' => array(
					'judul'       => 'Rincian Dua Belas Layanan',
					'keterangan'  => 'Judul, terjemahan, uraian, dan rincian pekerjaan tiap layanan. Ikon dan warnanya tetap diatur tema.',
					'kolom'      => array(
						'sv1_judul' => array( 'label' => 'Layanan 1 — judul', 'tipe' => 'text', 'bawaan' => 'Operations Support', 'peran' => 'judul' ),
						'sv1_sub' => array( 'label' => 'Layanan 1 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Dukungan Operasi', 'peran' => 'label' ),
						'sv1_teks' => array( 'label' => 'Layanan 1 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Penempatan operator dan teknisi sebagai tim residen untuk menjalankan kegiatan operasi harian fasilitas produksi uap, gas, dan pembangkit, mengikuti prosedur dan standar keselamatan klien.', 'peran' => 'teks' ),
						'sv1_daftar' => array( 'label' => 'Layanan 1 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Pengoperasian sistem penyaluran gas dan fasilitas produksi
Pembacaan meter, pemantauan parameter, dan pelaporan harian
Preventive maintenance jalur distribusi dan fasilitas pengukuran
Penanganan kondisi abnormal dan tanggap darurat lapangan
Laporan operasional harian, mingguan, bulanan, dan tahunan', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv2_judul' => array( 'label' => 'Layanan 2 — judul', 'tipe' => 'text', 'bawaan' => 'Mechanical & Valve', 'peran' => 'judul' ),
						'sv2_sub' => array( 'label' => 'Layanan 2 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Mekanikal & Katup', 'peran' => 'label' ),
						'sv2_teks' => array( 'label' => 'Layanan 2 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Inspeksi, perbaikan, dan perawatan peralatan mekanikal dan sistem katup pada fasilitas produksi, dikerjakan dalam kondisi operasi maupun saat shutdown.', 'peran' => 'teks' ),
						'sv2_daftar' => array( 'label' => 'Layanan 2 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Inspeksi, stroking, dan greasing LCV serta STBV
Perbaikan dan penggantian valve, scrubber, dan separator
Penggantian jalur kondensat dan komponen perpipaan
Pembongkaran, perbaikan pondasi, dan pemasangan kembali peralatan
Penggantian anchor bolt dan pekerjaan finishing', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv3_judul' => array( 'label' => 'Layanan 3 — judul', 'tipe' => 'text', 'bawaan' => 'Rotating Machines', 'peran' => 'judul' ),
						'sv3_sub' => array( 'label' => 'Layanan 3 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Mesin Berputar', 'peran' => 'label' ),
						'sv3_teks' => array( 'label' => 'Layanan 3 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Perawatan dan perbaikan mesin berputar — pompa, diaphragm, dan mesin diesel — termasuk pembuatan komponen pengganti di bengkel sendiri.', 'peran' => 'teks' ),
						'sv3_daftar' => array( 'label' => 'Layanan 3 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Preventive maintenance berkala dan inspeksi kondisi
Analisa teknis termasuk analisa minyak pelumas
Major overhaul mesin diesel dan penyediaan suku cadang
Pembuatan part, machining, dan repair pump serta diaphragm
Layanan on-call untuk kondisi abnormal atau darurat', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv4_judul' => array( 'label' => 'Layanan 4 — judul', 'tipe' => 'text', 'bawaan' => 'Electrical & Instrument', 'peran' => 'judul' ),
						'sv4_sub' => array( 'label' => 'Layanan 4 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Elektrikal & Instrumentasi', 'peran' => 'label' ),
						'sv4_teks' => array( 'label' => 'Layanan 4 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Pemeliharaan sistem kelistrikan dan instrumentasi fasilitas energi, dari kabel dan panel hingga kalibrasi alat ukur dan sistem kendali.', 'peran' => 'teks' ),
						'sv4_daftar' => array( 'label' => 'Layanan 4 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Perbaikan dan pemeliharaan panel serta jaringan kelistrikan
Instalasi sistem instrumentasi dan penarikan kabel
Pemeriksaan dan penggantian sensor serta alat ukur
Dukungan commissioning peralatan baru', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv5_judul' => array( 'label' => 'Layanan 5 — judul', 'tipe' => 'text', 'bawaan' => 'Welding & Machining', 'peran' => 'judul' ),
						'sv5_sub' => array( 'label' => 'Layanan 5 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Pengelasan & Permesinan', 'peran' => 'label' ),
						'sv5_teks' => array( 'label' => 'Layanan 5 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Pekerjaan las bersertifikat pada jalur bertekanan dan struktur baja, didukung bengkel machining untuk fabrikasi dan perbaikan komponen.', 'peran' => 'teks' ),
						'sv5_daftar' => array( 'label' => 'Layanan 5 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Perbaikan discharge header dan screen tube ATCS
Fabrikasi dan pemasangan struktur baja serta plat
Penyambungan dan perbaikan jalur perpipaan bertekanan
Insulation dan pengecatan pelindung setelah pengelasan
Pembuatan komponen pengganti sesuai gambar teknis', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv6_judul' => array( 'label' => 'Layanan 6 — judul', 'tipe' => 'text', 'bawaan' => 'Civil Works', 'peran' => 'judul' ),
						'sv6_sub' => array( 'label' => 'Layanan 6 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Pekerjaan Sipil', 'peran' => 'label' ),
						'sv6_teks' => array( 'label' => 'Layanan 6 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Pekerjaan sipil di area operasi — dari bangunan penunjang dan drainase hingga perbaikan struktur beton menara pendingin.', 'peran' => 'teks' ),
						'sv6_daftar' => array( 'label' => 'Layanan 6 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Pembangunan out station building dan fasilitas penunjang
Pekerjaan drainase dan perbaikan struktur beton
Cleaning cooling tower, cold basin, dan perbaikan fill grid
Coating, HDPE wrapping, dan injeksi retak beton
Land clearing, akses jalan, dan pekerjaan pondasi', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv7_judul' => array( 'label' => 'Layanan 7 — judul', 'tipe' => 'text', 'bawaan' => 'Scaffolding Services', 'peran' => 'judul' ),
						'sv7_sub' => array( 'label' => 'Layanan 7 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Perancah', 'peran' => 'label' ),
						'sv7_teks' => array( 'label' => 'Layanan 7 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Penyediaan material, pemasangan, dan pembongkaran perancah oleh tenaga bersertifikat, sebagai penopang seluruh pekerjaan ketinggian.', 'peran' => 'teks' ),
						'sv7_daftar' => array( 'label' => 'Layanan 7 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Supply material perancah dan aksesorinya
Erection dan dismantling oleh scaffolder bersertifikat
Inspeksi dan pemasangan scafftag sebelum serah pakai
Rental perancah untuk pekerjaan jangka pendek', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv8_judul' => array( 'label' => 'Layanan 8 — judul', 'tipe' => 'text', 'bawaan' => 'Road Repair & Maintenance', 'peran' => 'judul' ),
						'sv8_sub' => array( 'label' => 'Layanan 8 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Perbaikan Jalan', 'peran' => 'label' ),
						'sv8_teks' => array( 'label' => 'Layanan 8 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Perbaikan dan pemeliharaan jalan serta bahu jalan di area operasi dan sekitarnya, lengkap dengan pengujian mutu.', 'peran' => 'teks' ),
						'sv8_daftar' => array( 'label' => 'Layanan 8 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Perbaikan subbase dan pelapisan aspal (overlay)
Pekerjaan beton dan perbaikan drainase jalan
Pemasangan gabion pada lereng rawan longsor
Pengujian mutu (QA/QC) dan pelaporan hasil pekerjaan', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv9_judul' => array( 'label' => 'Layanan 9 — judul', 'tipe' => 'text', 'bawaan' => 'Alat Berat & Lifting', 'peran' => 'judul' ),
						'sv9_sub' => array( 'label' => 'Layanan 9 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Heavy Equipment & Lifting', 'peran' => 'label' ),
						'sv9_teks' => array( 'label' => 'Layanan 9 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Penyediaan alat berat beserta operator dan rigger untuk mendukung pekerjaan konstruksi, pemeliharaan, dan pemindahan peralatan.', 'peran' => 'teks' ),
						'sv9_daftar' => array( 'label' => 'Layanan 9 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Penyediaan crane, excavator, dan alat berat pendukung
Perencanaan lifting dan pekerjaan rigging
Operator dan rigger bersertifikat
Dukungan mobilisasi dan demobilisasi peralatan', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv10_judul' => array( 'label' => 'Layanan 10 — judul', 'tipe' => 'text', 'bawaan' => 'HSE & Emergency Response', 'peran' => 'judul' ),
						'sv10_sub' => array( 'label' => 'Layanan 10 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Keselamatan & Tanggap Darurat', 'peran' => 'label' ),
						'sv10_teks' => array( 'label' => 'Layanan 10 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Tim keselamatan dan tanggap darurat yang menyatu dengan pekerjaan lapangan — bukan pelengkap, tapi bagian dari cara kerja TCM.', 'peran' => 'teks' ),
						'sv10_daftar' => array( 'label' => 'Layanan 10 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Rescue team dan kesiapan tanggap darurat di area operasi
Pengawasan keselamatan harian dan safety patrol
Pekerjaan di area berbahaya (hazardous area) sesuai izin kerja
Pengelolaan limbah dan aspek lingkungan pekerjaan
Pelaporan insiden dan investigasi', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv11_judul' => array( 'label' => 'Layanan 11 — judul', 'tipe' => 'text', 'bawaan' => 'Manpower & Fleet', 'peran' => 'judul' ),
						'sv11_sub' => array( 'label' => 'Layanan 11 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Tenaga Kerja & Armada', 'peran' => 'label' ),
						'sv11_teks' => array( 'label' => 'Layanan 11 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Penyediaan personel operasional dan kendaraan siap pakai untuk menopang kegiatan klien di area produksi.', 'peran' => 'teks' ),
						'sv11_daftar' => array( 'label' => 'Layanan 11 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Penyediaan personel termasuk driver dan dispatcher
Penyediaan kendaraan ringan penumpang siap operasi
Pemeliharaan dan penjagaan kondisi armada
Pengelolaan jadwal, absensi, dan pemenuhan standar keselamatan', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
						'sv12_judul' => array( 'label' => 'Layanan 12 — judul', 'tipe' => 'text', 'bawaan' => 'Support Services', 'peran' => 'judul' ),
						'sv12_sub' => array( 'label' => 'Layanan 12 — terjemahan', 'tipe' => 'text', 'bawaan' => 'Dukungan Administrasi & Logistik', 'peran' => 'label' ),
						'sv12_teks' => array( 'label' => 'Layanan 12 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Fungsi penopang yang membuat pekerjaan lapangan berjalan lancar — perencanaan material, administrasi, dan logistik.', 'peran' => 'teks' ),
						'sv12_daftar' => array( 'label' => 'Layanan 12 — rincian pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Perencanaan dan koordinasi kebutuhan material
Administrasi pekerjaan dan input data SAP
Pergudangan dan logistik peralatan
Asset management, dukungan reservoir dan geoscience
Dokumentasi ITP dan as-built drawing', 'bantuan' => 'Satu rincian per baris. Kosongkan judulnya untuk menyembunyikan layanan ini.' ),
					),
				),

				'kepala' => array(
					'judul'       => 'Kepala Halaman',
					'kolom'      => array(
						'kepala_judul' => array( 'label' => 'Judul halaman', 'tipe' => 'kaya', 'bawaan' => 'Layanan <em>Kami</em>', 'peran' => 'judul' ),
						'kepala_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Dua belas lini layanan yang saling menopang — dijalankan tim residen di lokasi klien, untuk pekerjaan rutin harian maupun pekerjaan besar terjadwal.', 'peran' => 'subjudul' ),
					),
				),

				'kelompok' => array(
					'judul'       => 'Judul Kelompok Layanan',
					'keterangan'  => 'Rincian tiap layanan tetap di tema.',
					'kolom'      => array(
						'k1_eyebrow' => array( 'label' => 'Kelompok 1 — label kecil', 'tipe' => 'text', 'bawaan' => 'Menjaga fasilitas tetap berproduksi', 'peran' => 'label' ),
						'k1_judul' => array( 'label' => 'Kelompok 1 — judul', 'tipe' => 'text', 'bawaan' => 'Operasi & Pemeliharaan', 'peran' => 'judul' ),
						'k2_eyebrow' => array( 'label' => 'Kelompok 2 — label kecil', 'tipe' => 'text', 'bawaan' => 'Membangun, memperbaiki, dan memfabrikasi', 'peran' => 'label' ),
						'k2_judul' => array( 'label' => 'Kelompok 2 — judul', 'tipe' => 'text', 'bawaan' => 'Konstruksi & Fabrikasi', 'peran' => 'judul' ),
						'k3_eyebrow' => array( 'label' => 'Kelompok 3 — label kecil', 'tipe' => 'text', 'bawaan' => 'Menopang seluruh pekerjaan di lokasi', 'peran' => 'label' ),
						'k3_judul' => array( 'label' => 'Kelompok 3 — judul', 'tipe' => 'text', 'bawaan' => 'Dukungan Lapangan', 'peran' => 'judul' ),
					),
				),

				'alur' => array(
					'judul'       => 'Cara Kami Bekerja',
					'kolom'      => array(
						'alur_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Cara Kami Bekerja', 'peran' => 'label' ),
						'alur_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Dari Permintaan <em>sampai Serah Terima</em>', 'peran' => 'judul' ),
						'alur_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Alur yang sama kami terapkan untuk pekerjaan rutin harian maupun proyek besar — supaya mutu dan keselamatan tidak bergantung pada siapa yang mengerjakan.', 'peran' => 'teks' ),
					),
				),

				'sumberdaya' => array(
					'judul'       => 'Sumber Daya di Lapangan',
					'kolom'      => array(
						'sd_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Kapabilitas', 'peran' => 'label' ),
						'sd_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Sumber Daya <em>di Lapangan</em>', 'peran' => 'judul' ),
						'sd_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Layanan hanya berarti kalau ada orang dan alat yang siap. Tim TCM tersebar di kantor pusat dan wilayah operasi dari Riau, Jambi, Jawa Barat, hingga Jawa Timur.', 'peran' => 'teks' ),
					),
				),

				'nonrutin' => array(
					'judul'       => 'Layanan Non-Rutin',
					'kolom'      => array(
						'nr_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Di Luar Pekerjaan Rutin', 'peran' => 'label' ),
						'nr_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Layanan <em>Non-Rutin</em>', 'peran' => 'judul' ),
						'nr_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Pekerjaan terjadwal maupun panggilan mendadak yang kami tangani berdasarkan Work Order atau kontrak terpisah.', 'peran' => 'teks' ),
					),
				),

				'ajakan' => array(
					'judul'       => 'Kotak Ajakan Penutup',
					'kolom'      => array(
						'cta_judul' => array( 'label' => 'Judul', 'tipe' => 'text', 'bawaan' => 'Butuh Layanan Ini?', 'peran' => 'judul' ),
						'cta_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Sampaikan kebutuhan operasi, pemeliharaan, atau konstruksi fasilitas Anda — tim kami siap menyusun lingkup kerja dan penawaran.', 'peran' => 'teks' ),
					),
				),

				'gambar' => array(
					'judul'       => 'Foto',
					'kolom'      => array(
						'foto_sumberdaya' => array( 'label' => 'Foto blok Sumber Daya di Lapangan', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/tim-tcm-di-area-operasi-2.jpg' ),
					),
				),
			),
		),

		'proyek' => array(
			'menu'    => 'Proyek',
			'judul'   => 'Konten Halaman Proyek',
			'bagian' => array(

				'meta_label' => array(
					'judul'       => 'Label Rincian Proyek',
					'kolom'      => array(
						'meta_klien' => array( 'label' => 'Label "Klien"', 'tipe' => 'text', 'bawaan' => 'Klien', 'peran' => 'label' ),
					),
				),

				'unggulan_isi' => array(
					'judul'       => 'Angka Ringkas & Tiga Proyek Unggulan',
					'keterangan'  => 'Tiga proyek yang ditonjolkan di bagian atas halaman, beserta empat angka ringkasnya. Dua angka pertama dihitung otomatis dari jumlah Proyek yang terbit.',
					'kolom'      => array(
						'num1_label' => array( 'label' => 'Angka 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Proyek tercatat', 'peran' => 'label' ),
						'num2_label' => array( 'label' => 'Angka 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Kontrak berjalan', 'peran' => 'label' ),
						'num3_nilai' => array( 'label' => 'Angka 3 — nilai', 'tipe' => 'text', 'bawaan' => '17', 'peran' => 'nilai' ),
						'num3_label' => array( 'label' => 'Angka 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Tahun kontrak terpanjang', 'peran' => 'label' ),
						'num4_nilai' => array( 'label' => 'Angka 4 — nilai', 'tipe' => 'text', 'bawaan' => '5', 'peran' => 'nilai' ),
						'num4_label' => array( 'label' => 'Angka 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Wilayah operasi', 'peran' => 'label' ),
						'ung1_chip' => array( 'label' => 'Unggulan 1 — label kategori', 'tipe' => 'text', 'bawaan' => 'PANAS BUMI', 'peran' => 'label' ),
						'ung1_judul' => array( 'label' => 'Unggulan 1 — judul', 'tipe' => 'text', 'bawaan' => 'Operation & Maintenance Support Services — Salak', 'peran' => 'judul' ),
						'ung1_klien' => array( 'label' => 'Unggulan 1 — pemberi tugas', 'tipe' => 'text', 'bawaan' => 'Star Energy Geothermal Salak, Ltd. & Salak Pratama, Ltd.' ),
						'ung1_teks' => array( 'label' => 'Unggulan 1 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Dukungan penuh operasi dan pemeliharaan salah satu lapangan panas bumi terbesar di dunia. TCM menempatkan tim multidisiplin di lokasi untuk menjaga keandalan fasilitas produksi uap dan pembangkit sepanjang masa kontrak tiga tahun.', 'peran' => 'teks' ),
						'ung1_lingkup' => array( 'label' => 'Unggulan 1 — lingkup pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Mechanical, electrical & instrumentation, rotating equipment, dan civil
Scaffolding, welding, machining, serta heavy equipment & lifting
Perencanaan & koordinasi material, asset management, SAP dan logistik
Dukungan SHE: emergency response dan pengawasan keselamatan harian', 'bantuan' => 'Satu baris satu butir.' ),
						'ung1_lokasi' => array( 'label' => 'Unggulan 1 — lokasi', 'tipe' => 'text', 'bawaan' => 'Gunung Salak, Sukabumi' ),
						'ung1_periode' => array( 'label' => 'Unggulan 1 — periode', 'tipe' => 'text', 'bawaan' => 'Des 2024 – Nov 2027' ),
						'ung1_status' => array( 'label' => 'Unggulan 1 — status', 'tipe' => 'text', 'bawaan' => 'Berjalan' ),
						'ung2_chip' => array( 'label' => 'Unggulan 2 — label kategori', 'tipe' => 'text', 'bawaan' => 'KONSTRUKSI', 'peran' => 'label' ),
						'ung2_judul' => array( 'label' => 'Unggulan 2 — judul', 'tipe' => 'text', 'bawaan' => 'Drilling Preparation & Well Hook-Up Construction', 'peran' => 'judul' ),
						'ung2_klien' => array( 'label' => 'Unggulan 2 — pemberi tugas', 'tipe' => 'text', 'bawaan' => 'Star Energy Geothermal (Wayang Windu) Limited' ),
						'ung2_teks' => array( 'label' => 'Unggulan 2 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Pekerjaan konstruksi terintegrasi untuk menyiapkan lokasi pemboran dan menghubungkan sumur baru ke jaringan produksi — dari lahan kosong hingga sistem siap commissioning.', 'peran' => 'teks' ),
						'ung2_lingkup' => array( 'label' => 'Unggulan 2 — lingkup pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Land clearing, pembangunan akses jalan, dan pekerjaan pondasi
Instalasi pipa, valve, dan peralatan; welding serta insulation
Instalasi sistem instrumentasi dan kabel elektrikal
Dokumentasi ITP dan as-built drawing hingga serah terima', 'bantuan' => 'Satu baris satu butir.' ),
						'ung2_lokasi' => array( 'label' => 'Unggulan 2 — lokasi', 'tipe' => 'text', 'bawaan' => 'Wayang Windu, Bandung Barat' ),
						'ung2_periode' => array( 'label' => 'Unggulan 2 — periode', 'tipe' => 'text', 'bawaan' => 'Nov 2025 – Nov 2027' ),
						'ung2_status' => array( 'label' => 'Unggulan 2 — status', 'tipe' => 'text', 'bawaan' => 'Berjalan' ),
						'ung3_chip' => array( 'label' => 'Unggulan 3 — label kategori', 'tipe' => 'text', 'bawaan' => 'MINYAK & GAS', 'peran' => 'label' ),
						'ung3_judul' => array( 'label' => 'Unggulan 3 — judul', 'tipe' => 'text', 'bawaan' => 'Dukungan Operasi Area Rokan', 'peran' => 'judul' ),
						'ung3_klien' => array( 'label' => 'Unggulan 3 — pemberi tugas', 'tipe' => 'text', 'bawaan' => 'PT Triguna Internusa Pratama' ),
						'ung3_teks' => array( 'label' => 'Unggulan 3 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Penyediaan tenaga kerja dan armada kendaraan ringan penumpang, serta konstruksi fasilitas pendukung, di blok produksi minyak bumi terbesar di Indonesia.', 'peran' => 'teks' ),
						'ung3_lingkup' => array( 'label' => 'Unggulan 3 — lingkup pekerjaan', 'tipe' => 'textarea', 'bawaan' => 'Penyediaan personel operasional termasuk driver dan dispatcher
Penyediaan dan pemeliharaan armada kendaraan ringan penumpang
Pekerjaan sipil dan fasilitas pendukung operasi & pemeliharaan
Koordinasi lapangan dan pemenuhan standar K3 sesuai spesifikasi', 'bantuan' => 'Satu baris satu butir.' ),
						'ung3_lokasi' => array( 'label' => 'Unggulan 3 — lokasi', 'tipe' => 'text', 'bawaan' => 'Area Rokan, Riau' ),
						'ung3_periode' => array( 'label' => 'Unggulan 3 — periode', 'tipe' => 'text', 'bawaan' => 'Des 2025 – Des 2028' ),
						'ung3_status' => array( 'label' => 'Unggulan 3 — status', 'tipe' => 'text', 'bawaan' => 'Berjalan' ),
						'meta_lokasi' => array( 'label' => 'Label "Lokasi"', 'tipe' => 'text', 'bawaan' => 'Lokasi', 'peran' => 'label' ),
						'meta_periode' => array( 'label' => 'Label "Periode"', 'tipe' => 'text', 'bawaan' => 'Periode', 'peran' => 'label' ),
						'meta_status' => array( 'label' => 'Label "Status"', 'tipe' => 'text', 'bawaan' => 'Status', 'peran' => 'label' ),
					),
				),

				'jambi' => array(
					'judul'       => 'Pengalaman Jambi',
					'keterangan'  => 'Blok khusus pengalaman minyak & gas bumi di Provinsi Jambi. Tampil di halaman Proyek dan di Beranda.',
					'kolom'      => array(
						'jambi_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Minyak & Gas Bumi', 'peran' => 'label' ),
						'jambi_judul' => array( 'label' => 'Judul', 'tipe' => 'kaya', 'bawaan' => 'Pengalaman Panjang di <em>Jambi</em>', 'peran' => 'judul' ),
						'jambi_teks' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Sejak 2009 TCM mengoperasikan dan memelihara sarana penyalur gas bumi milik PT Energasindo Heksa Karya di Provinsi Jambi — menyalurkan gas ke pembangkit listrik PT PLN (Persero). Dua ruas pipa sepanjang 47,5 km dijaga keandalannya tanpa henti selama tujuh belas tahun, dan menjadi fondasi kompetensi TCM di sektor minyak dan gas bumi.', 'peran' => 'teks' ),
						'jambi_s1_nilai' => array( 'label' => 'Angka 1 — nilai', 'tipe' => 'text', 'bawaan' => '17', 'peran' => 'nilai' ),
						'jambi_s1_label' => array( 'label' => 'Angka 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'tahun beroperasi', 'peran' => 'label' ),
						'jambi_s2_nilai' => array( 'label' => 'Angka 2 — nilai', 'tipe' => 'text', 'bawaan' => '47,5 km', 'peran' => 'nilai' ),
						'jambi_s2_label' => array( 'label' => 'Angka 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'total jalur pipa', 'peran' => 'label' ),
						'jambi_s3_nilai' => array( 'label' => 'Angka 3 — nilai', 'tipe' => 'text', 'bawaan' => '92,7', 'peran' => 'nilai' ),
						'jambi_s3_label' => array( 'label' => 'Angka 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'MMSCFD kapasitas', 'peran' => 'label' ),
						'jambi_foto' => array( 'label' => 'Foto lebar', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/stasiun-meter-gas-jambi.jpg' ),
						'jambi_kapsi' => array( 'label' => 'Keterangan foto lebar', 'tipe' => 'text', 'bawaan' => 'Stasiun meter gas yang dioperasikan TCM di Provinsi Jambi.', 'peran' => 'teks' ),
						'jr_t1' => array( 'label' => 'Bagan jalur — titik 1', 'tipe' => 'text', 'bawaan' => 'Tempino Kecil', 'peran' => 'label' ),
						'jr_s1' => array( 'label' => 'Bagan jalur — keterangan titik 1', 'tipe' => 'text', 'bawaan' => 'Muaro Jambi' ),
						'jr_t2' => array( 'label' => 'Bagan jalur — titik 2', 'tipe' => 'text', 'bawaan' => 'Payo Selincah', 'peran' => 'label' ),
						'jr_s2' => array( 'label' => 'Bagan jalur — keterangan titik 2', 'tipe' => 'text', 'bawaan' => 'PLTG PT PLN (Persero)' ),
						'jr_t3' => array( 'label' => 'Bagan jalur — titik 3', 'tipe' => 'text', 'bawaan' => 'Sei Gelam', 'peran' => 'label' ),
						'jr_s3' => array( 'label' => 'Bagan jalur — keterangan titik 3', 'tipe' => 'text', 'bawaan' => 'PLTG Sei Gelam' ),
						'jr_spec1' => array( 'label' => 'Bagan jalur — spesifikasi ruas 1', 'tipe' => 'text', 'bawaan' => '35,5 km · 12″ · 60 MMSCFD' ),
						'jr_spec2' => array( 'label' => 'Bagan jalur — spesifikasi ruas 2', 'tipe' => 'text', 'bawaan' => '12 km · 8″ · 32,7 MMSCFD' ),
						'jspec_l1' => array( 'label' => 'Label rincian 1', 'tipe' => 'text', 'bawaan' => 'Panjang', 'peran' => 'label' ),
						'jspec_l2' => array( 'label' => 'Label rincian 2', 'tipe' => 'text', 'bawaan' => 'Diameter', 'peran' => 'label' ),
						'jspec_l3' => array( 'label' => 'Label rincian 3', 'tipe' => 'text', 'bawaan' => 'Kapasitas', 'peran' => 'label' ),
						'jspec_l4' => array( 'label' => 'Label rincian 4', 'tipe' => 'text', 'bawaan' => 'Periode', 'peran' => 'label' ),
						'j1_judul' => array( 'label' => 'Ruas 1 — nama', 'tipe' => 'text', 'bawaan' => 'Payo Selincah, Jambi', 'peran' => 'judul' ),
						'j1_klien' => array( 'label' => 'Ruas 1 — pemberi tugas', 'tipe' => 'text', 'bawaan' => 'PT Energasindo Heksa Karya' ),
						'j1_panjang' => array( 'label' => 'Ruas 1 — panjang', 'tipe' => 'text', 'bawaan' => '35,5 km', 'peran' => 'nilai' ),
						'j1_diameter' => array( 'label' => 'Ruas 1 — diameter', 'tipe' => 'text', 'bawaan' => '12 inci', 'peran' => 'nilai' ),
						'j1_kapasitas' => array( 'label' => 'Ruas 1 — kapasitas', 'tipe' => 'text', 'bawaan' => '60 MMSCFD', 'peran' => 'nilai' ),
						'j1_periode' => array( 'label' => 'Ruas 1 — periode', 'tipe' => 'text', 'bawaan' => '2009–2025', 'peran' => 'nilai' ),
						'j1_teks' => array( 'label' => 'Ruas 1 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Operasi dan pemeliharaan sarana penyalur gas bumi dari Tempino Kecil menuju pembangkit listrik PT PLN (Persero) di Payo Selincah. Lingkup mencakup operasi penyaluran gas, pembacaan meter dan pelaporan, pemeliharaan rutin jalur pipa dan sarana pengukuran, penanganan kondisi darurat, serta pengelolaan aspek K3L — kontrak terpanjang TCM.', 'peran' => 'teks' ),
						'j1_foto' => array( 'label' => 'Ruas 1 — foto', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/teknisi-payo-selincah-jambi.jpg' ),
						'j2_judul' => array( 'label' => 'Ruas 2 — nama', 'tipe' => 'text', 'bawaan' => 'Sei Gelam, Jambi', 'peran' => 'judul' ),
						'j2_klien' => array( 'label' => 'Ruas 2 — pemberi tugas', 'tipe' => 'text', 'bawaan' => 'PT Energasindo Heksa Karya' ),
						'j2_panjang' => array( 'label' => 'Ruas 2 — panjang', 'tipe' => 'text', 'bawaan' => '12 km', 'peran' => 'nilai' ),
						'j2_diameter' => array( 'label' => 'Ruas 2 — diameter', 'tipe' => 'text', 'bawaan' => '8 inci', 'peran' => 'nilai' ),
						'j2_kapasitas' => array( 'label' => 'Ruas 2 — kapasitas', 'tipe' => 'text', 'bawaan' => '32,7 MMSCFD', 'peran' => 'nilai' ),
						'j2_periode' => array( 'label' => 'Ruas 2 — periode', 'tipe' => 'text', 'bawaan' => '2016–2025', 'peran' => 'nilai' ),
						'j2_teks' => array( 'label' => 'Ruas 2 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Kelanjutan jalur Payo Selincah yang mengalirkan gas ke PLTMG Sei Gelam milik PT PLN (Persero). Lingkup meliputi pengoperasian sistem penyaluran gas, pemantauan dan pembacaan meter, pemeliharaan jalur pipa dan fasilitas pengukuran, penyediaan tenaga kerja dan peralatan, hingga pelaporan operasional harian sampai bulanan.', 'peran' => 'teks' ),
						'j2_foto' => array( 'label' => 'Ruas 2 — foto', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/teknisi-sei-gelam-jambi.jpg' ),
						'jambi_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Angka panjang pipa, diameter, dan kapasitas di sini diambil dari situs lama TCM. Periksa ulang ke bagian operasi sebelum tayang, karena angka teknis seperti ini sering dikutip calon pelanggan.' ),
					),
				),

				'kepala' => array(
					'judul'       => 'Kepala Halaman',
					'kolom'      => array(
						'kepala_judul' => array( 'label' => 'Judul halaman', 'tipe' => 'kaya', 'bawaan' => 'Proyek yang <em>Telah Kami Kerjakan</em>', 'peran' => 'judul' ),
						'kepala_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'kontrak tercatat bersama operator panas bumi, minyak dan gas bumi, serta ketenagalistrikan terkemuka di Indonesia — dari Jambi dan Riau hingga Gunung Salak dan Wayang Windu.', 'peran' => 'subjudul', 'bantuan' => 'Jumlah kontrak di depan kalimat dihitung otomatis oleh sistem.' ),
					),
				),

				'unggulan' => array(
					'judul'       => 'Proyek Unggulan',
					'kolom'      => array(
						'ung_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Proyek Unggulan', 'peran' => 'label' ),
						'ung_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Tiga Kontrak <em>Utama Saat Ini</em>', 'peran' => 'judul' ),
						'ung_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Proyek berjalan dengan lingkup terluas dan tim terbesar di lapangan.', 'peran' => 'teks' ),
					),
				),

				'daftar' => array(
					'judul'       => 'Daftar Lengkap',
					'keterangan'  => 'Entri proyek ditambah lewat menu Proyek.',
					'kolom'      => array(
						'daftar_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Daftar Lengkap', 'peran' => 'label' ),
						'daftar_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Klik setiap baris untuk membuka rincian lingkup pekerjaan sesuai kontrak. Gunakan penyaring di bawah untuk melihat proyek per bidang.', 'peran' => 'teks' ),
						'daftar_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Judul bagian ini ("Empat Belas Proyek", dan seterusnya) dihitung otomatis dari jumlah entri proyek, jadi tidak perlu diketik manual.' ),
						'daftar_rupiah' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Nilai kontrak dalam rupiah TIDAK boleh ditampilkan di website. Periksa entri proyek sebelum tayang.' ),
					),
				),

				'dokumentasi' => array(
					'judul'       => 'Dokumentasi Lapangan',
					'kolom'      => array(
						'dok_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Dokumentasi', 'peran' => 'label' ),
						'dok_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Pekerjaan <em>di Lapangan</em>', 'peran' => 'judul' ),
						'dok_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Foto kegiatan tim TCM di area operasi — klik untuk memperbesar.', 'peran' => 'teks' ),
					),
				),

				'klien' => array(
					'judul'       => 'Klien & Mitra',
					'kolom'      => array(
						'klien_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Dipercaya Oleh', 'peran' => 'label' ),
						'klien_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Klien & <em>Mitra Kami</em>', 'peran' => 'judul' ),
					),
				),

				'ajakan' => array(
					'judul'       => 'Kotak Ajakan Penutup',
					'kolom'      => array(
						'cta_judul' => array( 'label' => 'Judul', 'tipe' => 'text', 'bawaan' => 'Punya Pekerjaan Serupa?', 'peran' => 'judul' ),
						'cta_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Kami siap mendukung operasi, pemeliharaan, dan konstruksi fasilitas energi Anda dengan tim bersertifikat serta rekam jejak keselamatan yang terbukti.', 'peran' => 'teks' ),
					),
				),

				'foto_unggulan' => array(
					'judul'       => 'Foto Proyek Unggulan',
					'kolom'      => array(
						'foto_unggul1' => array( 'label' => 'Foto proyek unggulan 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/star-energy-geothermal-salak.jpg' ),
						'foto_unggul2' => array( 'label' => 'Foto proyek unggulan 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/drilling-preparation-well-hook-up-construction.jpg' ),
						'foto_unggul3' => array( 'label' => 'Foto proyek unggulan 3', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/area-rokan-riau.jpg' ),
					),
				),

				'foto_galeri' => array(
					'judul'       => 'Foto Dokumentasi Lapangan',
					'keterangan'  => 'Delapan foto kegiatan.',
					'kolom'      => array(
						'foto_galeri1' => array( 'label' => 'Foto dokumentasi 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/drilling-preparation-well-hook-up-construction.jpg' ),
						'foto_galeri2' => array( 'label' => 'Foto dokumentasi 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/shut-down-turn-around-welding.jpg' ),
						'foto_galeri3' => array( 'label' => 'Foto dokumentasi 3', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/penggantian-aft-jalur-kondensat.jpg' ),
						'foto_galeri4' => array( 'label' => 'Foto dokumentasi 4', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pembersihan-heat-exchanger-orc.jpg' ),
						'foto_galeri5' => array( 'label' => 'Foto dokumentasi 5', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/fabrikasi-instalasi-rock-muffler.jpg' ),
						'foto_galeri6' => array( 'label' => 'Foto dokumentasi 6', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/perbaikan-dan-pemeliharaan-jalan.jpg' ),
						'foto_galeri7' => array( 'label' => 'Foto dokumentasi 7', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/tim-welding-di-area-operasi.jpg' ),
						'foto_galeri8' => array( 'label' => 'Foto dokumentasi 8', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pemeliharaan-valve-perpipaan.jpg' ),
						'foto_galeri9' => array( 'label' => 'Foto galeri 9', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/armada-krp-area-rokan.jpg' ),
						'foto_galeri10' => array( 'label' => 'Foto galeri 10', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/koordinasi-tim-area-rokan.jpg' ),
						'gal_cap1' => array( 'label' => 'Foto galeri 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Persiapan pemboran & well hook-up' ),
						'gal_cap2' => array( 'label' => 'Foto galeri 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Shut Down Turn Around — welding' ),
						'gal_cap3' => array( 'label' => 'Foto galeri 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Penggantian AFT & jalur kondensat' ),
						'gal_cap4' => array( 'label' => 'Foto galeri 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Pembersihan heat exchanger ORC' ),
						'gal_cap5' => array( 'label' => 'Foto galeri 5 — keterangan', 'tipe' => 'text', 'bawaan' => 'Fabrikasi & instalasi rock muffler' ),
						'gal_cap6' => array( 'label' => 'Foto galeri 6 — keterangan', 'tipe' => 'text', 'bawaan' => 'Perbaikan dan pemeliharaan jalan' ),
						'gal_cap7' => array( 'label' => 'Foto galeri 7 — keterangan', 'tipe' => 'text', 'bawaan' => 'Tim welding di area operasi' ),
						'gal_cap8' => array( 'label' => 'Foto galeri 8 — keterangan', 'tipe' => 'text', 'bawaan' => 'Pemeliharaan valve & perpipaan' ),
						'gal_cap9' => array( 'label' => 'Foto galeri 9 — keterangan', 'tipe' => 'text', 'bawaan' => 'Armada KRP di Area Rokan' ),
						'gal_cap10' => array( 'label' => 'Foto galeri 10 — keterangan', 'tipe' => 'text', 'bawaan' => 'Koordinasi tim di Area Rokan' ),
						'gal_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Mengosongkan kolom keterangan akan menyembunyikan foto itu dari galeri. Dipakai kalau ingin menampilkan kurang dari sepuluh foto.' ),
					),
				),

				'logo_klien' => array(
					'judul'       => 'Logo Klien & Mitra',
					'keterangan'  => 'Delapan logo.',
					'kolom'      => array(
						'logo_klien1' => array( 'label' => 'Logo klien 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/star-energy-geothermal.png' ),
						'logo_klien2' => array( 'label' => 'Logo klien 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/triguna-internusa-pratama.png' ),
						'logo_klien3' => array( 'label' => 'Logo klien 3', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-pln-persero.png' ),
						'logo_klien4' => array( 'label' => 'Logo klien 4', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pln-indonesia-power.png' ),
						'logo_klien5' => array( 'label' => 'Logo klien 5', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-energasindo-heksa-karya.png' ),
						'logo_klien6' => array( 'label' => 'Logo klien 6', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-pertamina-gas.png' ),
						'logo_klien7' => array( 'label' => 'Logo klien 7', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-transportasi-gas-indonesia.png' ),
						'logo_klien8' => array( 'label' => 'Logo klien 8', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pt-trakindo-utama.png' ),
					),
				),
			),
		),

		'sertifikat' => array(
			'menu'    => 'Sertifikat',
			'judul'   => 'Konten Halaman Sertifikat & Penghargaan',
			'bagian' => array(

				'label' => array(
					'judul'       => 'Tautan Lompat, Angka & Catatan',
					'keterangan'  => 'Tulisan tautan lompat di atas halaman, keterangan empat angka, dan catatan tanda air.',
					'kolom'      => array(
						'nav1' => array( 'label' => 'Tautan lompat 1', 'tipe' => 'text', 'bawaan' => 'Sistem Manajemen', 'peran' => 'tombol' ),
						'nav2' => array( 'label' => 'Tautan lompat 2', 'tipe' => 'text', 'bawaan' => 'CSMS & Pra-Kualifikasi', 'peran' => 'tombol' ),
						'nav3' => array( 'label' => 'Tautan lompat 3', 'tipe' => 'text', 'bawaan' => 'Penghargaan', 'peran' => 'tombol' ),
						'nav4' => array( 'label' => 'Tautan lompat 4', 'tipe' => 'text', 'bawaan' => 'Legalitas', 'peran' => 'tombol' ),
						'num1_label' => array( 'label' => 'Angka 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Sertifikasi sistem manajemen', 'peran' => 'label' ),
						'num2_label' => array( 'label' => 'Angka 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'CSMS & pra-kualifikasi klien', 'peran' => 'label' ),
						'num3_label' => array( 'label' => 'Angka 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Penghargaan diterima', 'peran' => 'label' ),
						'num4_label' => array( 'label' => 'Angka 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Jam kerja tanpa cedera tercatat', 'peran' => 'label' ),
						'wm_judul' => array( 'label' => 'Catatan tanda air — judul', 'tipe' => 'text', 'bawaan' => 'Tentang tanda air pada dokumen', 'peran' => 'judul' ),
						'wm_teks' => array( 'label' => 'Catatan tanda air — uraian', 'tipe' => 'textarea', 'bawaan' => 'Seluruh sertifikat dan piagam di halaman ini ditampilkan dalam resolusi terbatas dengan tanda air resmi PT Trimitra Cipta Mandiri, untuk mencegah penyalahgunaan oleh pihak yang tidak berkepentingan. Salinan asli tanpa tanda air hanya diberikan melalui permintaan resmi ke {email}.', 'peran' => 'teks', 'bantuan' => 'Tulis {email} di tempat alamat surel perusahaan harus muncul — alamatnya diambil otomatis dari Konten Website → Kontak.' ),
						'cta_tombol' => array( 'label' => 'Tulisan tombol ajakan bawah', 'tipe' => 'text', 'bawaan' => 'Hubungi Kami', 'peran' => 'tombol' ),
					),
				),

				'kepala' => array(
					'judul'       => 'Kepala Halaman',
					'kolom'      => array(
						'kepala_judul' => array( 'label' => 'Judul halaman', 'tipe' => 'kaya', 'bawaan' => 'Sertifikat & <em>Penghargaan</em>', 'peran' => 'judul' ),
						'kepala_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Bukti sistem manajemen, kualifikasi keselamatan, dan pengakuan dari klien maupun pemerintah — ditampilkan terbuka agar mudah diverifikasi calon mitra kerja.', 'peran' => 'subjudul' ),
						'kepala_watermark' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Setiap gambar sertifikat dan penghargaan wajib sudah diberi watermark logo TCM sebelum diunggah. Entri dokumennya ditambah lewat menu Sertifikat, bukan dari sini.' ),
						'kepala_alamat' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Sertifikat ISO 9001/14001/45001 dan e-CHSEMS masih mencantumkan alamat lama (Thamrin). Perlu diperbarui ke Graha Iskandarsyah.' ),
					),
				),

				'iso' => array(
					'judul'       => 'Kelompok ISO & SMK3',
					'kolom'      => array(
						'iso_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Sistem Manajemen', 'peran' => 'label' ),
						'iso_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Sertifikasi <em>ISO & SMK3</em>', 'peran' => 'judul' ),
						'iso_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Tiga standar internasional dan satu standar nasional yang menjadi dasar cara kerja TCM — mutu, lingkungan, dan keselamatan kerja.', 'peran' => 'teks' ),
					),
				),

				'csms' => array(
					'judul'       => 'Kelompok CSMS',
					'kolom'      => array(
						'csms_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Kualifikasi Klien', 'peran' => 'label' ),
						'csms_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'CSMS & <em>Pra-Kualifikasi</em>', 'peran' => 'judul' ),
						'csms_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Lulus penilaian Contractor Safety, Health & Environment Management System dari operator panas bumi, ketenagalistrikan, dan transmisi gas, serta terdaftar pada e-CHSEMS SKK Migas.', 'peran' => 'teks' ),
					),
				),

				'penghargaan' => array(
					'judul'       => 'Kelompok Penghargaan',
					'kolom'      => array(
						'peng_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Pengakuan', 'peran' => 'label' ),
						'peng_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Penghargaan <em>yang Kami Terima</em>', 'peran' => 'judul' ),
						'peng_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Diberikan oleh klien, pemerintah daerah, dan kementerian atas kinerja keselamatan kerja, mutu pekerjaan, dan program sosial perusahaan.', 'peran' => 'teks' ),
					),
				),

				'legalitas' => array(
					'judul'       => 'Kelompok Legalitas',
					'kolom'      => array(
						'leg_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Legalitas', 'peran' => 'label' ),
						'leg_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Izin Usaha & <em>Dokumen Perusahaan</em>', 'peran' => 'judul' ),
						'leg_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Perizinan yang mendasari kegiatan usaha PT Trimitra Cipta Mandiri.', 'peran' => 'teks' ),
					),
				),

				'ajakan' => array(
					'judul'       => 'Kotak Ajakan Penutup',
					'kolom'      => array(
						'cta_judul' => array( 'label' => 'Judul', 'tipe' => 'text', 'bawaan' => 'Butuh Dokumen Resmi?', 'peran' => 'judul' ),
						'cta_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Untuk keperluan tender, pra-kualifikasi, atau verifikasi vendor, tim kami siap mengirimkan salinan sertifikat dan dokumen legalitas melalui surat resmi.', 'peran' => 'teks' ),
					),
				),
			),
		),

		'esg' => array(
			'menu'    => 'ESG',
			'judul'   => 'Konten Halaman ESG',
			'bagian' => array(

				'foto_kapsi' => array(
					'judul'       => 'Keterangan Foto Dokumentasi',
					'kolom'      => array(
						'foto_cap1' => array( 'label' => 'Keterangan foto 1', 'tipe' => 'text', 'bawaan' => 'Penanaman pohon di wilayah operasi' ),
						'foto_cap2' => array( 'label' => 'Keterangan foto 2', 'tipe' => 'text', 'bawaan' => 'Penanaman bibit pohon oleh personel TCM' ),
						'foto_cap3' => array( 'label' => 'Keterangan foto 3', 'tipe' => 'text', 'bawaan' => 'Bantuan kemanusiaan korban banjir & tanah longsor, Kab. Sukabumi' ),
						'foto_cap4' => array( 'label' => 'Keterangan foto 4', 'tipe' => 'text', 'bawaan' => 'Penyaluran logistik bantuan bencana' ),
						'foto_cap5' => array( 'label' => 'Keterangan foto 5', 'tipe' => 'text', 'bawaan' => 'Penyerahan bantuan di posko bencana' ),
					),
				),

				'butir' => array(
					'judul'       => 'Butir Capaian E, S, dan G',
					'keterangan'  => 'Daftar capaian pada tiga pilar ESG. Inilah bagian yang paling sering diperbarui saat ada sertifikat atau penghargaan baru.',
					'kolom'      => array(
						'e_nama' => array( 'label' => 'Pilar E — nama', 'tipe' => 'text', 'bawaan' => 'Lingkungan', 'peran' => 'judul' ),
						'e_nama_en' => array( 'label' => 'Pilar E — nama Inggris', 'tipe' => 'text', 'bawaan' => 'Environmental', 'peran' => 'label' ),
						'e_butir' => array( 'label' => 'Pilar E — daftar butir', 'tipe' => 'textarea', 'bawaan' => 'ISO 14001:2015 — Sistem Manajemen Lingkungan | Berlaku untuk seluruh lingkup pekerjaan operasi, pemeliharaan, dan konstruksi.
Dukungan pada energi panas bumi | Sebagian besar pekerjaan TCM berada di fasilitas panas bumi — Gunung Salak, Wayang Windu, dan pengembangan Cisolok.
Izin Usaha Penunjang Panas Bumi | Konstruksi UPJ1-4/X/2021 dan Non-Konstruksi UPJ2-1/XII/2023.
Penanganan limbah pekerjaan | Mengikuti prosedur sistem manajemen lingkungan ISO 14001 dan ketentuan klien di setiap lokasi kerja.', 'bantuan' => 'Satu butir per baris, dengan tanda | memisahkan judul dan keterangannya. Contoh: ISO 14001:2015 | Berlaku untuk seluruh lingkup pekerjaan. Butir tanpa tanda | akan tampil sebagai judul saja.' ),
						's_nama' => array( 'label' => 'Pilar S — nama', 'tipe' => 'text', 'bawaan' => 'Sosial', 'peran' => 'judul' ),
						's_nama_en' => array( 'label' => 'Pilar S — nama Inggris', 'tipe' => 'text', 'bawaan' => 'Social', 'peran' => 'label' ),
						's_butir' => array( 'label' => 'Pilar S — daftar butir', 'tipe' => 'textarea', 'bawaan' => 'Zero Accident 2024 | Penghargaan nihil kecelakaan kerja.
Zero Incident SEGS 2026 | Dari Star Energy Geothermal Salak.
SMK3 — kategori Tingkat Lanjutan | SK Menteri Ketenagakerjaan RI No. 349 Tahun 2025, pencapaian 90,96%.
Penghargaan P2-HIV & AIDS — Gold 2024 dan 2025 | Program pencegahan dan penanggulangan HIV & AIDS di tempat kerja.
Penghargaan PMI 2025 | Kepedulian donor darah.
Sertifikat CSR | Kontribusi sosial dan lingkungan di sekitar wilayah operasi.', 'bantuan' => 'Satu butir per baris, dengan tanda | memisahkan judul dan keterangannya. Contoh: ISO 14001:2015 | Berlaku untuk seluruh lingkup pekerjaan. Butir tanpa tanda | akan tampil sebagai judul saja.' ),
						'g_nama' => array( 'label' => 'Pilar G — nama', 'tipe' => 'text', 'bawaan' => 'Tata Kelola', 'peran' => 'judul' ),
						'g_nama_en' => array( 'label' => 'Pilar G — nama Inggris', 'tipe' => 'text', 'bawaan' => 'Governance', 'peran' => 'label' ),
						'g_butir' => array( 'label' => 'Pilar G — daftar butir', 'tipe' => 'textarea', 'bawaan' => 'ISO 9001:2015 — Sistem Manajemen Mutu | Sistem mutu yang diaudit berkala oleh lembaga sertifikasi.
ISO 45001:2018 — Kesehatan & Keselamatan Kerja | Standar internasional keselamatan dan kesehatan kerja.
Certificate e-CHSEMS SKK Migas | Berlaku sampai 13 Juni 2027.
Pra-kualifikasi CSMS klien | Star Energy Geothermal, PLN Indonesia Power, dan PT Transportasi Gas Indonesia.
Panitia Pembina K3 (P2K3) | Sertifikat pengesahan P2K3 dari instansi ketenagakerjaan.
Legalitas usaha lengkap | NIB, IUJK, izin usaha penunjang panas bumi, dan NPWP — rinciannya ada di halaman Sertifikat & Legalitas.', 'bantuan' => 'Satu butir per baris, dengan tanda | memisahkan judul dan keterangannya. Contoh: ISO 14001:2015 | Berlaku untuk seluruh lingkup pekerjaan. Butir tanpa tanda | akan tampil sebagai judul saja.' ),
						'dok_label' => array( 'label' => 'Label di atas foto dokumentasi', 'tipe' => 'text', 'bawaan' => 'Dokumentasi Kegiatan', 'peran' => 'label' ),
						'catatan_awal' => array( 'label' => 'Catatan bawah — kalimat pertama', 'tipe' => 'kaya', 'bawaan' => 'Seluruh capaian di halaman ini dibuktikan dengan sertifikat dan penghargaan yang dapat diperiksa pada halaman', 'peran' => 'teks' ),
						'catatan_tautan' => array( 'label' => 'Catatan bawah — tulisan tautan', 'tipe' => 'text', 'bawaan' => 'Sertifikat & Penghargaan', 'peran' => 'tombol' ),
						'catatan_akhir' => array( 'label' => 'Catatan bawah — kalimat penutup', 'tipe' => 'kaya', 'bawaan' => 'TCM belum menerbitkan laporan keberlanjutan dengan indikator terukur; halaman ini memuat praktik yang sudah berjalan dan terverifikasi.', 'peran' => 'teks' ),
						'tombol' => array( 'label' => 'Tulisan tombol bawah', 'tipe' => 'text', 'bawaan' => 'Lihat Sertifikat & Penghargaan', 'peran' => 'tombol' ),
					),
				),

				'kepala' => array(
					'judul'       => 'Kepala Halaman',
					'kolom'      => array(
						'kepala_judul' => array( 'label' => 'Judul halaman', 'tipe' => 'kaya', 'bawaan' => 'ESG — <em>Lingkungan, Sosial & Tata Kelola</em>', 'peran' => 'judul' ),
						'kepala_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Komitmen kami pada lingkungan, keselamatan dan kesejahteraan orang, serta tata kelola yang tertib — seluruhnya dibuktikan dengan sertifikat dan penghargaan yang dapat diperiksa.', 'peran' => 'subjudul' ),
						'kepala_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Halaman ini sengaja hanya memuat fakta yang dibuktikan sertifikat atau penghargaan. Jangan menambah angka keberlanjutan (persentase emisi, jam kerja aman, dan sebagainya) tanpa dokumen pendukung.' ),
					),
				),

				'lingkungan' => array(
					'judul'       => 'Pilar Lingkungan',
					'kolom'      => array(
						'e_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Seluruh pekerjaan operasi dan pemeliharaan TCM dijalankan di bawah sistem manajemen lingkungan bersertifikat, dan sebagian besar berlangsung di fasilitas energi terbarukan.', 'peran' => 'teks' ),
					),
				),

				'sosial' => array(
					'judul'       => 'Pilar Sosial',
					'kolom'      => array(
						's_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Keselamatan pekerja adalah ukuran pertama keberhasilan pekerjaan kami. Di luar itu, TCM aktif pada program kesehatan kerja dan kepedulian sosial bersama klien dan pemerintah.', 'peran' => 'teks' ),
					),
				),

				'tatakelola' => array(
					'judul'       => 'Pilar Tata Kelola',
					'kolom'      => array(
						'g_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'TCM adalah bagian dari PT Rukun Raharja Tbk (IDX: RAJA), perusahaan terbuka yang tunduk pada ketentuan keterbukaan pasar modal. Sistem kerja TCM sendiri diperiksa berkala melalui sertifikasi dan pra-kualifikasi klien.', 'peran' => 'teks' ),
					),
				),

				'gambar' => array(
					'judul'       => 'Foto Dokumentasi',
					'kolom'      => array(
						'foto_e1' => array( 'label' => 'Lingkungan — foto 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/penanaman-pohon-di-wilayah-operasi.jpg' ),
						'foto_e2' => array( 'label' => 'Lingkungan — foto 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/penanaman-bibit-pohon-oleh-personel-tcm.jpg' ),
						'foto_s1' => array( 'label' => 'Sosial — foto 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/bantuan-kemanusiaan-korban-banjir-tanah-longsor-.jpg' ),
						'foto_s2' => array( 'label' => 'Sosial — foto 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/penyaluran-logistik-bantuan-bencana.jpg' ),
						'foto_s3' => array( 'label' => 'Sosial — foto 3', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/penyerahan-bantuan-di-posko-bencana.jpg' ),
					),
				),
			),
		),

		'kontak' => array(
			'menu'    => 'Kontak',
			'judul'   => 'Konten Halaman Kontak',
			'bagian' => array(

				'kepala' => array(
					'judul'       => 'Kepala Halaman',
					'kolom'      => array(
						'kepala_judul' => array( 'label' => 'Judul halaman', 'tipe' => 'kaya', 'bawaan' => 'Hubungi <em>Kami</em>', 'peran' => 'judul' ),
						'kepala_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Untuk permintaan penawaran, pra-kualifikasi vendor, permintaan dokumen resmi, atau kerja sama — silakan hubungi kantor pusat kami.', 'peran' => 'subjudul' ),
					),
				),

				'kantor' => array(
					'judul'       => 'Kantor Pusat',
					'keterangan'  => 'Data yang paling sering ditanya calon klien.',
					'kolom'      => array(
						'kantor_alamat' => array( 'label' => 'Alamat', 'tipe' => 'kaya', 'bawaan' => 'Graha Iskandarsyah Lantai 4<br>Jl. Iskandarsyah Raya No. 66 C5, Melawai<br>Kebayoran Baru, Jakarta Selatan 12160', 'peran' => 'teks', 'bantuan' => 'Gunakan <br> untuk pindah baris.' ),
						'kantor_telepon' => array( 'label' => 'Telepon', 'tipe' => 'telepon', 'bawaan' => '(021) 3970 9911 / 9912 / 9913', 'peran' => 'label' ),
						'kantor_email' => array( 'label' => 'Surel', 'tipe' => 'email', 'bawaan' => 'tcm@trimitraciptamandiri.com', 'peran' => 'label', 'bantuan' => 'Kalau surel diganti, alamat pada tautan mailto di tema juga perlu disesuaikan.' ),
						'kantor_jam' => array( 'label' => 'Jam operasional', 'tipe' => 'text', 'bawaan' => 'Senin–Jumat, 08.00–17.00 WIB', 'peran' => 'teks' ),
						'kartu_judul' => array( 'label' => 'Judul kartu kontak', 'tipe' => 'text', 'bawaan' => 'Kantor Pusat', 'peran' => 'judul' ),
						'baris_alamat' => array( 'label' => 'Label baris alamat', 'tipe' => 'text', 'bawaan' => 'Kantor Pusat', 'peran' => 'label' ),
						'baris_telepon' => array( 'label' => 'Label baris telepon', 'tipe' => 'text', 'bawaan' => 'Telepon', 'peran' => 'label' ),
						'baris_email' => array( 'label' => 'Label baris surel', 'tipe' => 'text', 'bawaan' => 'Email', 'peran' => 'label' ),
						'baris_jam' => array( 'label' => 'Label baris jam', 'tipe' => 'text', 'bawaan' => 'Jam Operasional', 'peran' => 'label' ),
						'peta_url' => array( 'label' => 'Tautan Google Maps', 'tipe' => 'url', 'bawaan' => 'https://www.google.com/maps/search/?api=1&query=Graha+Iskandarsyah+Jl+Iskandarsyah+Raya+66+Kebayoran+Baru+Jakarta+Selatan', 'bantuan' => 'Buka Google Maps, cari alamat kantor, klik Bagikan lalu salin tautannya ke sini.' ),
						'peta_tombol' => array( 'label' => 'Tulisan tombol peta', 'tipe' => 'text', 'bawaan' => 'Buka di Google Maps', 'peran' => 'tombol' ),
						'jangkauan_tombol' => array( 'label' => 'Tulisan tombol peta jangkauan', 'tipe' => 'text', 'bawaan' => 'Lihat Peta Jangkauan Operasi', 'peran' => 'tombol' ),
						'cta_tombol' => array( 'label' => 'Tulisan tombol ajakan bawah', 'tipe' => 'text', 'bawaan' => 'Lihat Karier', 'peran' => 'tombol' ),
					),
				),

				'formulir' => array(
					'judul'       => 'Formulir Pesan',
					'kolom'      => array(
						'form_judul' => array( 'label' => 'Judul formulir', 'tipe' => 'text', 'bawaan' => 'Kirim Pesan', 'peran' => 'judul' ),
						'form_sub' => array( 'label' => 'Kalimat di bawah judul', 'tipe' => 'textarea', 'bawaan' => 'Kami akan menghubungi Anda kembali pada hari kerja berikutnya.', 'peran' => 'teks' ),
						'form_catatan' => array( 'label' => 'Catatan di bawah formulir', 'tipe' => 'textarea', 'bawaan' => 'Catatan prototype: formulir ini belum terhubung ke email perusahaan. Sambungannya dipasang saat website dipindahkan ke server.', 'peran' => 'teks', 'bantuan' => 'Hapus kalimat ini setelah formulir benar-benar tersambung ke surel perusahaan.' ),
						'form_sumber' => array( 'label' => 'Formulir yang dipakai', 'tipe' => 'pilihan', 'bawaan' => 'bawaan', 'pilihan' => array( 'bawaan' => 'Formulir bawaan tema (TIDAK mengirim surel)', 'plugin' => 'Plugin formulir — pesan masuk ke surel' ), 'bantuan' => 'Formulir bawaan tema hanya tampilan, peninggalan masa prototipe. Sebelum situs dipakai umum, pasang plugin formulir lalu pilih "Plugin formulir" di sini.' ),
						'form_shortcode' => array( 'label' => 'Shortcode plugin formulir', 'tipe' => 'text', 'bawaan' => '', 'bantuan' => 'Contoh: [contact-form-7 id="123"] untuk Contact Form 7, [wpforms id="123"] untuk WPForms, atau [fluentform id="1"] untuk Fluent Forms. Salin persis dari halaman pengaturan pluginnya.' ),
						'f_nama' => array( 'label' => 'Label isian nama', 'tipe' => 'text', 'bawaan' => 'Nama Lengkap', 'peran' => 'label' ),
						'f_pt' => array( 'label' => 'Label isian perusahaan', 'tipe' => 'text', 'bawaan' => 'Perusahaan / Instansi', 'peran' => 'label' ),
						'f_email' => array( 'label' => 'Label isian surel', 'tipe' => 'text', 'bawaan' => 'Email', 'peran' => 'label' ),
						'f_telp' => array( 'label' => 'Label isian telepon', 'tipe' => 'text', 'bawaan' => 'Telepon', 'peran' => 'label' ),
						'f_hal' => array( 'label' => 'Label isian keperluan', 'tipe' => 'text', 'bawaan' => 'Keperluan', 'peran' => 'label' ),
						'f_pesan' => array( 'label' => 'Label isian pesan', 'tipe' => 'text', 'bawaan' => 'Pesan', 'peran' => 'label' ),
						'f_pilihan' => array( 'label' => 'Daftar pilihan keperluan', 'tipe' => 'textarea', 'bawaan' => "Permintaan penawaran / RFQ\nPra-kualifikasi vendor & CSMS\nPermintaan salinan sertifikat resmi\nKerja sama & kemitraan\nLamaran pekerjaan\nLainnya", 'bantuan' => 'Satu pilihan per baris.' ),
						'f_tombol' => array( 'label' => 'Tulisan tombol kirim', 'tipe' => 'text', 'bawaan' => 'Kirim Pesan', 'peran' => 'tombol' ),
						'form_peringatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'PENTING SEBELUM SITUS DIPAKAI UMUM: formulir bawaan tema tidak mengirim apa pun ke surel perusahaan — pesan pengunjung akan hilang begitu saja. Pasang plugin formulir (WPForms Lite, Fluent Forms, atau Contact Form 7), buat satu formulir, lalu tempel shortcode-nya di kolom di atas dan ubah pilihan menjadi "Plugin formulir".' ),
					),
				),

				'lokasi' => array(
					'judul'       => 'Kantor & Lokasi Operasi',
					'kolom'      => array(
						'lok_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Kehadiran Kami', 'peran' => 'label' ),
						'lok_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Kantor & <em>Lokasi Operasi</em>', 'peran' => 'judul' ),
						'lok_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Selain kantor pusat di Jakarta, tim kami berada langsung di lokasi klien untuk memastikan respons cepat.', 'peran' => 'teks' ),
						'off1_label' => array( 'label' => 'Lokasi 1 — label', 'tipe' => 'text', 'bawaan' => 'Kantor Pusat', 'peran' => 'label' ),
						'off1_judul' => array( 'label' => 'Lokasi 1 — nama', 'tipe' => 'text', 'bawaan' => 'Jakarta Selatan', 'peran' => 'judul' ),
						'off1_teks' => array( 'label' => 'Lokasi 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Graha Iskandarsyah Lantai 4, Kebayoran Baru — administrasi, keuangan, pengadaan, dan manajemen proyek.', 'peran' => 'teks' ),
						'off2_label' => array( 'label' => 'Lokasi 2 — label', 'tipe' => 'text', 'bawaan' => 'Kantor Proyek', 'peran' => 'label' ),
						'off2_judul' => array( 'label' => 'Lokasi 2 — nama', 'tipe' => 'text', 'bawaan' => 'Gunung Salak & Wayang Windu, Jawa Barat', 'peran' => 'judul' ),
						'off2_teks' => array( 'label' => 'Lokasi 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Tim residen operasi dan pemeliharaan fasilitas panas bumi Star Energy Geothermal.', 'peran' => 'teks' ),
						'off3_label' => array( 'label' => 'Lokasi 3 — label', 'tipe' => 'text', 'bawaan' => 'Kantor Proyek', 'peran' => 'label' ),
						'off3_judul' => array( 'label' => 'Lokasi 3 — nama', 'tipe' => 'text', 'bawaan' => 'Area Rokan (Riau) & Jambi', 'peran' => 'judul' ),
						'off3_teks' => array( 'label' => 'Lokasi 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Dukungan operasi lapangan minyak dan gas bumi, tenaga kerja, armada, dan fasilitas penyalur gas.', 'peran' => 'teks' ),
					),
				),

				'ajakan' => array(
					'judul'       => 'Kotak Ajakan Penutup',
					'kolom'      => array(
						'cta_judul' => array( 'label' => 'Judul', 'tipe' => 'text', 'bawaan' => 'Ingin Bergabung dengan Tim Kami?', 'peran' => 'judul' ),
						'cta_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Kami membuka kesempatan bagi tenaga teknik, konstruksi, HSE, dan dukungan operasi untuk berkembang di sektor energi.', 'peran' => 'teks' ),
					),
				),
			),
		),

		'karier' => array(
			'menu'    => 'Karier',
			'judul'   => 'Konten Halaman Karier',
			'bagian' => array(

				'posisi_daftar' => array(
					'judul'       => 'Kelompok Posisi & Cara Melamar',
					'keterangan'  => 'Daftar bidang pekerjaan yang biasa dibuka TCM. Kalau ada lowongan aktif dari Departemen SDM, tulis di sini.',
					'kolom'      => array(
						'rol1_judul' => array( 'label' => 'Kelompok 1 — judul', 'tipe' => 'text', 'bawaan' => 'Teknik & Operasi', 'peran' => 'judul' ),
						'rol1_daftar' => array( 'label' => 'Kelompok 1 — daftar posisi', 'tipe' => 'textarea', 'bawaan' => 'Operator fasilitas produksi dan penyalur gas
Teknisi mekanikal, rotating equipment, dan valve
Teknisi elektrikal dan instrumentasi
Welder dan operator machining bersertifikat', 'bantuan' => 'Satu posisi per baris. Kosongkan judul atau daftarnya untuk menyembunyikan kelompok ini.' ),
						'rol2_judul' => array( 'label' => 'Kelompok 2 — judul', 'tipe' => 'text', 'bawaan' => 'Konstruksi & Sipil', 'peran' => 'judul' ),
						'rol2_daftar' => array( 'label' => 'Kelompok 2 — daftar posisi', 'tipe' => 'textarea', 'bawaan' => 'Pengawas dan pelaksana pekerjaan sipil
Scaffolder bersertifikat
Operator alat berat dan rigger
Drafter dan juru ukur', 'bantuan' => 'Satu posisi per baris. Kosongkan judul atau daftarnya untuk menyembunyikan kelompok ini.' ),
						'rol3_judul' => array( 'label' => 'Kelompok 3 — judul', 'tipe' => 'text', 'bawaan' => 'HSE & Mutu', 'peran' => 'judul' ),
						'rol3_daftar' => array( 'label' => 'Kelompok 3 — daftar posisi', 'tipe' => 'textarea', 'bawaan' => 'Safety officer dan anggota rescue team
Pengawas mutu (QA/QC)
Petugas lingkungan dan pengelolaan limbah', 'bantuan' => 'Satu posisi per baris. Kosongkan judul atau daftarnya untuk menyembunyikan kelompok ini.' ),
						'rol4_judul' => array( 'label' => 'Kelompok 4 — judul', 'tipe' => 'text', 'bawaan' => 'Dukungan & Administrasi', 'peran' => 'judul' ),
						'rol4_daftar' => array( 'label' => 'Kelompok 4 — daftar posisi', 'tipe' => 'textarea', 'bawaan' => 'Perencana material dan pengadaan
Administrasi proyek dan operator SAP
Logistik, pergudangan, dan armada
Driver dan dispatcher', 'bantuan' => 'Satu posisi per baris. Kosongkan judul atau daftarnya untuk menyembunyikan kelompok ini.' ),
						'lowongan_teks' => array( 'label' => 'Kotak pemberitahuan lowongan', 'tipe' => 'textarea', 'bawaan' => 'Daftar lowongan yang sedang dibuka belum ditampilkan di halaman ini. Bagian ini akan diisi setelah data rekrutmen aktif tersedia dari Departemen SDM.', 'peran' => 'teks', 'bantuan' => 'Kosongkan kotak ini untuk menyembunyikannya — dipakai kalau lowongan aktif sudah ditulis langsung di daftar kelompok di atas.' ),
						'lamar_judul' => array( 'label' => 'Cara melamar — judul', 'tipe' => 'text', 'bawaan' => 'Cara Mengirim Lamaran', 'peran' => 'judul' ),
						'lamar_teks1' => array( 'label' => 'Cara melamar — kalimat sebelum alamat surel', 'tipe' => 'kaya', 'bawaan' => 'Kirimkan CV terbaru, surat lamaran, dan salinan sertifikat keahlian ke', 'peran' => 'teks' ),
						'lamar_teks2' => array( 'label' => 'Cara melamar — kalimat sesudah alamat surel', 'tipe' => 'kaya', 'bawaan' => 'dengan subjek <b>Lamaran &ndash; [Bidang yang Dituju]</b>. Berkas Anda kami simpan dan hubungi ketika ada kebutuhan yang sesuai.', 'peran' => 'teks' ),
						'cta_tombol' => array( 'label' => 'Tulisan tombol ajakan bawah', 'tipe' => 'text', 'bawaan' => 'Hubungi Kami', 'peran' => 'tombol' ),
					),
				),

				'knp_kartu' => array(
					'judul'       => 'Tiga Alasan Bergabung',
					'kolom'      => array(
						'knp1_judul' => array( 'label' => 'Kartu 1 — judul', 'tipe' => 'text', 'bawaan' => 'Keselamatan Nomor Satu', 'peran' => 'judul' ),
						'knp1_teks' => array( 'label' => 'Kartu 1 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Bekerja di fasilitas panas bumi dan migas menuntut disiplin tinggi. Kami membekali setiap personel dengan pelatihan, sertifikasi, dan alat pelindung sebelum turun ke lapangan.', 'peran' => 'teks' ),
						'knp2_judul' => array( 'label' => 'Kartu 2 — judul', 'tipe' => 'text', 'bawaan' => 'Belajar dari Pekerjaan Nyata', 'peran' => 'judul' ),
						'knp2_teks' => array( 'label' => 'Kartu 2 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Tim kami menangani fasilitas milik operator kelas dunia. Pengalaman yang didapat di sini terpakai di mana pun Anda melangkah selanjutnya.', 'peran' => 'teks' ),
						'knp3_judul' => array( 'label' => 'Kartu 3 — judul', 'tipe' => 'text', 'bawaan' => 'Bagian dari Grup Energi', 'peran' => 'judul' ),
						'knp3_teks' => array( 'label' => 'Kartu 3 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Sebagai bagian dari PT Rukun Raharja Tbk, TCM menawarkan kestabilan perusahaan terbuka dengan suasana kerja tim lapangan yang erat.', 'peran' => 'teks' ),
					),
				),

				'kepala' => array(
					'judul'       => 'Kepala Halaman',
					'kolom'      => array(
						'kepala_judul' => array( 'label' => 'Judul halaman', 'tipe' => 'kaya', 'bawaan' => 'Tumbuh Bersama <em>Kami</em>', 'peran' => 'judul' ),
						'kepala_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Dua ratus lima puluh enam orang menjaga fasilitas energi Indonesia tetap berjalan setiap hari. Kami selalu terbuka bagi mereka yang ingin ikut serta.', 'peran' => 'subjudul' ),
						'kepala_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Daftar lowongan aktif belum ada dari SDM, jadi halaman ini sengaja belum memuat lowongan.' ),
					),
				),

				'kenapa' => array(
					'judul'       => 'Kenapa TCM',
					'kolom'      => array(
						'knp_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Kenapa TCM', 'peran' => 'label' ),
						'knp_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Tempat <em>Bekerja & Belajar</em>', 'peran' => 'judul' ),
					),
				),

				'posisi' => array(
					'judul'       => 'Bidang Keahlian',
					'kolom'      => array(
						'pos_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Bidang Keahlian', 'peran' => 'label' ),
						'pos_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Posisi yang <em>Biasa Kami Butuhkan</em>', 'peran' => 'judul' ),
						'pos_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Kebutuhan tenaga kerja mengikuti kontrak yang sedang berjalan. Berikut bidang-bidang yang paling sering kami cari.', 'peran' => 'teks' ),
					),
				),

				'ajakan' => array(
					'judul'       => 'Kotak Ajakan Penutup',
					'kolom'      => array(
						'cta_judul' => array( 'label' => 'Judul', 'tipe' => 'text', 'bawaan' => 'Punya Pertanyaan?', 'peran' => 'judul' ),
						'cta_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Hubungi kantor pusat kami untuk informasi seputar rekrutmen, magang, atau kerja sama dengan lembaga pendidikan.', 'peran' => 'teks' ),
					),
				),
			),
		),

		'sdm' => array(
			'menu'    => 'SDM & Human Capital',
			'judul'   => 'Konten Halaman SDM & Human Capital',
			'bagian' => array(

				'tim_site' => array(
					'judul'       => 'Tim di Lokasi Operasi',
					'keterangan'  => 'Bagian tentang personel yang bertugas di wilayah operasi pelanggan, beserta tiga fotonya.',
					'kolom'      => array(
						'tim_kapsi' => array( 'label' => 'Keterangan foto tim kantor pusat', 'tipe' => 'text', 'bawaan' => 'Tim kantor pusat TCM — Graha Iskandarsyah, Kebayoran Baru, Jakarta Selatan', 'peran' => 'teks' ),
						'site_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Tim di Lokasi Operasi', 'peran' => 'label' ),
						'site_judul' => array( 'label' => 'Judul', 'tipe' => 'kaya', 'bawaan' => 'Kekuatan Kami Ada di <em>Lapangan</em>', 'peran' => 'judul' ),
						'site_teks' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Sebagian besar personel TCM bertugas langsung di wilayah operasi pelanggan — dari fasilitas panas bumi di Jawa Barat hingga area produksi minyak bumi di Riau. Kunjungan manajemen dilakukan secara berkala untuk memastikan standar kerja, keselamatan, dan nilai PACE diterapkan sama di setiap lokasi.', 'peran' => 'teks' ),
						'site_cap1' => array( 'label' => 'Foto 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Tim site TCM bersama komitmen nilai PACE' ),
						'foto_site1' => array( 'label' => 'Foto 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/tim-site-tcm-nilai-pace.jpg' ),
						'site_cap2' => array( 'label' => 'Foto 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Kunjungan manajemen ke fasilitas pembangkit' ),
						'foto_site2' => array( 'label' => 'Foto 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/kunjungan-manajemen-fasilitas-pembangkit.jpg' ),
						'site_cap3' => array( 'label' => 'Foto 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Paparan operasi bersama tim site' ),
						'foto_site3' => array( 'label' => 'Foto 3', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/paparan-operasi-bersama-tim-site.jpg' ),
					),
				),

				'ai' => array(
					'judul'       => 'Literasi Kecerdasan Buatan',
					'keterangan'  => 'Bagian pelatihan Generative AI beserta empat foto kegiatannya.',
					'kolom'      => array(
						'ai_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Pengembangan Kompetensi', 'peran' => 'label' ),
						'ai_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Literasi <em>Kecerdasan Buatan</em>', 'peran' => 'judul' ),
						'ai_lede' => array( 'label' => 'Paragraf', 'tipe' => 'kaya', 'bawaan' => 'Pada 4–5 Juni 2026 tim TCM bersama PT Triguna Internusa Pratama mengikuti <b>Generative AI Training — Unlocking Innovation for the Oil &amp; Gas Industry</b> di Hacktiv8 Campus, Jakarta. Program dua hari ini membekali tim dengan dasar generative AI, penerapannya untuk produktivitas kerja, perancangan AI workflow, hingga tata kelola penggunaan AI yang bertanggung jawab — bagian dari upaya kami menyiapkan SDM menghadapi transformasi digital sektor energi.', 'peran' => 'teks' ),
						'ai_badge' => array( 'label' => 'Label kegiatan', 'tipe' => 'text', 'bawaan' => 'Generative AI Training · 4–5 Juni 2026 · Hacktiv8 Campus, Jakarta', 'peran' => 'label' ),
						'ai_cap1' => array( 'label' => 'Foto 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Peserta pelatihan Generative AI TCM & TIP' ),
						'foto_ai1' => array( 'label' => 'Foto 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pelatihan-ai-peserta.jpg' ),
						'ai_cap2' => array( 'label' => 'Foto 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Sesi materi Large Language Model' ),
						'foto_ai2' => array( 'label' => 'Foto 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pelatihan-ai-sesi-llm.jpg' ),
						'ai_cap3' => array( 'label' => 'Foto 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Kelas hands-on AI for Productivity' ),
						'foto_ai3' => array( 'label' => 'Foto 3', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pelatihan-ai-kelas-hands-on.jpg' ),
						'ai_cap4' => array( 'label' => 'Foto 4 — keterangan', 'tipe' => 'text', 'bawaan' => 'Praktik penyusunan AI workflow' ),
						'foto_ai4' => array( 'label' => 'Foto 4', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/pelatihan-ai-workflow.jpg' ),
					),
				),

				'kem_kartu' => array(
					'judul'       => 'Tiga Kartu Cara Kami Menjaga Tim',
					'kolom'      => array(
						'kem1_judul' => array( 'label' => 'Kartu 1 — judul', 'tipe' => 'text', 'bawaan' => 'Pelatihan & Sertifikasi', 'peran' => 'judul' ),
						'kem1_teks' => array( 'label' => 'Kartu 1 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Setiap personel dibekali pelatihan teknis dan sertifikasi sesuai bidangnya — dari kompetensi mekanikal, elektrikal, dan scaffolding hingga sertifikasi K3 — sebelum ditugaskan ke lapangan.', 'peran' => 'teks' ),
						'kem2_judul' => array( 'label' => 'Kartu 2 — judul', 'tipe' => 'text', 'bawaan' => 'Keselamatan & Kesehatan', 'peran' => 'judul' ),
						'kem2_teks' => array( 'label' => 'Kartu 2 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Keselamatan tidak kami kompromikan. Program K3, alat pelindung diri, dan induksi keselamatan menjadi standar di setiap penugasan, selaras dengan sistem manajemen ISO 45001 dan SMK3.', 'peran' => 'teks' ),
						'kem3_judul' => array( 'label' => 'Kartu 3 — judul', 'tipe' => 'text', 'bawaan' => 'Kebersamaan & Apresiasi', 'peran' => 'judul' ),
						'kem3_teks' => array( 'label' => 'Kartu 3 — uraian', 'tipe' => 'textarea', 'bawaan' => 'Kegiatan kebersamaan — employee gathering, outing, dan kegiatan olahraga — menjaga semangat tim yang tersebar di berbagai lokasi kerja agar tetap satu keluarga besar TCM.', 'peran' => 'teks' ),
					),
				),

				'kepala' => array(
					'judul'       => 'Kepala Halaman',
					'kolom'      => array(
						'kepala_judul' => array( 'label' => 'Judul halaman', 'tipe' => 'kaya', 'bawaan' => 'Sumber Daya Manusia & <em>Human Capital</em>', 'peran' => 'judul' ),
						'kepala_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Keandalan operasi kami berawal dari manusianya. Kami merekrut, melatih, dan menjaga tim agar setiap pekerjaan selesai dengan mutu terbaik — dan semua orang pulang dengan selamat.', 'peran' => 'subjudul' ),
					),
				),

				'tim' => array(
					'judul'       => 'Tim Kami',
					'kolom'      => array(
						'tim_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Tim Kami', 'peran' => 'label' ),
						'tim_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Manusia di Balik <em>Keandalan</em>', 'peran' => 'judul' ),
						'tim_lede' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Dua ratus lima puluh enam personel TCM bekerja di kantor pusat dan lapangan — dari fasilitas panas bumi hingga penyalur gas — disatukan oleh nilai PACE yang dianut seluruh RAJA Group.', 'peran' => 'teks' ),
					),
				),

				'pengembangan' => array(
					'judul'       => 'Pengembangan & Kesejahteraan',
					'kolom'      => array(
						'kem_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Pengembangan & Kesejahteraan', 'peran' => 'label' ),
						'kem_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Cara Kami <em>Menjaga Tim</em>', 'peran' => 'judul' ),
					),
				),

				'galeri' => array(
					'judul'       => 'Galeri Kegiatan',
					'kolom'      => array(
						'gal_eyebrow' => array( 'label' => 'Label kecil', 'tipe' => 'text', 'bawaan' => 'Galeri Kegiatan', 'peran' => 'label' ),
						'gal_judul' => array( 'label' => 'Judul bagian', 'tipe' => 'kaya', 'bawaan' => 'Kegiatan <em>Karyawan</em>', 'peran' => 'judul' ),
					),
				),

				'ajakan' => array(
					'judul'       => 'Kotak Ajakan Penutup',
					'kolom'      => array(
						'cta_judul' => array( 'label' => 'Judul', 'tipe' => 'text', 'bawaan' => 'Ingin Bergabung dengan TCM?', 'peran' => 'judul' ),
						'cta_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Lihat bidang keahlian yang biasa kami butuhkan dan cara melamar di halaman Karier.', 'peran' => 'teks' ),
					),
				),

				'keterangan_foto' => array(
					'judul'       => 'Keterangan Foto Kegiatan',
					'keterangan'  => 'Tulisan yang tampil di bawah tiap foto, dan yang muncul saat foto diperbesar.',
					'kolom'      => array(
						'cap1' => array( 'label' => 'Keterangan foto 1', 'tipe' => 'text', 'bawaan' => 'Family Gathering TCM', 'peran' => 'label' ),
						'cap2' => array( 'label' => 'Keterangan foto 2', 'tipe' => 'text', 'bawaan' => 'Keakraban keluarga besar TCM', 'peran' => 'label' ),
						'cap3' => array( 'label' => 'Keterangan foto 3', 'tipe' => 'text', 'bawaan' => 'Panggung acara Family Gathering', 'peran' => 'label' ),
						'cap4' => array( 'label' => 'Keterangan foto 4', 'tipe' => 'text', 'bawaan' => 'Apel Bulan K3 Nasional', 'peran' => 'label' ),
						'cap5' => array( 'label' => 'Keterangan foto 5', 'tipe' => 'text', 'bawaan' => 'Bulan K3 Nasional bersama manajemen', 'peran' => 'label' ),
						'cap6' => array( 'label' => 'Keterangan foto 6', 'tipe' => 'text', 'bawaan' => 'Apresiasi kegiatan Bulan K3', 'peran' => 'label' ),
						'cap7' => array( 'label' => 'Keterangan foto 7', 'tipe' => 'text', 'bawaan' => 'Bantuan kemanusiaan bersama BPBD Kab. Sukabumi', 'peran' => 'label' ),
						'cap8' => array( 'label' => 'Keterangan foto 8', 'tipe' => 'text', 'bawaan' => 'Penanaman pohon di wilayah operasi', 'peran' => 'label' ),
						'cap9' => array( 'label' => 'Keterangan foto 9', 'tipe' => 'text', 'bawaan' => 'Kebersamaan tim TCM', 'peran' => 'label' ),
						'cap_info' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Foto pada halaman ini bisa diklik untuk diperbesar. Keterangan di atas yang tampil saat foto dibuka besar.' ),
					),
				),

				'gambar' => array(
					'judul'       => 'Foto',
					'kolom'      => array(
						'foto_tim' => array( 'label' => 'Foto tim', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/tim-pt-trimitra-cipta-mandiri.jpg' ),
						'foto_galeri1' => array( 'label' => 'Foto kegiatan 1', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/family-gathering-tcm.jpg' ),
						'foto_galeri2' => array( 'label' => 'Foto kegiatan 2', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/keakraban-keluarga-besar-tcm.jpg' ),
						'foto_galeri3' => array( 'label' => 'Foto kegiatan 3', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/panggung-acara-family-gathering.jpg' ),
						'foto_galeri4' => array( 'label' => 'Foto kegiatan 4', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/apel-bulan-k3-nasional.jpg' ),
						'foto_galeri5' => array( 'label' => 'Foto kegiatan 5', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/bulan-k3-nasional-bersama-manajemen.jpg' ),
						'foto_galeri6' => array( 'label' => 'Foto kegiatan 6', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/apresiasi-kegiatan-bulan-k3.jpg' ),
						'foto_galeri7' => array( 'label' => 'Foto kegiatan 7', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/bantuan-kemanusiaan-bersama-bpbd-kab-sukabumi.jpg' ),
						'foto_galeri8' => array( 'label' => 'Foto kegiatan 8', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/penanaman-pohon-di-wilayah-operasi.jpg' ),
						'foto_galeri9' => array( 'label' => 'Foto kegiatan 9', 'tipe' => 'gambar', 'bawaan' => '', 'pratinjau' => 'assets/img/kebersamaan-tim-tcm.jpg' ),
					),
				),
			),
		),

		'kebijakan' => array(
			'menu'    => 'Kebijakan',
			'judul'   => 'Konten Halaman Kebijakan Perusahaan',
			'bagian' => array(

				'naskah' => array(
					'judul'       => 'Naskah Lima Kebijakan',
					'keterangan'  => 'Naskah kebijakan resmi. Kalau diubah di sini, PDF bertanda tangan di folder tema juga harus diganti supaya keduanya tidak berbeda.',
					'kolom'      => array(
						'kb1_tag' => array( 'label' => 'Kebijakan 1 — label', 'tipe' => 'text', 'bawaan' => 'Kebijakan Utama', 'peran' => 'label' ),
						'kb1_judul' => array( 'label' => 'Kebijakan 1 — judul', 'tipe' => 'text', 'bawaan' => 'Kebijakan Mutu, Keselamatan & Kesehatan Kerja, Serta Perlindungan Lingkungan (MK3PL)', 'peran' => 'judul' ),
						'kb1_sub' => array( 'label' => 'Kebijakan 1 — judul Inggris', 'tipe' => 'text', 'bawaan' => 'Quality, Health, Safety & Environment Policy (QHSE)', 'peran' => 'label' ),
						'kb1_intro' => array( 'label' => 'Kebijakan 1 — paragraf pembuka', 'tipe' => 'textarea', 'bawaan' => 'Jajaran manajemen dan seluruh karyawan PT Trimitra Cipta Mandiri, sebagai perusahaan yang bergerak di bidang jasa penunjang kegiatan pertambangan minyak dan gas bumi, memberikan prioritas utama terhadap aspek mutu, keselamatan dan kesehatan kerja, serta perlindungan lingkungan (MK3PL) dengan cara:', 'peran' => 'teks' ),
						'kb1_daftar' => array( 'label' => 'Kebijakan 1 — butir', 'tipe' => 'textarea', 'bawaan' => 'Mematuhi peraturan perundangan dan standar yang relevan dengan usaha Perusahaan.
Memadukan aspek mutu, keselamatan & kesehatan kerja, serta perlindungan lingkungan (MK3PL) dalam setiap kegiatan Perusahaan.
Meningkatkan kesadaran dan kompetensi kerja melalui pelatihan dan berbagi pengetahuan.
Melaksanakan aspek mutu, keselamatan & kesehatan kerja, serta perlindungan lingkungan yang bersifat “proaktif” dengan mengedepankan usaha pencegahan dan perbaikan terhadap ketidaksesuaian yang berpotensi menimbulkan kecelakaan kerja, penyakit akibat kerja, kerusakan aset, serta pencemaran lingkungan.
Melaksanakan prinsip-prinsip perencanaan, penerapan, koreksi, dan perbaikan berkesinambungan.
Menciptakan dan memelihara hubungan yang harmonis dengan seluruh pihak yang berkepentingan.
Memastikan terlaksananya kebijakan dan peraturan MK3PL, dengan mengutamakan mekanisme <i>reward and punishment</i> yang seimbang sesuai kaidah sistem manajemen MK3PL.', 'bantuan' => 'Satu butir per baris. Boleh memakai <i>…</i> untuk kata bercetak miring.' ),
						'kb1_tutup' => array( 'label' => 'Kebijakan 1 — paragraf penutup', 'tipe' => 'textarea', 'bawaan' => '', 'peran' => 'teks', 'bantuan' => 'Boleh dikosongkan.' ),
						'kb1_ft' => array( 'label' => 'Kebijakan 1 — baris penetapan', 'tipe' => 'text', 'bawaan' => 'Ditetapkan di Jakarta, 3 Februari 2026 — Fattah Hermana, Direktur PT Trimitra Cipta Mandiri' ),
						'kb1_pdf' => array( 'label' => 'Kebijakan 1 — nama berkas PDF', 'tipe' => 'text', 'bawaan' => 'Kebijakan_MK3PL_TCM_Rev2_2026.pdf', 'bantuan' => 'Nama berkas PDF di folder assets/dok pada tema. Kosongkan untuk menyembunyikan tombol unduh.' ),
						'kb2_tag' => array( 'label' => 'Kebijakan 2 — label', 'tipe' => 'text', 'bawaan' => 'Kebijakan', 'peran' => 'label' ),
						'kb2_judul' => array( 'label' => 'Kebijakan 2 — judul', 'tipe' => 'text', 'bawaan' => 'Kebijakan Menghentikan Kerja', 'peran' => 'judul' ),
						'kb2_sub' => array( 'label' => 'Kebijakan 2 — judul Inggris', 'tipe' => 'text', 'bawaan' => 'Stop Work Policy', 'peran' => 'label' ),
						'kb2_intro' => array( 'label' => 'Kebijakan 2 — paragraf pembuka', 'tipe' => 'textarea', 'bawaan' => 'Dengan prinsip panduan kami untuk tidak membahayakan dalam segala hal yang kami lakukan, seluruh karyawan PT Trimitra Cipta Mandiri dan kontraktornya diberi wewenang dan tanggung jawab untuk menghentikan pekerjaan apabila jelas dapat menimbulkan bahaya terhadap:', 'peran' => 'teks' ),
						'kb2_daftar' => array( 'label' => 'Kebijakan 2 — butir', 'tipe' => 'textarea', 'bawaan' => 'Diri kita sebagai individu.
Rekan kerja kita.
Aset, baik milik kita sendiri maupun milik pihak lain, termasuk bahan material dan peralatan.
Lingkungan tempat kita bekerja.
Planet ini secara keseluruhan.
Generasi masa depan.', 'bantuan' => 'Satu butir per baris. Boleh memakai <i>…</i> untuk kata bercetak miring.' ),
						'kb2_tutup' => array( 'label' => 'Kebijakan 2 — paragraf penutup', 'tipe' => 'textarea', 'bawaan' => 'Apabila suatu pekerjaan yang sedang berlangsung atau akan dilanjutkan dirasakan dapat menimbulkan bahaya terhadap salah satu atau seluruh hal di atas, pekerjaan harus dihentikan segera dan langkah-langkahnya dievaluasi ulang agar dapat dilakukan dengan pendekatan yang lebih aman. Jika ada keraguan mengenai penghentian tersebut, atasan langsung harus diberi tahu dan diajak berdiskusi mengenai cara terbaik untuk melanjutkan.', 'peran' => 'teks', 'bantuan' => 'Boleh dikosongkan.' ),
						'kb2_ft' => array( 'label' => 'Kebijakan 2 — baris penetapan', 'tipe' => 'text', 'bawaan' => 'Ditetapkan di Jakarta, 3 Februari 2026 — Fattah Hermana, Direktur PT Trimitra Cipta Mandiri' ),
						'kb2_pdf' => array( 'label' => 'Kebijakan 2 — nama berkas PDF', 'tipe' => 'text', 'bawaan' => 'Kebijakan_Menghentikan_Kerja_TCM_Rev2_2026.pdf', 'bantuan' => 'Nama berkas PDF di folder assets/dok pada tema. Kosongkan untuk menyembunyikan tombol unduh.' ),
						'kb3_tag' => array( 'label' => 'Kebijakan 3 — label', 'tipe' => 'text', 'bawaan' => 'Kebijakan', 'peran' => 'label' ),
						'kb3_judul' => array( 'label' => 'Kebijakan 3 — judul', 'tipe' => 'text', 'bawaan' => 'Kebijakan Alkohol dan Obat-Obatan Terlarang', 'peran' => 'judul' ),
						'kb3_sub' => array( 'label' => 'Kebijakan 3 — judul Inggris', 'tipe' => 'text', 'bawaan' => 'Drugs & Alcohol Policy', 'peran' => 'label' ),
						'kb3_intro' => array( 'label' => 'Kebijakan 3 — paragraf pembuka', 'tipe' => 'textarea', 'bawaan' => 'PT Trimitra Cipta Mandiri mengakui risiko yang timbul dari pengaruh alkohol dan obat-obatan terlarang di tempat kerja, dan telah menerapkan kebijakan “Toleransi Nihil” terhadap alkohol serta obat-obatan yang tidak sah, narkotika, dan obat-obatan terlarang (narkoba) di lingkungan perusahaan.', 'peran' => 'teks' ),
						'kb3_daftar' => array( 'label' => 'Kebijakan 3 — butir', 'tipe' => 'textarea', 'bawaan' => 'Tidak seorang pun diizinkan memasuki lokasi kerja Perusahaan apabila berada di bawah pengaruh alkohol, obat-obatan terlarang, atau obat medis yang tidak digunakan sebagaimana mestinya. Perusahaan berhak melakukan pengujian alkohol dan narkoba sewaktu-waktu.
Memasuki lokasi kerja mana pun, Perusahaan berhak memeriksa personel beserta barang bawaannya untuk memastikan tidak ada benda terlarang. Pemeriksaan dilakukan oleh personel berwenang, secara pribadi dan sedapat mungkin tidak mencolok.
Kepemilikan atau penggunaan benda terlarang tersebut, hasil pengujian positif alkohol dan narkoba, atau penolakan terhadap pengujian dan pemeriksaan, dapat menjadi dasar pemutusan hubungan kerja seketika.', 'bantuan' => 'Satu butir per baris. Boleh memakai <i>…</i> untuk kata bercetak miring.' ),
						'kb3_tutup' => array( 'label' => 'Kebijakan 3 — paragraf penutup', 'tipe' => 'textarea', 'bawaan' => '', 'peran' => 'teks', 'bantuan' => 'Boleh dikosongkan.' ),
						'kb3_ft' => array( 'label' => 'Kebijakan 3 — baris penetapan', 'tipe' => 'text', 'bawaan' => 'Ditetapkan di Jakarta, 3 Februari 2026 — Fattah Hermana, Direktur PT Trimitra Cipta Mandiri' ),
						'kb3_pdf' => array( 'label' => 'Kebijakan 3 — nama berkas PDF', 'tipe' => 'text', 'bawaan' => 'Kebijakan_Alkohol_dan_Obat_TCM_Rev2_2026.pdf', 'bantuan' => 'Nama berkas PDF di folder assets/dok pada tema. Kosongkan untuk menyembunyikan tombol unduh.' ),
						'kb4_tag' => array( 'label' => 'Kebijakan 4 — label', 'tipe' => 'text', 'bawaan' => 'Kebijakan', 'peran' => 'label' ),
						'kb4_judul' => array( 'label' => 'Kebijakan 4 — judul', 'tipe' => 'text', 'bawaan' => 'Kebijakan Merokok', 'peran' => 'judul' ),
						'kb4_sub' => array( 'label' => 'Kebijakan 4 — judul Inggris', 'tipe' => 'text', 'bawaan' => 'Smoking Policy', 'peran' => 'label' ),
						'kb4_intro' => array( 'label' => 'Kebijakan 4 — paragraf pembuka', 'tipe' => 'textarea', 'bawaan' => 'Meskipun diakui bahwa setiap orang membuat pilihannya sendiri untuk merokok atau tidak, bukti medis dengan jelas menunjukkan bahwa merokok dan asap rokok orang lain dapat menyebabkan kerusakan tubuh yang tidak dapat dipulihkan. Karena itu, dalam menerapkan prinsip untuk tidak membahayakan, merokok tidak diizinkan di area publik mana pun, termasuk area permanen dan/atau sementara dari setiap ruang kantor, akomodasi, atau lorong:', 'peran' => 'teks' ),
						'kb4_daftar' => array( 'label' => 'Kebijakan 4 — butir', 'tipe' => 'textarea', 'bawaan' => 'Area umum seperti dapur, kamar kecil, dan sejenisnya.
Ruang penyimpanan atau gudang.
Ruang P3K.
Ruang workshop, mekanik, atau listrik.
Area lain yang ditentukan oleh karyawan senior yang ditunjuk.', 'bantuan' => 'Satu butir per baris. Boleh memakai <i>…</i> untuk kata bercetak miring.' ),
						'kb4_tutup' => array( 'label' => 'Kebijakan 4 — paragraf penutup', 'tipe' => 'textarea', 'bawaan' => 'Di tempat merokok diizinkan, area tersebut harus ditandai dengan jelas sebagai area merokok yang telah ditentukan. Karyawan yang menggunakan area merokok bertanggung jawab menjaga kebersihan dan pemeliharaannya setiap saat, serta memastikan tidak ada puntung rokok yang masih menyala karena dapat menjadi penyebab kebakaran.', 'peran' => 'teks', 'bantuan' => 'Boleh dikosongkan.' ),
						'kb4_ft' => array( 'label' => 'Kebijakan 4 — baris penetapan', 'tipe' => 'text', 'bawaan' => 'Ditetapkan di Jakarta, 3 Februari 2026 — Fattah Hermana, Direktur PT Trimitra Cipta Mandiri' ),
						'kb4_pdf' => array( 'label' => 'Kebijakan 4 — nama berkas PDF', 'tipe' => 'text', 'bawaan' => 'Kebijakan_Merokok_TCM_Rev2_2026.pdf', 'bantuan' => 'Nama berkas PDF di folder assets/dok pada tema. Kosongkan untuk menyembunyikan tombol unduh.' ),
						'kb5_tag' => array( 'label' => 'Kebijakan 5 — label', 'tipe' => 'text', 'bawaan' => 'Kebijakan', 'peran' => 'label' ),
						'kb5_judul' => array( 'label' => 'Kebijakan 5 — judul', 'tipe' => 'text', 'bawaan' => 'Kebijakan Pencegahan dan Penanggulangan HIV/AIDS di Tempat Kerja', 'peran' => 'judul' ),
						'kb5_sub' => array( 'label' => 'Kebijakan 5 — judul Inggris', 'tipe' => 'text', 'bawaan' => 'HIV/AIDS Prevention and Control in the Workplace Policy', 'peran' => 'label' ),
						'kb5_intro' => array( 'label' => 'Kebijakan 5 — paragraf pembuka', 'tipe' => 'textarea', 'bawaan' => 'PT Trimitra Cipta Mandiri berkomitmen memberlakukan kebijakan pencegahan dan penanggulangan penyakit HIV/AIDS di seluruh area dan unit kerja, sesuai peraturan perundang-undangan yang berlaku di wilayah Negara Republik Indonesia. PT Trimitra Cipta Mandiri berkomitmen untuk:', 'peran' => 'teks' ),
						'kb5_daftar' => array( 'label' => 'Kebijakan 5 — butir', 'tipe' => 'textarea', 'bawaan' => 'Melaksanakan sosialisasi program pencegahan dan penanggulangan penyakit HIV/AIDS melalui edukasi dengan berbagai media yang dianggap efektif.
Membangun kesadaran karyawan dalam menjaga martabat rekan kerja yang menderita penyakit HIV/AIDS.
Memperlakukan karyawan dengan penyakit HIV/AIDS secara rahasia atas kondisi kesehatannya.
Mendorong karyawan melakukan tes HIV/AIDS secara rutin, rahasia, dan sukarela, disertai konseling.
Memastikan kebijakan ini diterapkan di seluruh area dan unit kerja PT Trimitra Cipta Mandiri.', 'bantuan' => 'Satu butir per baris. Boleh memakai <i>…</i> untuk kata bercetak miring.' ),
						'kb5_tutup' => array( 'label' => 'Kebijakan 5 — paragraf penutup', 'tipe' => 'textarea', 'bawaan' => 'Manajemen PT Trimitra Cipta Mandiri bertanggung jawab menjamin kebijakan ini dikomunikasikan kepada seluruh karyawan di semua area dan unit kerja agar dipatuhi dan dilaksanakan.', 'peran' => 'teks', 'bantuan' => 'Boleh dikosongkan.' ),
						'kb5_ft' => array( 'label' => 'Kebijakan 5 — baris penetapan', 'tipe' => 'text', 'bawaan' => 'Ditetapkan di Jakarta, 3 Februari 2026 — Fattah Hermana, Direktur PT Trimitra Cipta Mandiri' ),
						'kb5_pdf' => array( 'label' => 'Kebijakan 5 — nama berkas PDF', 'tipe' => 'text', 'bawaan' => 'Kebijakan_Pencegahan_HIV_AIDS_TCM_Rev2_2026.pdf', 'bantuan' => 'Nama berkas PDF di folder assets/dok pada tema. Kosongkan untuk menyembunyikan tombol unduh.' ),
						'unduh_tombol' => array( 'label' => 'Tulisan tombol unduh PDF', 'tipe' => 'text', 'bawaan' => 'Unduh PDF bertanda tangan', 'peran' => 'tombol' ),
						'naskah_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Naskah di halaman ini harus sama persis dengan PDF bertanda tangan Direktur. Kalau kebijakan direvisi, ubah teks di sini DAN unggah PDF versi baru ke folder assets/dok pada tema, lalu perbarui nama berkasnya di kolom "nama berkas PDF".' ),
					),
				),

				'kepala' => array(
					'judul'       => 'Kepala Halaman',
					'kolom'      => array(
						'kepala_judul' => array( 'label' => 'Judul halaman', 'tipe' => 'kaya', 'bawaan' => 'Kebijakan — <em>Perusahaan</em>', 'peran' => 'judul' ),
						'kepala_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Lima kebijakan resmi yang berlaku di seluruh area dan unit kerja TCM, ditetapkan dan ditandatangani Direktur pada 3 Februari 2026 (Revisi 2). Berlaku bagi seluruh karyawan maupun kontraktor di setiap lokasi kerja.', 'peran' => 'subjudul', 'bantuan' => 'Perbarui tanggal dan nomor revisi setiap kali kebijakan diperbarui.' ),
						'kepala_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Naskah kelima kebijakan sengaja tetap di tema — isinya dokumen resmi bertanda tangan Direktur, jadi tidak sepatutnya bisa diubah dari panel admin.' ),
					),
				),

				'penutup' => array(
					'judul'       => 'Kotak Penutup',
					'kolom'      => array(
						'tutup_judul' => array( 'label' => 'Judul', 'tipe' => 'text', 'bawaan' => 'Butuh Dokumen Resmi?', 'peran' => 'judul' ),
						'tutup_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Salinan kebijakan, sertifikat, dan dokumen legalitas untuk keperluan pra-kualifikasi vendor dapat diminta melalui kontak resmi kami.', 'peran' => 'teks' ),
					),
				),
			),
		),

		'berita' => array(
			'menu'    => 'Berita',
			'judul'   => 'Konten Halaman Berita',
			'bagian' => array(

				'kepala' => array(
					'judul'       => 'Kepala Halaman Arsip',
					'keterangan'  => 'Halaman daftar seluruh berita.',
					'kolom'      => array(
						'kepala_judul' => array( 'label' => 'Judul halaman', 'tipe' => 'kaya', 'bawaan' => 'Kabar <em>Terbaru</em>', 'peran' => 'judul' ),
						'kepala_teks' => array( 'label' => 'Kalimat pendukung', 'tipe' => 'textarea', 'bawaan' => 'Kegiatan, pencapaian, dan informasi terkini dari PT Trimitra Cipta Mandiri.', 'peran' => 'subjudul' ),
						'cara_menulis' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Isi berita TIDAK diketik di panel ini. Berita ditulis lewat menu "Berita" (Pos) → Tambah Baru, sama seperti menulis artikel biasa: judul, isi, gambar utama, lalu Terbitkan. Setelah terbit, berita otomatis muncul di halaman ini dan di blok Berita & Kegiatan pada Beranda.' ),
					),
				),

				'rinci' => array(
					'judul'       => 'Halaman Satu Berita',
					'kolom'      => array(
						'tombol_kembali' => array( 'label' => 'Tulisan tombol kembali', 'tipe' => 'text', 'bawaan' => '← Kembali ke Berita', 'peran' => 'tombol' ),
					),
				),

				'pengaturan' => array(
					'judul'       => 'Pengaturan Tampilan',
					'kolom'      => array(
						'jumlah_beranda' => array( 'label' => 'Jumlah berita di Beranda', 'tipe' => 'pilihan', 'bawaan' => '3', 'pilihan' => array( '3' => '3 berita', '6' => '6 berita', '9' => '9 berita' ), 'bantuan' => 'Berapa berita terbaru yang tampil pada blok Berita & Kegiatan di Beranda.' ),
						'kosong_mode' => array( 'label' => 'Kalau belum ada berita sama sekali', 'tipe' => 'pilihan', 'bawaan' => 'sembunyi', 'pilihan' => array( 'sembunyi' => 'Sembunyikan blok Berita di Beranda', 'tampil' => 'Tetap tampilkan dengan kalimat di bawah' ), 'bantuan' => 'Selama belum ada berita yang terbit, blok di Beranda sebaiknya disembunyikan supaya pengunjung tidak melihat bagian kosong.' ),
						'kosong_teks' => array( 'label' => 'Kalimat kalau belum ada berita', 'tipe' => 'textarea', 'bawaan' => 'Berita dan kegiatan terbaru akan segera kami bagikan di sini.', 'peran' => 'teks', 'bantuan' => 'Hanya dipakai kalau pilihan di atas "Tetap tampilkan". Pengelola situs tetap melihat petunjuk cara menulis berita, tapi pengunjung hanya melihat kalimat ini.' ),
					),
				),
			),
		),

		'umum' => array(
			'menu'    => 'Umum & Kaki Halaman',
			'judul'   => 'Teks Umum, Menu, dan Kaki Halaman',
			'bagian' => array(

				'label_kecil' => array(
					'judul'       => 'Label Kecil yang Dipakai Berulang',
					'keterangan'  => 'Tulisan pendek yang muncul di banyak halaman: status proyek, tombol perbesar gambar, label tanda air, dan remah navigasi.',
					'kolom'      => array(
						'chip_berjalan' => array( 'label' => 'Label status proyek berjalan', 'tipe' => 'text', 'bawaan' => 'BERJALAN', 'peran' => 'label' ),
						'chip_selesai' => array( 'label' => 'Label status proyek selesai', 'tipe' => 'text', 'bawaan' => 'SELESAI', 'peran' => 'label' ),
						'label_perbesar' => array( 'label' => 'Tulisan tombol perbesar gambar', 'tipe' => 'text', 'bawaan' => 'Perbesar', 'peran' => 'label' ),
						'label_tandaair' => array( 'label' => 'Label tanda air pada gambar dokumen', 'tipe' => 'text', 'bawaan' => 'BERTANDA AIR', 'peran' => 'label' ),
						'remah_beranda' => array( 'label' => 'Tulisan remah "Beranda"', 'tipe' => 'text', 'bawaan' => 'Beranda', 'peran' => 'label' ),
					),
				),

				'kaki_tautan' => array(
					'judul'       => 'Tulisan Tautan di Kaki Halaman',
					'keterangan'  => 'Nama tautan pada kolom Perusahaan dan Layanan di kaki halaman. Mengubah tulisannya tidak mengubah halaman tujuannya.',
					'kolom'      => array(
						'f_l1' => array( 'label' => 'Tautan kaki: Tentang', 'tipe' => 'text', 'bawaan' => 'Tentang', 'peran' => 'label' ),
						'f_l2' => array( 'label' => 'Tautan kaki: Visi & Misi', 'tipe' => 'text', 'bawaan' => 'Visi & Misi', 'peran' => 'label' ),
						'f_l3' => array( 'label' => 'Tautan kaki: Struktur Organisasi', 'tipe' => 'text', 'bawaan' => 'Struktur Organisasi', 'peran' => 'label' ),
						'f_l4' => array( 'label' => 'Tautan kaki: Sertifikat', 'tipe' => 'text', 'bawaan' => 'Sertifikat', 'peran' => 'label' ),
						'f_l5' => array( 'label' => 'Tautan kaki: Karier', 'tipe' => 'text', 'bawaan' => 'Karier', 'peran' => 'label' ),
						'f_l6' => array( 'label' => 'Tautan kaki: SDM & Human Capital', 'tipe' => 'text', 'bawaan' => 'SDM & Human Capital', 'peran' => 'label' ),
						'f_l7' => array( 'label' => 'Tautan kaki: Kebijakan', 'tipe' => 'text', 'bawaan' => 'Kebijakan', 'peran' => 'label' ),
						'f_l8' => array( 'label' => 'Tautan kaki: Operations Support', 'tipe' => 'text', 'bawaan' => 'Operations Support', 'peran' => 'label' ),
						'f_l9' => array( 'label' => 'Tautan kaki: Mechanical & Valve', 'tipe' => 'text', 'bawaan' => 'Mechanical & Valve', 'peran' => 'label' ),
						'f_l10' => array( 'label' => 'Tautan kaki: Civil & Scaffolding', 'tipe' => 'text', 'bawaan' => 'Civil & Scaffolding', 'peran' => 'label' ),
						'f_l11' => array( 'label' => 'Tautan kaki: HSE & Emergency', 'tipe' => 'text', 'bawaan' => 'HSE & Emergency', 'peran' => 'label' ),
						'f_l12' => array( 'label' => 'Tautan kaki: Proyek Kami', 'tipe' => 'text', 'bawaan' => 'Proyek Kami', 'peran' => 'label' ),
					),
				),

				'menu_utama' => array(
					'judul'       => 'Tulisan Menu Utama',
					'keterangan'  => 'Nama butir menu di bagian atas setiap halaman. Mengubah tulisannya tidak mengubah halaman yang dituju.',
					'kolom'      => array(
						'nav_beranda' => array( 'label' => 'Menu 1', 'tipe' => 'text', 'bawaan' => 'Beranda', 'peran' => 'label' ),
						'nav_tentang' => array( 'label' => 'Menu 2', 'tipe' => 'text', 'bawaan' => 'Tentang', 'peran' => 'label' ),
						'nav_layanan' => array( 'label' => 'Menu 3', 'tipe' => 'text', 'bawaan' => 'Layanan', 'peran' => 'label' ),
						'nav_proyek' => array( 'label' => 'Menu 4', 'tipe' => 'text', 'bawaan' => 'Proyek', 'peran' => 'label' ),
						'nav_sertifikat' => array( 'label' => 'Menu 5', 'tipe' => 'text', 'bawaan' => 'Sertifikat', 'peran' => 'label' ),
						'nav_esg' => array( 'label' => 'Menu 6', 'tipe' => 'text', 'bawaan' => 'ESG', 'peran' => 'label' ),
						'nav_sdm' => array( 'label' => 'Menu 7', 'tipe' => 'text', 'bawaan' => 'SDM', 'peran' => 'label' ),
						'nav_berita' => array( 'label' => 'Menu 8', 'tipe' => 'text', 'bawaan' => 'Berita', 'peran' => 'label' ),
						'nav_karier' => array( 'label' => 'Menu 9', 'tipe' => 'text', 'bawaan' => 'Karier', 'peran' => 'label' ),
						'nav_kontak' => array( 'label' => 'Menu 10', 'tipe' => 'text', 'bawaan' => 'Kontak', 'peran' => 'label' ),
					),
				),

				'kaki' => array(
					'judul'       => 'Kaki Halaman',
					'keterangan'  => 'Bagian paling bawah, tampil di seluruh halaman.',
					'kolom'      => array(
						'kaki_ringkas' => array( 'label' => 'Kalimat ringkas di bawah logo', 'tipe' => 'kaya', 'bawaan' => 'Perusahaan jasa operasi, pemeliharaan, dan penunjang sektor energi Indonesia. Bagian dari PT Rukun Raharja Tbk (IDX: RAJA).', 'peran' => 'teks' ),
						'kaki_kol1' => array( 'label' => 'Judul kolom 1', 'tipe' => 'text', 'bawaan' => 'Perusahaan', 'peran' => 'label' ),
						'kaki_kol2' => array( 'label' => 'Judul kolom 2', 'tipe' => 'text', 'bawaan' => 'Layanan', 'peran' => 'label' ),
						'kaki_kol3' => array( 'label' => 'Judul kolom 3', 'tipe' => 'text', 'bawaan' => 'Kontak', 'peran' => 'label' ),
						'kaki_hakcipta' => array( 'label' => 'Baris hak cipta', 'tipe' => 'text', 'bawaan' => '© 2026 PT Trimitra Cipta Mandiri. Seluruh hak cipta dilindungi.' ),
						'kaki_legal' => array( 'label' => 'Baris keterangan legalitas', 'tipe' => 'text', 'bawaan' => 'Member of Rukun Raharja Tbk (IDX: RAJA) · NIB 0220300101259' ),
						'kaki_catatan' => array( 'label' => '', 'tipe' => 'info', 'bawaan' => 'Alamat, telepon, surel, dan jam operasional di kaki halaman diambil dari Konten Website → Kontak, supaya cukup diubah di satu tempat.' ),
					),
				),

				'hut' => array(
					'judul'       => 'Tema HUT ke-26',
					'keterangan'  => 'Hiasan peringatan ulang tahun perusahaan: pita di atas menu, lambang 26 di samping logo, dan satu bagian khusus di Beranda.',
					'kolom'      => array(
						'hut_aktif' => array( 'label' => 'Nyalakan tema HUT?', 'tipe' => 'pilihan', 'bawaan' => 'sembunyi', 'pilihan' => array( 'sembunyi' => 'Tidak, tampilan biasa', 'tampil' => 'Ya, nyalakan hiasan HUT' ), 'bantuan' => 'Dinyalakan menjelang 8 November 2026, dimatikan lagi setelah rangkaian acara selesai.' ),
						'hut_pita' => array( 'label' => 'Tulisan pita pengumuman', 'tipe' => 'kaya', 'bawaan' => '8 November 2026 · HUT ke-26 PT Trimitra Cipta Mandiri', 'peran' => 'label' ),
						'hut_pita_sub' => array( 'label' => 'Anak kalimat pada pita', 'tipe' => 'text', 'bawaan' => 'Dua puluh enam tahun menjaga keandalan energi Indonesia' ),
						'hut_lambang_teks' => array( 'label' => 'Tulisan di bawah lambang 26', 'tipe' => 'text', 'bawaan' => 'HUT Ke-26 · 2000–2026', 'peran' => 'label' ),
						'hut_eyebrow' => array( 'label' => 'Label kecil di bagian Beranda', 'tipe' => 'text', 'bawaan' => '8 November 2026', 'peran' => 'label' ),
						'hut_judul' => array( 'label' => 'Judul bagian di Beranda', 'tipe' => 'kaya', 'bawaan' => 'Dua Puluh Enam Tahun <em>Menjaga Keandalan Energi</em>', 'peran' => 'judul' ),
						'hut_teks' => array( 'label' => 'Paragraf', 'tipe' => 'textarea', 'bawaan' => 'Berdiri di Jakarta Pusat pada 8 November 2000, TCM tumbuh dari perusahaan jasa penunjang minyak dan gas bumi menjadi mitra operasi dan pemeliharaan bagi operator panas bumi, minyak dan gas bumi, serta ketenagalistrikan — dari Jambi dan Riau hingga Gunung Salak dan Wayang Windu. Terima kasih kepada seluruh karyawan, mitra, dan pelanggan yang menemani perjalanan ini.', 'peran' => 'teks' ),
						'hut_angka1_nilai' => array( 'label' => 'Angka 1 — nilai', 'tipe' => 'text', 'bawaan' => '256', 'peran' => 'nilai' ),
						'hut_angka1_label' => array( 'label' => 'Angka 1 — keterangan', 'tipe' => 'text', 'bawaan' => 'Personel profesional', 'peran' => 'label' ),
						'hut_angka2_nilai' => array( 'label' => 'Angka 2 — nilai', 'tipe' => 'text', 'bawaan' => '14', 'peran' => 'nilai' ),
						'hut_angka2_label' => array( 'label' => 'Angka 2 — keterangan', 'tipe' => 'text', 'bawaan' => 'Kontrak tercatat', 'peran' => 'label' ),
						'hut_angka3_nilai' => array( 'label' => 'Angka 3 — nilai', 'tipe' => 'text', 'bawaan' => '17', 'peran' => 'nilai' ),
						'hut_angka3_label' => array( 'label' => 'Angka 3 — keterangan', 'tipe' => 'text', 'bawaan' => 'Sertifikasi & penghargaan', 'peran' => 'label' ),
						'hut_tombol' => array( 'label' => 'Tulisan tombol', 'tipe' => 'text', 'bawaan' => 'Lihat Perjalanan Kami', 'peran' => 'tombol' ),
						'hut_umur' => array( 'label' => 'Angka umur perusahaan saat tema HUT menyala', 'tipe' => 'text', 'bawaan' => '26', 'bantuan' => 'Angka “Tahun Pengalaman” di Beranda memakai angka ini selama tema HUT menyala, menggantikan angka biasa.' ),
					),
				),
			),
		),
	);
}
