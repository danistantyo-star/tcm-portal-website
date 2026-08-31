<?php
/**
 * Panel "Konten Website" — mengubah teks, angka, dan gambar situs dari admin
 * tanpa menyentuh desain atau kode tema.
 *
 * Bagian-bagiannya:
 *   1. Dasar          — nama opsi, nilai bawaan, pencarian kolom
 *   2. Untuk templat  — tcm_teks() / tcm_kaya() / tcm_html() dan kawan-kawan
 *   3. Menu admin
 *   4. Penyimpanan & pembersihan data
 *   5. Aset halaman admin
 *   6. Tampilan halaman admin
 *
 * Daftar kolomnya ada di skema.php — itu satu-satunya berkas yang perlu
 * disunting kalau mau menambah atau mengurangi isian.
 *
 * @package tcm-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TCM_KWT_KAPABILITAS', 'edit_pages' ); // Peran Editor ke atas boleh mengubah isi.

require_once __DIR__ . '/skema.php';

/* =========================================================================
 * 1. Dasar
 * ====================================================================== */

/**
 * Bahasa yang sedang berlaku: 'id' atau 'en'.
 *
 * Di sisi pengunjung, bahasanya ditentukan Polylang (kalau terpasang).
 * Di sisi admin, ditentukan tab bahasa pada panel Konten Website.
 * Tanpa Polylang, situs berjalan satu bahasa saja — semuanya Indonesia.
 */
function tcm_bahasa() {
	// panel admin: tab bahasa
	if ( is_admin() && isset( $_GET['bahasa'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
		return 'en' === $_GET['bahasa'] ? 'en' : 'id'; // phpcs:ignore WordPress.Security.NonceVerification
	}
	// sisi pengunjung: pratinjau ?bahasa=en, hanya untuk pengelola yang login
	if ( function_exists( 'tcm_sedang_pratinjau_en' ) && tcm_sedang_pratinjau_en() ) {
		return 'en';
	}
	if ( function_exists( 'pll_current_language' ) ) {
		$kode = pll_current_language( 'slug' );
		if ( $kode && 0 === strpos( strtolower( $kode ), 'en' ) ) {
			return 'en';
		}
	}
	return 'id';
}

/** Daftar bahasa yang didukung tema. */
function tcm_daftar_bahasa() {
	return array(
		'id' => 'Indonesia',
		'en' => 'English',
	);
}

function tcm_kwt_opsi( $halaman, $bahasa = null ) {
	$bahasa = $bahasa ? $bahasa : tcm_bahasa();
	return 'en' === $bahasa ? 'tcm_isi_' . $halaman . '_en' : 'tcm_isi_' . $halaman;
}

function tcm_kwt_grup( $halaman, $bahasa = null ) {
	$bahasa = $bahasa ? $bahasa : tcm_bahasa();
	return 'en' === $bahasa ? 'tcm_isi_grup_' . $halaman . '_en' : 'tcm_isi_grup_' . $halaman;
}

/**
 * Teks bawaan bahasa Inggris, dibaca sekali dari seed/konten-en.json.
 * Berkas itu dibuat dari halaman /en/ situs statis, jadi kalimatnya sama
 * dengan yang sudah pernah disetujui.
 */
function tcm_kwt_bawaan_en( $halaman ) {
	static $simpan = null;
	if ( null === $simpan ) {
		$simpan = array();
		$berkas = TCM_DIR . '/seed/konten-en.json';
		if ( file_exists( $berkas ) ) {
			$isi = json_decode( file_get_contents( $berkas ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions
			if ( is_array( $isi ) ) {
				$simpan = $isi;
			}
		}
	}
	return isset( $simpan[ $halaman ] ) ? $simpan[ $halaman ] : array();
}

function tcm_kwt_daftar_halaman() {
	return array_keys( tcm_kwt_skema() );
}

function tcm_kwt_halaman( $halaman ) {
	$skema = tcm_kwt_skema();
	return isset( $skema[ $halaman ] ) ? $skema[ $halaman ] : null;
}

/**
 * Nilai bawaan satu halaman. Kolom 'info' dilewati karena bukan isian.
 * Pada bahasa Inggris, teks bawaannya ditimpa isi seed/konten-en.json;
 * kolom yang belum punya terjemahan tetap memakai teks Indonesia, supaya
 * halaman tidak pernah kosong.
 */
function tcm_kwt_bawaan( $halaman, $bahasa = null ) {
	$bahasa = $bahasa ? $bahasa : tcm_bahasa();
	static $simpan = array();
	$ingatan = $halaman . '|' . $bahasa;
	if ( isset( $simpan[ $ingatan ] ) ) {
		return $simpan[ $ingatan ];
	}
	$def    = tcm_kwt_halaman( $halaman );
	$bawaan = array();
	if ( $def ) {
		foreach ( $def['bagian'] as $bagian ) {
			foreach ( $bagian['kolom'] as $kunci => $kolom ) {
				if ( isset( $kolom['tipe'] ) && 'info' === $kolom['tipe'] ) {
					continue;
				}
				$bawaan[ $kunci ] = isset( $kolom['bawaan'] ) ? $kolom['bawaan'] : '';
			}
		}
	}
	if ( 'en' === $bahasa ) {
		foreach ( tcm_kwt_bawaan_en( $halaman ) as $kunci => $nilai ) {
			if ( array_key_exists( $kunci, $bawaan ) && '' !== trim( (string) $nilai ) ) {
				$bawaan[ $kunci ] = $nilai;
			}
		}
	}

	$simpan[ $ingatan ] = $bawaan;
	return $bawaan;
}

function tcm_kwt_kolom( $halaman, $kunci ) {
	$def = tcm_kwt_halaman( $halaman );
	if ( ! $def ) {
		return null;
	}
	foreach ( $def['bagian'] as $bagian ) {
		if ( isset( $bagian['kolom'][ $kunci ] ) ) {
			return $bagian['kolom'][ $kunci ];
		}
	}
	return null;
}

/** Tag HTML yang boleh dipakai pada kolom bertipe 'kaya'. */
function tcm_kwt_tag_kaya() {
	return array(
		'em'     => array(),
		'i'      => array(),
		'b'      => array(),
		'strong' => array(),
		'small'  => array(),
		'sup'    => array(),
		'sub'    => array(),
		'br'     => array(),
		'span'   => array( 'class' => array() ),
		'a'      => array( 'href' => array(), 'title' => array(), 'target' => array(), 'rel' => array() ),
	);
}

/* =========================================================================
 * 2. Dipanggil dari berkas templat
 * ====================================================================== */

/**
 * Ambil satu isian. Kalau kosong, dipakai teks bawaan dari skema —
 * jadi halaman tidak pernah jadi kosong.
 */
function tcm_kwt_nilai( $halaman, $kunci, $cadangan = '' ) {
	$bawaan = tcm_kwt_bawaan( $halaman );
	$opsi   = wp_parse_args( (array) get_option( tcm_kwt_opsi( $halaman ), array() ), $bawaan );
	$nilai  = isset( $opsi[ $kunci ] ) ? $opsi[ $kunci ] : '';

	if ( '' === trim( (string) $nilai ) ) {
		if ( '' !== $cadangan ) {
			return $cadangan;
		}
		return isset( $bawaan[ $kunci ] ) ? $bawaan[ $kunci ] : '';
	}
	return $nilai;
}

/** Cetak sebagai teks biasa. */
function tcm_teks( $halaman, $kunci ) {
	echo esc_html( tcm_kwt_nilai( $halaman, $kunci ) );
}

/** Cetak teks yang boleh mengandung <em> <b> <br> dan sejenisnya. */
function tcm_kaya( $halaman, $kunci ) {
	echo wp_kses( tcm_kwt_nilai( $halaman, $kunci ), tcm_kwt_tag_kaya() );
}

/** Cetak isi dari editor teks kaya (beberapa paragraf). */
function tcm_html( $halaman, $kunci ) {
	echo wp_kses_post( tcm_kwt_nilai( $halaman, $kunci ) );
}

/**
 * Cetak alamat gambar untuk atribut src.
 * Kalau belum ada gambar yang diunggah, dipakai berkas bawaan di dalam tema —
 * jadi halaman tidak pernah kehilangan gambarnya.
 *
 * @param string $halaman  Slug halaman.
 * @param string $kunci    Nama kolom.
 * @param string $cadangan Alamat berkas di dalam tema, mis. 'assets/img/foto.jpg'.
 */
function tcm_gambar( $halaman, $kunci, $cadangan = '' ) {
	$url = tcm_kwt_gambar( $halaman, $kunci, 'full' );
	if ( ! $url && $cadangan ) {
		$url = TCM_URI . '/' . ltrim( $cadangan, '/' );
	}
	echo esc_url( $url );
}

/** Alamat gambar dari kolom bertipe 'gambar'. Kosong kalau belum dipilih. */
function tcm_kwt_gambar( $halaman, $kunci, $ukuran = 'full' ) {
	$id = absint( tcm_kwt_nilai( $halaman, $kunci ) );
	if ( ! $id ) {
		return '';
	}
	$src = wp_get_attachment_image_src( $id, $ukuran );
	return $src ? $src[0] : '';
}

/**
 * Kumpulkan kelompok kolom berulang jadi larik siap di-loop.
 * Baris dilewati kalau kolom penentunya (yang pertama) kosong.
 *
 * Contoh: tcm_kwt_daftar( 'beranda', 'svc%d_', 9, array( 'judul', 'teks' ) )
 */
function tcm_kwt_daftar( $halaman, $pola, $jumlah, $subkunci ) {
	$hasil = array();
	for ( $i = 1; $i <= $jumlah; $i++ ) {
		$awalan = sprintf( $pola, $i );
		$baris  = array();
		foreach ( $subkunci as $sub ) {
			$baris[ $sub ] = trim( (string) tcm_kwt_nilai( $halaman, $awalan . $sub ) );
		}
		$penentu = reset( $subkunci );
		if ( '' !== $baris[ $penentu ] ) {
			$hasil[] = $baris;
		}
	}
	return $hasil;
}

/* Nama pendek untuk dipakai di templat — hanya dipasang kalau belum dipakai
   plugin lain, supaya tidak pernah bentrok. */
if ( ! function_exists( 'tcm_konten' ) ) {
	function tcm_konten( $halaman, $kunci, $cadangan = '' ) {
		return tcm_kwt_nilai( $halaman, $kunci, $cadangan );
	}
}
if ( ! function_exists( 'tcm_konten_gambar' ) ) {
	function tcm_konten_gambar( $halaman, $kunci, $ukuran = 'full' ) {
		return tcm_kwt_gambar( $halaman, $kunci, $ukuran );
	}
}
if ( ! function_exists( 'tcm_konten_daftar' ) ) {
	function tcm_konten_daftar( $halaman, $pola, $jumlah, $subkunci ) {
		return tcm_kwt_daftar( $halaman, $pola, $jumlah, $subkunci );
	}
}

/* =========================================================================
 * 3. Menu admin
 * ====================================================================== */

add_action( 'admin_menu', 'tcm_kwt_menu' );
function tcm_kwt_menu() {
	$skema = tcm_kwt_skema();
	$slugs = array_keys( $skema );
	$utama = reset( $slugs );

	add_menu_page(
		'Konten Website',
		'Konten Website',
		TCM_KWT_KAPABILITAS,
		'tcm-konten-' . $utama,
		function () use ( $utama ) {
			tcm_kwt_render_halaman( $utama );
		},
		'dashicons-edit-page',
		3
	);

	foreach ( $skema as $slug => $def ) {
		add_submenu_page(
			'tcm-konten-' . $utama,
			$def['judul'],
			$def['menu'],
			TCM_KWT_KAPABILITAS,
			'tcm-konten-' . $slug,
			function () use ( $slug ) {
				tcm_kwt_render_halaman( $slug );
			}
		);
	}
}

/* =========================================================================
 * 4. Penyimpanan & pembersihan data
 * ====================================================================== */

add_action( 'admin_init', 'tcm_kwt_daftar_pengaturan' );
function tcm_kwt_daftar_pengaturan() {
	foreach ( tcm_kwt_daftar_halaman() as $slug ) {
		foreach ( array_keys( tcm_daftar_bahasa() ) as $bahasa ) {

			register_setting(
				tcm_kwt_grup( $slug, $bahasa ),
				tcm_kwt_opsi( $slug, $bahasa ),
				array(
					'type'              => 'array',
					'sanitize_callback' => function ( $masuk ) use ( $slug ) {
						return tcm_kwt_bersihkan( $masuk, $slug );
					},
					'default'           => tcm_kwt_bawaan( $slug, $bahasa ),
				)
			);

			// Bawaannya hanya Administrator yang boleh menyimpan lewat options.php.
			add_filter(
				'option_page_capability_' . tcm_kwt_grup( $slug, $bahasa ),
				function () {
					return TCM_KWT_KAPABILITAS;
				}
			);
		}
	}
}

function tcm_kwt_bersihkan( $masuk, $halaman ) {
	$bersih = array();
	$masuk  = is_array( $masuk ) ? $masuk : array();

	foreach ( tcm_kwt_bawaan( $halaman, 'id' ) as $kunci => $bawaan ) {
		$nilai = isset( $masuk[ $kunci ] ) ? $masuk[ $kunci ] : '';
		$kolom = tcm_kwt_kolom( $halaman, $kunci );
		$tipe  = ( $kolom && isset( $kolom['tipe'] ) ) ? $kolom['tipe'] : 'text';

		switch ( $tipe ) {
			case 'editor':
				$bersih[ $kunci ] = wp_kses_post( $nilai );
				break;

			case 'kaya':
				$bersih[ $kunci ] = wp_kses( $nilai, tcm_kwt_tag_kaya() );
				break;

			case 'textarea':
				$bersih[ $kunci ] = sanitize_textarea_field( $nilai );
				break;

			case 'url':
				$nilai            = trim( (string) $nilai );
				$bersih[ $kunci ] = ( '' === $nilai || '/' === substr( $nilai, 0, 1 ) )
					? sanitize_text_field( $nilai )
					: esc_url_raw( $nilai );
				break;

			case 'email':
				$nilai            = trim( (string) $nilai );
				$bersih[ $kunci ] = ( '' === $nilai ) ? '' : sanitize_email( $nilai );
				break;

			case 'telepon':
				$bersih[ $kunci ] = preg_replace( '/[^0-9+()\-. ]/', '', (string) $nilai );
				break;

			case 'gambar':
			case 'video':
				$bersih[ $kunci ] = absint( $nilai ) ? (string) absint( $nilai ) : '';
				break;

			case 'pilihan':
				$sah              = ( $kolom && isset( $kolom['pilihan'] ) ) ? array_keys( $kolom['pilihan'] ) : array();
				$bersih[ $kunci ] = in_array( $nilai, $sah, true ) ? $nilai : $bawaan;
				break;

			default:
				$bersih[ $kunci ] = sanitize_text_field( $nilai );
		}
	}
	return $bersih;
}

/* =========================================================================
 * 5. Aset halaman admin
 * ====================================================================== */

add_action( 'admin_enqueue_scripts', 'tcm_kwt_aset' );
function tcm_kwt_aset( $layar ) {
	if ( false === strpos( (string) $layar, 'tcm-konten-' ) ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_style( 'tcm-kw', TCM_URI . '/inc/konten/admin.css', array(), TCM_VER );
	wp_enqueue_script( 'tcm-kw', TCM_URI . '/inc/konten/admin.js', array( 'jquery' ), TCM_VER, true );
	wp_localize_script(
		'tcm-kw',
		'tcmKWT',
		array(
			'pilihGambar' => 'Pilih Gambar',
			'gunakan'     => 'Gunakan gambar ini',
		)
	);
}

/* =========================================================================
 * 6. Tampilan halaman admin
 * ====================================================================== */

/**
 * Kunci isian yang terdaftar lebih dari satu kali pada satu halaman.
 *
 * Dua kolom dengan name POST yang sama membuat peramban hanya mengirim
 * nilai yang terakhir — kolom pertama tampak "tidak mau tersimpan".
 * Kejadian ini pernah menimpa aw1_judul / aw2_judul / berita_tombol
 * (diperbaiki di v4.3.5), jadi sekarang diperiksa otomatis.
 */
function tcm_kwt_kunci_ganda( $halaman ) {
	$def = tcm_kwt_halaman( $halaman );
	if ( ! $def ) {
		return array();
	}
	$hitung = array();
	foreach ( $def['bagian'] as $bagian ) {
		foreach ( $bagian['kolom'] as $kunci => $kolom ) {
			if ( isset( $kolom['tipe'] ) && 'info' === $kolom['tipe'] ) {
				continue;
			}
			$hitung[ $kunci ] = isset( $hitung[ $kunci ] ) ? $hitung[ $kunci ] + 1 : 1;
		}
	}
	return array_keys( array_filter( $hitung, function ( $n ) { return $n > 1; } ) );
}

function tcm_kwt_render_halaman( $halaman ) {
	if ( ! current_user_can( TCM_KWT_KAPABILITAS ) ) {
		wp_die( 'Anda tidak punya izin untuk membuka halaman ini.' );
	}

	$def = tcm_kwt_halaman( $halaman );
	if ( ! $def ) {
		wp_die( 'Halaman tidak dikenal.' );
	}

	$ganda = tcm_kwt_kunci_ganda( $halaman );
	if ( $ganda ) {
		printf(
			'<div class="notice notice-error"><p><b>Kesalahan skema tema:</b> kunci isian terdaftar ganda pada halaman ini: <code>%s</code>. Kolom pertamanya tidak akan pernah tersimpan — perbaiki skema.php sebelum menyunting.</p></div>',
			esc_html( implode( '</code>, <code>', $ganda ) )
		);
	}

	$bahasa = tcm_bahasa();
	$opsi   = wp_parse_args( (array) get_option( tcm_kwt_opsi( $halaman ), array() ), tcm_kwt_bawaan( $halaman ) );
	$tautan = tcm_kwt_tautan_halaman( $halaman );
	$punya_polylang = function_exists( 'pll_current_language' );
	?>
	<div class="wrap tcm-kw">
		<h1><?php echo esc_html( $def['judul'] ); ?></h1>

		<h2 class="nav-tab-wrapper tcm-kw-bahasa">
			<?php foreach ( tcm_daftar_bahasa() as $kode => $nama ) : ?>
				<a class="nav-tab<?php echo $kode === $bahasa ? ' nav-tab-active' : ''; ?>"
				   href="<?php echo esc_url( add_query_arg( array( 'page' => 'tcm-konten-' . $halaman, 'bahasa' => $kode ), admin_url( 'admin.php' ) ) ); ?>">
					<?php echo esc_html( $nama ); ?>
				</a>
			<?php endforeach; ?>
		</h2>

		<?php if ( 'en' === $bahasa && ! $punya_polylang ) : ?>
			<div class="notice notice-warning inline"><p>
				<b>Plugin Polylang belum aktif.</b> Isian bahasa Inggris tetap tersimpan di sini,
				tetapi pengunjung belum bisa membukanya sampai Polylang dipasang dan bahasa Inggris
				ditambahkan. Pasang lewat <b>Plugin &rarr; Tambah Baru &rarr; cari &ldquo;Polylang&rdquo;</b>.
			</p></div>
		<?php endif; ?>
		<p class="tcm-kw-intro">
			Ubah tulisan, angka, dan gambar dari sini. Tata letak, warna, dan huruf sudah
			dikunci di tema — apa pun yang Anda ketik tidak akan merusak tampilan situs.
			<?php if ( $tautan ) : ?>
				<a href="<?php echo esc_url( $tautan ); ?>" target="_blank" rel="noopener">Lihat halaman aslinya &rarr;</a>
			<?php endif; ?>
		</p>

		<div class="tcm-kw-cari-wadah">
			<label class="screen-reader-text" for="tcm-kw-cari">Cari kolom isian</label>
			<input type="search" id="tcm-kw-cari" class="tcm-kw-cari"
			       placeholder="Cari kolom&hellip; misalnya: telepon, alamat, judul"
			       autocomplete="off">
			<span class="tcm-kw-cari-hasil" id="tcm-kw-cari-hasil"></span>
		</div>

		<div class="tcm-kw-kolom">
			<form method="post" action="options.php" class="tcm-kw-form">
				<?php settings_fields( tcm_kwt_grup( $halaman ) ); ?>

				<?php foreach ( $def['bagian'] as $id_bagian => $bagian ) : ?>
					<div class="tcm-kw-kartu" data-bagian="<?php echo esc_attr( $id_bagian ); ?>" data-judul="<?php echo esc_attr( $bagian['judul'] ); ?>">
						<h2><?php echo esc_html( $bagian['judul'] ); ?></h2>
						<?php if ( ! empty( $bagian['keterangan'] ) ) : ?>
							<p class="tcm-kw-ket"><?php echo esc_html( $bagian['keterangan'] ); ?></p>
						<?php endif; ?>

						<table class="form-table" role="presentation">
							<tbody>
							<?php foreach ( $bagian['kolom'] as $kunci => $kolom ) : ?>
								<?php if ( isset( $kolom['tipe'] ) && 'info' === $kolom['tipe'] ) : ?>
									<tr>
										<td colspan="2" class="tcm-kw-info-sel">
											<div class="tcm-kw-info"><?php echo esc_html( $kolom['bawaan'] ); ?></div>
										</td>
									</tr>
									<?php continue; ?>
								<?php endif; ?>
								<tr class="tcm-kw-baris" data-cari="<?php
									echo esc_attr( mb_strtolower(
										$kolom['label'] . ' ' . $kunci . ' ' .
										( isset( $kolom['bantuan'] ) ? $kolom['bantuan'] : '' ) . ' ' .
										wp_strip_all_tags( (string) ( isset( $kolom['bawaan'] ) ? $kolom['bawaan'] : '' ) )
									) ); ?>">
									<th scope="row">
										<label for="tcm_<?php echo esc_attr( $kunci ); ?>">
											<?php echo esc_html( $kolom['label'] ); ?>
										</label>
									</th>
									<td>
										<?php tcm_kwt_render_kolom( $halaman, $kunci, $kolom, $opsi, $id_bagian ); ?>
										<?php if ( ! empty( $kolom['bantuan'] ) ) : ?>
											<p class="description"><?php echo esc_html( $kolom['bantuan'] ); ?></p>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php endforeach; ?>

				<?php submit_button( 'Simpan Perubahan' ); ?>
			</form>

			<div class="tcm-kw-pratinjau-wadah">
				<div class="tcm-kw-pratinjau-lengket">
					<h2>Pratinjau</h2>
					<p class="tcm-kw-ket">Sketsa kasar untuk memeriksa tulisan dan angka. <b>Ikon, foto, warna, dan tata letak asli tidak digambar di sini</b> — semuanya tetap seperti di tema. Untuk melihat hasil sebenarnya, buka halaman aslinya.</p>
					<div class="tcm-kw-layar" id="tcm-kw-pratinjau"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/** Alamat halaman depan situs yang bersangkutan, untuk tombol "Lihat halaman aslinya". */
function tcm_kwt_tautan_halaman( $halaman ) {
	if ( 'beranda' === $halaman ) {
		return home_url( '/' );
	}
	$kandidat = array(
		'tentang'    => array( 'tentang-kami', 'tentang', 'profil' ),
		'layanan'    => array( 'layanan', 'jasa' ),
		'proyek'     => array( 'proyek' ),
		'sertifikat' => array( 'sertifikat', 'sertifikat-penghargaan' ),
		'esg'        => array( 'esg', 'esg-keberlanjutan' ),
		'kontak'     => array( 'kontak', 'hubungi-kami' ),
		'karier'     => array( 'karier', 'karir' ),
		'sdm'        => array( 'sdm', 'human-capital', 'sdm-human-capital' ),
		'kebijakan'  => array( 'kebijakan', 'kebijakan-qhse' ),
	);
	if ( ! isset( $kandidat[ $halaman ] ) || ! function_exists( 'tcm_url' ) ) {
		return '';
	}
	return tcm_url( $kandidat[ $halaman ], '' );
}

/** Cetak satu kolom isian sesuai tipenya. */
function tcm_kwt_render_kolom( $halaman, $kunci, $kolom, $opsi, $id_bagian ) {
	$nama  = tcm_kwt_opsi( $halaman ) . '[' . $kunci . ']';
	$id    = 'tcm_' . $kunci;
	$nilai = isset( $opsi[ $kunci ] ) ? $opsi[ $kunci ] : '';
	$tipe  = isset( $kolom['tipe'] ) ? $kolom['tipe'] : 'text';
	$peran = isset( $kolom['peran'] ) ? $kolom['peran'] : '';
	$data  = sprintf(
		' data-peran="%s" data-bagian="%s"%s',
		esc_attr( $peran ),
		esc_attr( $id_bagian ),
		( 'kaya' === $tipe ) ? ' data-kaya="1"' : ''
	);

	switch ( $tipe ) {

		case 'textarea':
			printf(
				'<textarea id="%1$s" name="%2$s" rows="3" class="large-text tcm-kw-input"%4$s>%3$s</textarea>',
				esc_attr( $id ),
				esc_attr( $nama ),
				esc_textarea( $nilai ),
				$data // phpcs:ignore WordPress.Security.EscapeOutput -- sudah di-escape saat disusun.
			);
			break;

		case 'kaya':
			printf(
				'<input type="text" id="%1$s" name="%2$s" value="%3$s" class="large-text tcm-kw-input tcm-kw-kaya"%4$s>',
				esc_attr( $id ),
				esc_attr( $nama ),
				esc_attr( $nilai ),
				$data // phpcs:ignore WordPress.Security.EscapeOutput
			);
			break;

		case 'editor':
			echo '<div class="tcm-kw-editor"' . $data . '>'; // phpcs:ignore WordPress.Security.EscapeOutput
			wp_editor(
				$nilai,
				$id,
				array(
					'textarea_name' => $nama,
					'textarea_rows' => 8,
					'media_buttons' => false,
					'teeny'         => true,
				)
			);
			echo '</div>';
			break;

		case 'gambar':
			$id_lampiran = absint( $nilai );
			$pratinjau   = $id_lampiran ? wp_get_attachment_image_url( $id_lampiran, 'medium' ) : '';
			$bawaan_tema = ( ! $id_lampiran && ! empty( $kolom['pratinjau'] ) )
				? TCM_URI . '/' . ltrim( $kolom['pratinjau'], '/' )
				: '';
			?>
			<div class="tcm-kw-media"<?php echo $data; ?>>
				<input type="hidden" id="<?php echo esc_attr( $id ); ?>"
				       name="<?php echo esc_attr( $nama ); ?>"
				       value="<?php echo esc_attr( $id_lampiran ? $id_lampiran : '' ); ?>"
				       class="tcm-kw-media-id">
				<div class="tcm-kw-media-pratinjau">
					<?php if ( $pratinjau ) : ?>
						<img src="<?php echo esc_url( $pratinjau ); ?>" alt="">
					<?php endif; ?>
				</div>
				<?php if ( $bawaan_tema ) : ?>
					<div class="tcm-kw-media-bawaan">
						<img src="<?php echo esc_url( $bawaan_tema ); ?>" alt="">
						<span>Gambar bawaan tema &mdash; dipakai selama belum ada gambar baru yang diunggah.</span>
					</div>
				<?php endif; ?>
				<button type="button" class="button tcm-kw-media-pilih"><?php echo $bawaan_tema ? 'Ganti Gambar' : 'Pilih Gambar'; ?></button>
				<button type="button" class="button-link tcm-kw-media-hapus" <?php echo $id_lampiran ? '' : 'style="display:none"'; ?>>Kembalikan ke bawaan</button>
			</div>
			<?php
			break;

		case 'video':
			$id_lampiran = absint( $nilai );
			$berkas_url  = $id_lampiran ? wp_get_attachment_url( $id_lampiran ) : '';
			$bawaan_tema = ( ! $id_lampiran && ! empty( $kolom['pratinjau'] ) )
				? TCM_URI . '/' . ltrim( $kolom['pratinjau'], '/' )
				: '';
			?>
			<div class="tcm-kw-media tcm-kw-media-video" data-pustaka="video"<?php echo $data; ?>>
				<input type="hidden" id="<?php echo esc_attr( $id ); ?>"
				       name="<?php echo esc_attr( $nama ); ?>"
				       value="<?php echo esc_attr( $id_lampiran ? $id_lampiran : '' ); ?>"
				       class="tcm-kw-media-id">
				<div class="tcm-kw-media-pratinjau">
					<?php if ( $berkas_url ) : ?>
						<code><?php echo esc_html( basename( $berkas_url ) ); ?></code>
					<?php endif; ?>
				</div>
				<?php if ( $bawaan_tema ) : ?>
					<div class="tcm-kw-media-bawaan">
						<span>Video bawaan tema (<code><?php echo esc_html( basename( $bawaan_tema ) ); ?></code>) &mdash;
						      dipakai selama belum ada berkas baru yang diunggah.</span>
					</div>
				<?php endif; ?>
				<button type="button" class="button tcm-kw-media-pilih"><?php echo $berkas_url ? 'Ganti Video' : 'Pilih Video'; ?></button>
				<button type="button" class="button-link tcm-kw-media-hapus" <?php echo $id_lampiran ? '' : 'style="display:none"'; ?>>Kembalikan ke bawaan</button>
			</div>
			<?php
			break;

		case 'pilihan':
			$pilihan = isset( $kolom['pilihan'] ) ? $kolom['pilihan'] : array();
			printf(
				'<select id="%1$s" name="%2$s" class="tcm-kw-input"%3$s>',
				esc_attr( $id ),
				esc_attr( $nama ),
				$data // phpcs:ignore WordPress.Security.EscapeOutput
			);
			foreach ( $pilihan as $kode => $teks ) {
				printf(
					'<option value="%1$s"%2$s>%3$s</option>',
					esc_attr( $kode ),
					selected( $nilai, $kode, false ),
					esc_html( $teks )
				);
			}
			echo '</select>';
			break;

		default:
			printf(
				'<input type="text" id="%1$s" name="%2$s" value="%3$s" class="regular-text tcm-kw-input"%4$s>',
				esc_attr( $id ),
				esc_attr( $nama ),
				esc_attr( $nilai ),
				$data // phpcs:ignore WordPress.Security.EscapeOutput
			);
	}
}
