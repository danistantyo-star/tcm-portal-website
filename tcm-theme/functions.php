<?php
/**
 * Tema TCM — fungsi inti.
 *
 * Yang diatur di sini:
 *   1. Pemuatan CSS & JavaScript
 *   2. Tipe konten Proyek dan Sertifikat (yang bisa diedit lewat admin)
 *   3. Kotak isian (custom field) untuk tiap tipe konten
 *   4. Pengimpor konten awal, dijalankan sekali dari menu Alat
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'TCM_URI', get_template_directory_uri() );
define( 'TCM_DIR', get_template_directory() );
/* Versi aset diambil dari header style.css, bukan angka tetap.
   Kalau dipatok '1.0.0', peramban dan plugin cache akan terus menyajikan
   CSS/JS lama setiap kali tema diperbarui. */
$tcm_versi_tema = wp_get_theme( get_template() )->get( 'Version' );
define( 'TCM_VER', $tcm_versi_tema ? $tcm_versi_tema : '1.0.0' );

/* ------------------------------------------- panel Konten Website (v3.3) */
require_once TCM_DIR . '/inc/konten/panel.php';

/* ------------------------------------------------------------------ dasar */
function tcm_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_image_size( 'tcm-thumb', 300, 220, true );
    add_image_size( 'tcm-card', 900, 600, true );
    add_image_size( 'tcm-doc', 900, 900, false );
}
add_action( 'after_setup_theme', 'tcm_setup' );

function tcm_assets() {
    wp_enqueue_style( 'tcm', get_stylesheet_uri(), array(), TCM_VER );
    if ( file_exists( TCM_DIR . '/assets/css/custom.css' ) ) {
        wp_enqueue_style( 'tcm-custom', TCM_URI . '/assets/css/custom.css', array( 'tcm' ), TCM_VER );
    }
    wp_enqueue_style( 'tcm-hut', TCM_URI . '/assets/css/hut26.css', array( 'tcm' ), TCM_VER );
    wp_enqueue_style( 'tcm-v4', TCM_URI . '/assets/css/tambahan-v4.css', array( 'tcm' ), TCM_VER );
    wp_enqueue_script( 'tcm', TCM_URI . '/assets/js/main.js', array(), TCM_VER, true );

    tcm_aset_video_pembuka();
}
add_action( 'wp_enqueue_scripts', 'tcm_assets' );

/* ------------------------------------------------- portal pembuka (v4.4) */

/**
 * Portal pembuka: animasi zoom berbasis scroll di atas Beranda.
 * Hanya aktif di halaman depan. Tambahkan ?portal=0 pada alamat
 * untuk melihat Beranda tanpa portal (mis. saat memeriksa tampilan).
 */
function tcm_portal_aktif() {
    if ( isset( $_GET['portal'] ) && '0' === $_GET['portal'] ) { return false; }
    return is_front_page() && ! is_admin();
}

function tcm_aset_portal() {
    if ( ! tcm_portal_aktif() ) { return; }

    wp_enqueue_style(
        'tcm-portal-font-jakarta',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;800&display=swap',
        array(), null
    );
    wp_enqueue_style(
        'tcm-portal-font-clash',
        'https://api.fontshare.com/v2/css?f[]=clash-display@500,600,700&display=swap',
        array(), null
    );
    wp_enqueue_style( 'tcm-portal', TCM_URI . '/assets/portal/portal.css', array( 'tcm' ), TCM_VER );

    wp_enqueue_script( 'tcm-gsap', TCM_URI . '/assets/portal/gsap.min.js', array(), '3.12.5', true );
    wp_enqueue_script( 'tcm-scrolltrigger', TCM_URI . '/assets/portal/ScrollTrigger.min.js', array( 'tcm-gsap' ), '3.12.5', true );
    wp_enqueue_script( 'tcm-portal', TCM_URI . '/assets/portal/portal.js', array( 'tcm-scrolltrigger' ), TCM_VER, true );

    wp_localize_script( 'tcm-portal', 'TCM_PORTAL', array(
        'base'  => TCM_URI . '/assets/portal/frames/',
        'count' => 120,
    ) );
}
add_action( 'wp_enqueue_scripts', 'tcm_aset_portal' );

/**
 * Video pembuka (intro splash) di Beranda.
 *
 * Skripnya sengaja dimuat di <head> dan TIDAK ditunda (defer), supaya lapisan
 * penutup sudah terpasang sebelum isi halaman sempat tergambar. Pengaturannya
 * dikirim lewat objek window.TCM_VIDEO_POPUP karena di WordPress alamat berkas
 * video tidak sebidang dengan berkas skripnya.
 */
function tcm_aset_video_pembuka() {
    // ?intro=1 memaksa video pembuka tampil sekali lagi — untuk memeriksa
    // atau memperagakannya tanpa harus mengubah pengaturan atau menutup
    // seluruh jendela peramban. Hanya berlaku untuk pengelola yang login.
    $paksa = isset( $_GET['intro'] ) && is_user_logged_in() && current_user_can( 'edit_pages' ); // phpcs:ignore WordPress.Security.NonceVerification

    if ( ! is_front_page() && ! is_home() ) {
        return;
    }
    if ( ! $paksa && 'tampil' !== tcm_kwt_nilai( 'beranda', 'vid_aktif' ) ) {
        return;
    }

    $lampiran = absint( tcm_kwt_nilai( 'beranda', 'vid_berkas' ) );
    if ( $lampiran ) {
        // Video pilihan sendiri: tidak ada berkas cadangan dan poster bawaan.
        $video  = wp_get_attachment_url( $lampiran );
        $webm   = '';
        $poster = '';
    } else {
        $video  = TCM_URI . '/assets/video/tcmlogo3d1080p.mp4';
        $webm   = '';   // MP4 H.264 sudah didukung semua peramban arus utama.
        $poster = TCM_URI . '/assets/video/tcmlogo3d-poster.jpg';
    }
    if ( ! $video ) {
        return;
    }

    wp_enqueue_style( 'tcm-video-pembuka', TCM_URI . '/assets/css/video-popup.css', array( 'tcm' ), TCM_VER );
    wp_enqueue_script( 'tcm-video-pembuka', TCM_URI . '/assets/js/video-popup.js', array(), TCM_VER, false );

    $atur = array(
        'aktif'  => true,
        'sekali' => ( ! $paksa && 'selalu' !== tcm_kwt_nilai( 'beranda', 'vid_ulang' ) ),
        'video'  => $video,
        'webm'   => $webm,
        'poster' => $poster,
    );
    wp_add_inline_script(
        'tcm-video-pembuka',
        'window.TCM_VIDEO_POPUP = ' . wp_json_encode( $atur ) . ';',
        'before'
    );
}

/**
 * Alat periksa video pembuka.
 *
 * Buka alamat mana pun dengan tambahan ?intro=cek sambil login sebagai
 * pengelola, mis. https://situs-anda.com/?intro=cek
 *
 * Kotak hasilnya menyebutkan satu per satu syarat yang harus terpenuhi dan
 * mana yang sedang menghalangi — supaya tidak perlu menebak-nebak lagi.
 */
function tcm_vp_diagnosa() {
    if ( ! isset( $_GET['intro'] ) || 'cek' !== $_GET['intro'] ) { // phpcs:ignore WordPress.Security.NonceVerification
        return;
    }
    if ( ! is_user_logged_in() || ! current_user_can( 'edit_pages' ) ) {
        return;
    }

    $beranda   = ( is_front_page() || is_home() );
    $aktif     = tcm_kwt_nilai( 'beranda', 'vid_aktif' );
    $ulang     = tcm_kwt_nilai( 'beranda', 'vid_ulang' );
    $lampiran  = absint( tcm_kwt_nilai( 'beranda', 'vid_berkas' ) );
    $video     = $lampiran ? wp_get_attachment_url( $lampiran ) : TCM_URI . '/assets/video/tcmlogo3d1080p.mp4';
    $ada_bawaan = file_exists( TCM_DIR . '/assets/video/tcmlogo3d1080p.mp4' );
    $termuat   = wp_script_is( 'tcm-video-pembuka', 'done' ) || wp_script_is( 'tcm-video-pembuka', 'enqueued' );

    $baris = array(
        array( 'Halaman yang dibuka ini Beranda', $beranda ? 'YA' : 'BUKAN — video pembuka memang hanya dipasang di Beranda', $beranda ),
        array( 'Setelan "Tampilkan video pembuka?"', ( 'tampil' === $aktif ? 'Ya, tampilkan' : 'Tidak, matikan' ), ( 'tampil' === $aktif ) ),
        array( 'Setelan "Seberapa sering muncul"', ( 'selalu' === $ulang ? 'Setiap kali halaman dibuka' : 'Sekali per kunjungan' ), true ),
        array( 'Sumber video', ( $lampiran ? 'Unggahan sendiri (ID ' . $lampiran . ')' : 'Bawaan tema' ), true ),
        array( 'Berkas video bawaan ada di tema', $ada_bawaan ? 'ADA' : 'HILANG', $ada_bawaan ),
        array( 'Skrip video-popup.js dimuat halaman ini', $termuat ? 'YA' : 'TIDAK', $termuat ),
        array( 'Versi aset (TCM_VER)', TCM_VER, true ),
        array( 'Bahasa yang sedang berlaku', strtoupper( tcm_bahasa() ), true ),
    );
    ?>
<style>
#tcm-diag{position:fixed;left:16px;bottom:16px;z-index:100000;width:min(430px,calc(100vw - 32px));
  background:#001640;color:#DCE7F5;border:1px solid #123C86;border-radius:12px;
  font:13px/1.55 "Segoe UI",system-ui,Arial,sans-serif;box-shadow:0 20px 60px rgba(0,0,0,.45);overflow:hidden}
#tcm-diag h4{margin:0;padding:12px 16px;background:#00225C;color:#fff;font-size:13px;letter-spacing:.02em}
#tcm-diag ul{list-style:none;margin:0;padding:8px 16px 12px}
#tcm-diag li{display:flex;gap:10px;padding:5px 0;border-bottom:1px solid rgba(255,255,255,.07);align-items:flex-start}
#tcm-diag li:last-child{border-bottom:0}
#tcm-diag .k{flex:1 1 auto;color:#9FBBD8}
#tcm-diag .v{flex:0 0 auto;max-width:52%;text-align:right;font-weight:700}
#tcm-diag .ok{color:#6FDB9A}#tcm-diag .no{color:#FF9A6B}
#tcm-diag .kaki{display:flex;gap:8px;padding:12px 16px;background:rgba(0,0,0,.25);flex-wrap:wrap}
#tcm-diag button{border:0;border-radius:8px;padding:8px 13px;font:700 12px/1 inherit;cursor:pointer}
#tcm-diag .b1{background:#EE6A02;color:#fff}#tcm-diag .b2{background:rgba(255,255,255,.14);color:#fff}
#tcm-diag .cat{padding:6px 16px 2px;font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:#7E9AC0}
</style>
<div id="tcm-diag">
  <h4>Periksa Video Pembuka</h4>
  <div class="cat">Di sisi situs (server)</div>
  <ul>
<?php foreach ( $baris as $b ) : ?>
    <li><span class="k"><?php echo esc_html( $b[0] ); ?></span><span class="v <?php echo $b[2] ? 'ok' : 'no'; ?>"><?php echo esc_html( $b[1] ); ?></span></li>
<?php endforeach; ?>
  </ul>
  <div class="cat">Di sisi peramban Anda</div>
  <ul id="tcm-diag-js"></ul>
  <div class="kaki">
    <button type="button" class="b1" id="tcm-diag-reset">Hapus penanda &amp; muat ulang</button>
    <button type="button" class="b2" id="tcm-diag-tutup">Tutup</button>
  </div>
</div>
<script>
(function(){
  var ul = document.getElementById('tcm-diag-js');
  function baris(k, v, ok){
    var li = document.createElement('li');
    li.innerHTML = '<span class="k"></span><span class="v ' + (ok ? 'ok' : 'no') + '"></span>';
    li.children[0].textContent = k; li.children[1].textContent = v; ul.appendChild(li);
  }
  var ada = !!window.TCM_VIDEO_POPUP;
  baris('Pengaturan window.TCM_VIDEO_POPUP terkirim', ada ? 'YA' : 'TIDAK', ada);

  var gerak = false;
  try { gerak = window.matchMedia('(prefers-reduced-motion: reduce)').matches; } catch(e){}
  baris('Sistem Anda minta "kurangi gerak"', gerak ? 'YA — popup sengaja dilewati' : 'Tidak', !gerak);

  var hemat = false;
  try { hemat = !!(navigator.connection && navigator.connection.saveData); } catch(e){}
  baris('Mode hemat data peramban', hemat ? 'AKTIF — popup dilewati' : 'Mati', !hemat);

  var tanda = null;
  try { tanda = window.sessionStorage.getItem('tcm-intro-video'); } catch(e){ tanda = 'terblokir'; }
  baris('Penanda "sudah pernah tampil" di tab ini', tanda ? 'ADA — itu sebabnya tidak muncul lagi' : 'Belum ada', !tanda);

  var bisa = document.createElement('video').canPlayType('video/mp4; codecs="avc1.42E01E"');
  baris('Peramban bisa memutar MP4 H.264', bisa ? 'Bisa (' + bisa + ')' : 'TIDAK BISA', !!bisa);

  setTimeout(function(){
    var l = document.querySelector('.tcm-vp');
    baris('Lapisan popup terpasang di halaman ini', l ? 'YA' : 'Tidak', !!l);
  }, 700);

  document.getElementById('tcm-diag-reset').addEventListener('click', function(){
    try { window.sessionStorage.removeItem('tcm-intro-video'); } catch(e){}
    var u = new URL(window.location.href);
    u.searchParams.delete('intro');
    window.location.href = u.toString();
  });
  document.getElementById('tcm-diag-tutup').addEventListener('click', function(){
    var d = document.getElementById('tcm-diag'); if (d) d.remove();
  });
})();
</script>
    <?php
}
add_action( 'wp_footer', 'tcm_vp_diagnosa', 99 );

/**
 * Periksa apakah sebuah shortcode benar-benar bisa dipakai.
 *
 * Dipakai bagian Instagram dan formulir kontak. Keduanya boleh memakai plugin
 * pihak ketiga, dan keduanya harus punya jalan mundur yang aman kalau
 * pluginnya belum terpasang.
 *
 * @return string Kosong kalau siap; kalau tidak, penjelasan masalahnya.
 */
function tcm_masalah_shortcode( $kode ) {
    $kode = trim( (string) $kode );
    if ( '' === $kode ) {
        return 'kolom shortcode masih kosong';
    }
    if ( preg_match( '/\[([a-z0-9_\-]+)/i', $kode, $c ) && ! shortcode_exists( $c[1] ) ) {
        return sprintf( 'shortcode [%s] tidak dikenali — pluginnya belum terpasang atau belum diaktifkan', $c[1] );
    }
    return '';
}

/**
 * Formulir kontak: pakai formulir bawaan tema, atau shortcode plugin formulir.
 *
 * Formulir bawaan tema TIDAK mengirim surel — itu memang formulir contoh dari
 * masa prototipe. Sebelum situs dipakai umum, pasang plugin formulir dan
 * tempel shortcode-nya di panel supaya pesan pengunjung benar-benar masuk.
 *
 * @return array {mode, shortcode, masalah}
 */
function tcm_form_sumber() {
    if ( 'plugin' !== tcm_kwt_nilai( 'kontak', 'form_sumber' ) ) {
        return array( 'mode' => 'bawaan', 'shortcode' => '', 'masalah' => '' );
    }
    $kode    = trim( (string) tcm_kwt_nilai( 'kontak', 'form_shortcode' ) );
    $masalah = tcm_masalah_shortcode( $kode );
    if ( $masalah ) {
        return array( 'mode' => 'bawaan', 'shortcode' => '', 'masalah' => 'Formulir kontak diatur memakai plugin, tetapi ' . $masalah . '.' );
    }
    return array( 'mode' => 'plugin', 'shortcode' => $kode, 'masalah' => '' );
}

/**
 * Bagian Instagram di Beranda punya dua sumber:
 *   manual  — delapan kartu yang diisi sendiri lewat panel
 *   plugin  — shortcode dari plugin feed Instagram (mis. Smash Balloon)
 *
 * Fungsi ini memutuskan mana yang dipakai. Kalau mode plugin dipilih tetapi
 * shortcode-nya kosong atau pluginnya belum aktif, situs otomatis kembali ke
 * mode manual — jadi bagian ini tidak pernah tampil kosong di depan pengunjung.
 *
 * @return array {mode, shortcode, masalah}
 */
function tcm_ig_sumber() {
    $mode = tcm_kwt_nilai( 'beranda', 'ig_sumber' );
    $kode = trim( (string) tcm_kwt_nilai( 'beranda', 'ig_shortcode' ) );

    if ( 'plugin' !== $mode ) {
        return array( 'mode' => 'manual', 'shortcode' => '', 'masalah' => '' );
    }
    $masalah = tcm_masalah_shortcode( $kode );
    if ( $masalah ) {
        return array( 'mode' => 'manual', 'shortcode' => '', 'masalah' => 'Sumber Instagram diatur ke "plugin", tetapi ' . $masalah . '.' );
    }

    return array( 'mode' => 'plugin', 'shortcode' => $kode, 'masalah' => '' );
}

/* ============================================================
 * Dwibahasa (Polylang)
 * ============================================================ */

/** Polylang aktif dan punya lebih dari satu bahasa? */
function tcm_dwibahasa() {
    if ( ! function_exists( 'pll_languages_list' ) ) {
        return false;
    }
    $daftar = pll_languages_list( array( 'fields' => 'slug' ) );
    return is_array( $daftar ) && count( $daftar ) > 1;
}

/**
 * Mode pratinjau bahasa Inggris — untuk memeriksa isi versi Inggris
 * SEBELUM Polylang dipasang.
 *
 * Sengaja hanya berlaku untuk pengguna yang sedang login sebagai pengelola.
 * Pengunjung biasa tidak pernah bisa membukanya, jadi tidak ada dua salinan
 * halaman yang sama beredar di mesin pencari. Begitu Polylang aktif, mode ini
 * mati sendiri dan digantikan alamat /en/ yang sebenarnya.
 */
function tcm_boleh_pratinjau_bahasa() {
    return ! tcm_dwibahasa() && is_user_logged_in() && current_user_can( 'edit_pages' );
}

/**
 * Pilihan bahasa pratinjau disimpan dalam kuki.
 *
 * Tanpa ini, penanda ?bahasa=en hilang begitu pengunjung mengeklik menu —
 * seluruh tautan di kepala dan kaki halaman dibangun dari home_url() yang
 * tidak membawa penanda itu, jadi halaman berikutnya kembali ke Indonesia.
 * Kukinya hanya dipasang untuk pengelola yang sedang login, jadi tidak
 * memengaruhi pengunjung maupun cache halaman.
 */
function tcm_pratinjau_bahasa_kuki() {
    if ( ! tcm_boleh_pratinjau_bahasa() ) {
        return;
    }
    if ( ! isset( $_GET['bahasa'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
        return;
    }
    $kode = ( 'en' === $_GET['bahasa'] ) ? 'en' : 'id'; // phpcs:ignore WordPress.Security.NonceVerification
    if ( ! headers_sent() ) {
        setcookie(
            'tcm_bahasa', $kode, time() + DAY_IN_SECONDS,
            COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN, is_ssl(), false
        );
    }
    $_COOKIE['tcm_bahasa'] = $kode;   // berlaku juga untuk permintaan ini
}
add_action( 'init', 'tcm_pratinjau_bahasa_kuki' );

/** Sedang membuka pratinjau bahasa Inggris? */
function tcm_sedang_pratinjau_en() {
    if ( ! tcm_boleh_pratinjau_bahasa() ) {
        return false;
    }
    if ( isset( $_GET['bahasa'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
        return 'en' === $_GET['bahasa']; // phpcs:ignore WordPress.Security.NonceVerification
    }
    return isset( $_COOKIE['tcm_bahasa'] ) && 'en' === $_COOKIE['tcm_bahasa'];
}

/**
 * Alamat halaman ini dengan penanda bahasa pratinjau.
 *
 * Sengaja memakai alamat RELATIF (hasil add_query_arg atas REQUEST_URI),
 * bukan home_url( add_query_arg() ). Pola lama itu menggandakan awalan
 * jalur pada instalasi yang tidak berada di akar domain — WordPress
 * Playground (playground.wordpress.net/scope:...) dan instalasi
 * subfolder — sehingga tautan ID/EN berujung halaman 404.
 */
function tcm_url_pratinjau( $kode ) {
    $kini = remove_query_arg( 'bahasa' ); // REQUEST_URI saat ini, tanpa penanda lama
    return add_query_arg( 'bahasa', ( 'en' === $kode ? 'en' : 'id' ), $kini );
}

/**
 * Saat pratinjau Inggris aktif, tag <html> ikut berbahasa Inggris —
 * penting untuk pembaca layar dan untuk teks tombol pada video pembuka
 * ("Skip" vs "Lewati") yang membaca atribut lang.
 */
function tcm_lang_attr_pratinjau( $keluaran ) {
    return tcm_sedang_pratinjau_en() ? 'lang="en-US"' : $keluaran;
}
add_filter( 'language_attributes', 'tcm_lang_attr_pratinjau' );

/**
 * Halaman pratinjau tidak boleh diindeks mesin pencari, sekalipun
 * alamatnya bocor ke luar.
 */
function tcm_noindex_pratinjau() {
    if ( tcm_sedang_pratinjau_en() ) {
        echo '<meta name="robots" content="noindex,nofollow">' . "\n";
    }
}
add_action( 'wp_head', 'tcm_noindex_pratinjau', 1 );

/**
 * Alamat halaman yang sama dalam bahasa lain.
 * Tanpa Polylang, kembalikan kosong supaya pengalih bahasa tidak ditampilkan.
 */
function tcm_url_bahasa( $kode ) {
    if ( ! function_exists( 'pll_the_languages' ) ) {
        return '';
    }
    $daftar = pll_the_languages( array( 'raw' => 1, 'hide_if_no_translation' => 0 ) );
    if ( ! is_array( $daftar ) ) {
        return '';
    }
    foreach ( $daftar as $b ) {
        if ( isset( $b['slug'] ) && 0 === strpos( strtolower( $b['slug'] ), $kode ) ) {
            return isset( $b['url'] ) ? $b['url'] : '';
        }
    }
    return '';
}

/**
 * Terjemahkan alamat halaman ke bahasa yang sedang berlaku.
 * Dipakai menu dan kaki halaman supaya pengunjung berbahasa Inggris
 * tidak terlempar ke halaman Indonesia.
 */
function tcm_url_terjemah( $id_halaman ) {
    if ( function_exists( 'pll_get_post' ) ) {
        $lain = pll_get_post( $id_halaman );
        if ( $lain ) {
            return get_permalink( $lain );
        }
    }
    return get_permalink( $id_halaman );
}

/** Tanda hreflang supaya mesin pencari tahu pasangan halaman ID dan EN. */
function tcm_hreflang() {
    if ( ! tcm_dwibahasa() ) {
        return;
    }
    foreach ( array( 'id', 'en' ) as $kode ) {
        $url = tcm_url_bahasa( $kode );
        if ( $url ) {
            printf( '<link rel="alternate" hreflang="%s" href="%s">' . "\n", esc_attr( $kode ), esc_url( $url ) );
        }
    }
    $utama = tcm_url_bahasa( 'id' );
    if ( $utama ) {
        printf( '<link rel="alternate" hreflang="x-default" href="%s">' . "\n", esc_url( $utama ) );
    }
}
add_action( 'wp_head', 'tcm_hreflang' );

/** Tema HUT ke-26 sedang menyala? */
function tcm_hut_nyala() {
    return 'tampil' === tcm_kwt_nilai( 'umum', 'hut_aktif' );
}

/**
 * Selama tema HUT menyala, <body> diberi kelas "hut".
 *
 * Markah hiasannya selalu ditulis di header dan Beranda, tapi CSS
 * menyembunyikannya (body:not(.hut) .hut-el) sampai kelas ini ada — jadi
 * menyalakan dan mematikan tema HUT cukup satu pilihan di panel admin.
 */
function tcm_kelas_hut( $kelas ) {
    if ( tcm_hut_nyala() ) {
        $kelas[] = 'hut';
    }
    return $kelas;
}
add_filter( 'body_class', 'tcm_kelas_hut' );

/**
 * Cari alamat halaman berdasarkan beberapa kemungkinan slug.
 * Kalau halamannya belum dibuat, jatuh ke alamat cadangan.
 * Dengan begini menu tetap benar walau ejaan slug sedikit berbeda.
 */
function tcm_url( $kandidat, $cadangan = '/' ) {
    foreach ( (array) $kandidat as $slug ) {
        $hal = get_page_by_path( $slug );
        if ( $hal && 'publish' === $hal->post_status ) {
            // Kalau situs dwibahasa, arahkan ke terjemahan halaman ini.
            return tcm_url_terjemah( $hal->ID );
        }
    }
    return home_url( $cadangan );
}

/** Alamat halaman Berita (halaman pos yang dipilih di Pengaturan &rarr; Membaca). */
function tcm_url_berita() {
    $id = (int) get_option( 'page_for_posts' );
    if ( $id ) { return get_permalink( $id ); }
    return tcm_url( array( 'berita', 'news' ), '/berita/' );
}

/** Tandai menu yang sedang dibuka. */
function tcm_active( $key ) {
    $cur = '';
    if ( is_front_page() )                    { $cur = 'home'; }
    elseif ( is_singular( 'post' ) || is_home() || is_category() ) { $cur = 'berita'; }
    elseif ( is_page() ) {
        $slug = get_post_field( 'post_name', get_queried_object_id() );
        $map  = array(
            'tentang-kami' => 'tentang', 'tentang' => 'tentang', 'profil' => 'tentang',
            'layanan' => 'layanan', 'jasa' => 'layanan',
            'proyek' => 'proyek', 'pengalaman' => 'proyek',
            'sertifikat' => 'sertifikat', 'sertifikat-penghargaan' => 'sertifikat',
            'esg' => 'esg', 'esg-keberlanjutan' => 'esg',
            'kontak' => 'kontak', 'hubungi-kami' => 'kontak',
            'karier' => 'karier', 'karir' => 'karier',
            'sdm' => 'sdm', 'sdm-human-capital' => 'sdm', 'human-capital' => 'sdm',
            'kebijakan' => 'kebijakan', 'kebijakan-qhse' => 'kebijakan',
        );
        $cur = isset( $map[ $slug ] ) ? $map[ $slug ] : '';
    }
    return $cur === $key ? ' class="on"' : '';
}

/** Ambil beberapa meta sekaligus. */
function tcm_meta( $id, $keys ) {
    $out = array();
    foreach ( $keys as $k ) {
        $out[ $k ] = get_post_meta( $id, 'tcm_' . $k, true );
    }
    return $out;
}

/**
 * Nilai versi singkat untuk daftar proyek di Beranda.
 *
 * Beranda memakai judul, klien, lokasi, dan periode dalam bentuk pendek supaya
 * kartunya rapi; halaman Proyek memakai versi lengkapnya. Kalau kolom singkat
 * dikosongkan, otomatis dipakai nilai lengkapnya — jadi tidak pernah kosong.
 */
function tcm_singkat( $id, $kunci, $lengkap ) {
    $nilai = trim( (string) get_post_meta( $id, 'tcm_' . $kunci . '_singkat', true ) );
    return '' !== $nilai ? $nilai : $lengkap;
}

/** Ubah daftar tag (dipisah baris baru atau titik koma) jadi pil. */
function tcm_tags( $raw ) {
    $raw = trim( (string) $raw );
    if ( '' === $raw ) { return ''; }
    $items = preg_split( '/[\r\n;]+/', $raw );
    $out   = '';
    foreach ( $items as $t ) {
        $t = trim( $t );
        if ( '' !== $t ) { $out .= '<i>' . esc_html( $t ) . '</i>'; }
    }
    return $out ? '<div class="tags">' . $out . '</div>' : '';
}


/* ---------------------------------------- hitungan otomatis untuk tampilan */
/** Jumlah proyek terbit; $status boleh 'berjalan' atau 'selesai'. */
function tcm_jumlah_proyek( $status = '' ) {
    $args = array(
        'post_type'      => 'tcm_proyek',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'no_found_rows'  => false,
    );
    if ( $status ) {
        $args['meta_query'] = array( array( 'key' => 'tcm_status', 'value' => $status ) );
    }
    $q = new WP_Query( $args );
    return (int) $q->post_count;
}

/** Jumlah dokumen pada satu kelompok sertifikat. */
function tcm_jumlah_sertifikat( $kelompok = '' ) {
    $args = array(
        'post_type'      => 'tcm_sertifikat',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    );
    if ( $kelompok ) {
        $args['meta_query'] = array( array( 'key' => 'tcm_kelompok', 'value' => $kelompok ) );
    }
    $q = new WP_Query( $args );
    return (int) $q->post_count;
}

/** Angka jadi kata: 14 -> "Empat Belas". Di atas 99 dikembalikan angkanya saja. */
function tcm_terbilang( $n ) {
    $n = (int) $n;
    $satuan = array( 'Nol', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam',
                     'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas' );
    if ( $n < 12 ) { return $satuan[ $n ]; }
    if ( $n < 20 ) { return $satuan[ $n - 10 ] . ' Belas'; }
    if ( $n < 100 ) {
        $puluh = $satuan[ intdiv( $n, 10 ) ] . ' Puluh';
        $sisa  = $n % 10;
        return $sisa ? $puluh . ' ' . $satuan[ $sisa ] : $puluh;
    }
    return number_format_i18n( $n );
}

/* ------------------------------------------------- tipe konten: Proyek */
function tcm_register_types() {

    register_post_type( 'tcm_proyek', array(
        'labels' => array(
            'name'          => 'Proyek',
            'singular_name' => 'Proyek',
            'add_new'       => 'Tambah Proyek',
            'add_new_item'  => 'Tambah Proyek Baru',
            'edit_item'     => 'Edit Proyek',
            'all_items'     => 'Semua Proyek',
            'menu_name'     => 'Proyek',
        ),
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-hammer',
        'menu_position'=> 21,
        'supports'     => array( 'title', 'thumbnail', 'page-attributes', 'revisions' ),
        'has_archive'  => false,
    ) );

    register_post_type( 'tcm_sertifikat', array(
        'labels' => array(
            'name'          => 'Sertifikat',
            'singular_name' => 'Sertifikat',
            'add_new'       => 'Tambah Dokumen',
            'add_new_item'  => 'Tambah Sertifikat / Penghargaan',
            'edit_item'     => 'Edit Dokumen',
            'all_items'     => 'Semua Sertifikat',
            'menu_name'     => 'Sertifikat',
        ),
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-awards',
        'menu_position'=> 22,
        'supports'     => array( 'title', 'thumbnail', 'page-attributes', 'revisions' ),
        'has_archive'  => false,
    ) );
}
add_action( 'init', 'tcm_register_types' );

/** Ganti label "Pos" bawaan jadi "Berita". */
function tcm_rename_posts() {
    global $wp_post_types;
    if ( isset( $wp_post_types['post'] ) ) {
        $l = $wp_post_types['post']->labels;
        $l->name = $l->singular_name = $l->menu_name = 'Berita';
        $l->add_new_item = 'Tulis Berita Baru';
        $l->all_items    = 'Semua Berita';
    }
}
add_action( 'init', 'tcm_rename_posts', 20 );

/* ------------------------------------------------------- kotak isian */
function tcm_fields() {
    return array(
        'tcm_proyek' => array(
            'klien'    => array( 'Klien / Pemberi Tugas', 'text', '' ),
            'judul_singkat'   => array( 'Judul singkat (untuk daftar di Beranda)', 'text', 'Boleh dikosongkan — kalau kosong dipakai judul lengkap di atas.' ),
            'klien_singkat'   => array( 'Klien singkat (untuk Beranda)', 'text', 'Boleh dikosongkan.' ),
            'lokasi_singkat'  => array( 'Lokasi singkat (untuk Beranda)', 'text', 'Boleh dikosongkan.' ),
            'periode_singkat' => array( 'Periode singkat (untuk Beranda)', 'text', 'Boleh dikosongkan, mis. 2024–2027.' ),
            'lokasi'   => array( 'Lokasi Pekerjaan', 'text', '' ),
            'periode'  => array( 'Periode', 'text', 'Contoh: Des 2024 – Nov 2027' ),
            'status'   => array( 'Status', 'select', array( 'berjalan' => 'Berjalan', 'selesai' => 'Selesai' ) ),
            'kategori' => array( 'Bidang', 'select', array( 'geo' => 'Panas Bumi', 'og' => 'Minyak & Gas', 'con' => 'Konstruksi & Sipil' ) ),
            'warna'    => array( 'Warna aksen', 'select', array( 'navy' => 'Biru', 'green' => 'Hijau', 'orange' => 'Oranye' ) ),
            'lingkup'  => array( 'Lingkup Pekerjaan', 'textarea', 'Uraian lingkup sesuai kontrak. JANGAN cantumkan nilai kontrak.' ),
            'tag'      => array( 'Kata Kunci Pekerjaan', 'textarea', 'Satu per baris. Contoh: Welding' ),
        ),
        'tcm_sertifikat' => array(
            'kelompok'  => array( 'Kelompok', 'select', array(
                'iso' => 'Sistem Manajemen (ISO/SMK3)', 'csms' => 'CSMS & Pra-Kualifikasi',
                'penghargaan' => 'Penghargaan', 'legalitas' => 'Izin Usaha & Legalitas' ) ),
            'penerbit'  => array( 'Diterbitkan Oleh', 'text', '' ),
            'ringkas'   => array( 'Keterangan Singkat (untuk Beranda)', 'text', 'Satu baris pendek, mis. "Sistem Manajemen Mutu". Dipakai pada kartu di Beranda; halaman Sertifikat memakai keterangan panjang di bawah.' ),
            'keterangan'=> array( 'Keterangan', 'textarea', '' ),
            'berlaku'   => array( 'Masa Berlaku / Nomor', 'text', 'Contoh: Berlaku s.d. 5 Oktober 2028' ),
            'tahun'     => array( 'Tahun (khusus Penghargaan)', 'text', 'Contoh: 2025' ),
            'warna'     => array( 'Warna aksen', 'select', array( 'navy' => 'Biru', 'green' => 'Hijau', 'orange' => 'Oranye' ) ),
        ),
    );
}

function tcm_add_boxes() {
    foreach ( tcm_fields() as $type => $fields ) {
        add_meta_box( 'tcm_box_' . $type, 'Rincian', 'tcm_render_box', $type, 'normal', 'high' );
    }
}
add_action( 'add_meta_boxes', 'tcm_add_boxes' );

function tcm_render_box( $post ) {
    $all = tcm_fields();
    if ( ! isset( $all[ $post->post_type ] ) ) { return; }
    wp_nonce_field( 'tcm_save', 'tcm_nonce' );
    echo '<style>.tcmf{margin:16px 0}.tcmf label{display:block;font-weight:600;margin-bottom:5px}
          .tcmf input[type=text],.tcmf textarea,.tcmf select{width:100%;max-width:720px}
          .tcmf textarea{min-height:110px}.tcmf .hint{color:#777;font-size:12px;margin-top:4px}</style>';
    foreach ( $all[ $post->post_type ] as $key => $f ) {
        list( $label, $type, $opt ) = $f;
        $val = get_post_meta( $post->ID, 'tcm_' . $key, true );
        $id  = 'tcm_' . $key;
        echo '<div class="tcmf"><label for="' . esc_attr( $id ) . '">' . esc_html( $label ) . '</label>';
        if ( 'textarea' === $type ) {
            echo '<textarea id="' . esc_attr( $id ) . '" name="' . esc_attr( $id ) . '">' . esc_textarea( $val ) . '</textarea>';
        } elseif ( 'select' === $type ) {
            echo '<select id="' . esc_attr( $id ) . '" name="' . esc_attr( $id ) . '">';
            foreach ( (array) $opt as $k => $t ) {
                echo '<option value="' . esc_attr( $k ) . '"' . selected( $val, $k, false ) . '>' . esc_html( $t ) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<input type="text" id="' . esc_attr( $id ) . '" name="' . esc_attr( $id ) . '" value="' . esc_attr( $val ) . '">';
        }
        if ( is_string( $opt ) && $opt && 'select' !== $type ) {
            echo '<div class="hint">' . esc_html( $opt ) . '</div>';
        }
        echo '</div>';
    }
    echo '<p style="color:#777;font-size:12px;margin-top:18px">Foto proyek / gambar dokumen diatur lewat kotak <b>Gambar Unggulan</b> di sebelah kanan.</p>';
}

function tcm_save_box( $post_id ) {
    if ( ! isset( $_POST['tcm_nonce'] ) || ! wp_verify_nonce( $_POST['tcm_nonce'], 'tcm_save' ) ) { return; }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
    if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }
    $all = tcm_fields();
    $type = get_post_type( $post_id );
    if ( ! isset( $all[ $type ] ) ) { return; }
    foreach ( array_keys( $all[ $type ] ) as $key ) {
        $name = 'tcm_' . $key;
        if ( isset( $_POST[ $name ] ) ) {
            $raw = wp_unslash( $_POST[ $name ] );
            $val = is_string( $raw ) ? wp_kses_post( $raw ) : '';
            update_post_meta( $post_id, $name, $val );
        }
    }
}
add_action( 'save_post', 'tcm_save_box' );

/* -------------------------------------------------- pembantu tampilan */
function tcm_sertifikat_query( $kelompok ) {
    return new WP_Query( array(
        'post_type'      => 'tcm_sertifikat',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
        'meta_query'     => array(
            array( 'key' => 'tcm_kelompok', 'value' => $kelompok ),
        ),
    ) );
}

/**
 * Kartu sertifikat versi ringkas untuk Beranda.
 *
 * Beranda memakai markah .cert (kartu kecil, keterangan satu baris), berbeda
 * dengan halaman Sertifikat yang memakai .doc (kartu besar, keterangan penuh).
 * Dua-duanya memang beda sejak versi rancangan — jangan disamakan.
 */
function tcm_kartu_cert( $id, $ikon = 'i-check' ) {
    $m     = tcm_meta( $id, array( 'ringkas', 'keterangan', 'berlaku', 'tahun', 'warna' ) );
    $warna = $m['warna'] ? $m['warna'] : 'navy';
    $judul = get_the_title( $id );
    $teks  = $m['ringkas'] ? $m['ringkas'] : wp_trim_words( wp_strip_all_tags( $m['keterangan'] ), 10 );
    $nilai = $m['berlaku'] ? $m['berlaku'] : $m['tahun'];

    ob_start(); ?>
      <div class="cert" style="--c:var(--<?php echo esc_attr( $warna ); ?>)">
        <?php if ( has_post_thumbnail( $id ) ) : ?>
          <div class="cthumb" data-zoom data-cap="<?php echo esc_attr( $judul . ' — PT Trimitra Cipta Mandiri' ); ?>">
            <?php echo get_the_post_thumbnail( $id, 'tcm-doc', array( 'alt' => $judul, 'loading' => 'lazy' ) ); ?>
            <span class="zoom"><?php tcm_teks( 'umum', 'label_perbesar' ); ?></span>
          </div>
        <?php endif; ?>
        <div class="cbody">
          <div class="ic"><svg viewBox="0 0 24 24"><use href="#<?php echo esc_attr( $ikon ); ?>"/></svg></div>
          <h4><?php echo esc_html( $judul ); ?></h4><p><?php echo esc_html( $teks ); ?></p>
          <?php if ( $nilai ) : ?><div class="val"><?php echo esc_html( $nilai ); ?></div><?php endif; ?>
        </div>
      </div>
    <?php
    return ob_get_clean();
}

function tcm_kartu_dokumen( $id, $ikon = 'i-check' ) {
    $m     = tcm_meta( $id, array( 'penerbit', 'keterangan', 'berlaku', 'warna' ) );
    $warna = $m['warna'] ? $m['warna'] : 'navy';
    $judul = get_the_title( $id );

    ob_start(); ?>
      <div class="doc rv" style="--c:var(--<?php echo esc_attr( $warna ); ?>)">
        <?php if ( has_post_thumbnail( $id ) ) : ?>
          <div class="dthumb" data-zoom data-cap="<?php echo esc_attr( $judul . ' — PT Trimitra Cipta Mandiri' ); ?>">
            <?php echo get_the_post_thumbnail( $id, 'tcm-doc', array( 'alt' => $judul, 'loading' => 'lazy' ) ); ?>
            <span class="wm"><?php tcm_teks( 'umum', 'label_tandaair' ); ?></span>
            <span class="zoom">Perbesar</span>
          </div>
        <?php else : ?>
          <div class="dthumb none"><span>Salinan dokumen tersedia atas permintaan melalui kontak resmi perusahaan</span></div>
        <?php endif; ?>
        <div class="dbody">
          <div class="top">
            <div class="ic"><svg viewBox="0 0 24 24"><use href="#<?php echo esc_attr( $ikon ); ?>"/></svg></div>
            <div><h4><?php echo esc_html( $judul ); ?></h4>
              <div class="iss"><?php echo esc_html( $m['penerbit'] ); ?></div></div>
          </div>
          <p><?php echo wp_kses_post( $m['keterangan'] ); ?></p>
          <?php if ( $m['berlaku'] ) : ?>
            <div class="val"><?php echo esc_html( $m['berlaku'] ); ?></div>
          <?php endif; ?>
        </div>
      </div>
    <?php
    return ob_get_clean();
}

/* ------------------------------------- peringatan pengaturan keliru */
/**
 * Kalau "Halaman depan menampilkan" diset ke Halaman statis tapi halamannya
 * belum dipilih, WordPress akan menampilkan daftar berita di beranda.
 * Ini penyebab yang paling sering bikin bingung, jadi diberi peringatan jelas.
 */
function tcm_cek_beranda() {
    if ( ! current_user_can( 'manage_options' ) ) { return; }
    if ( 'page' !== get_option( 'show_on_front' ) || (int) get_option( 'page_on_front' ) ) { return; }

    $url = admin_url( 'options-reading.php' );
    echo '<div class="notice notice-warning"><p><b>Halaman depan belum dipilih.</b> '
       . 'Beranda saat ini menampilkan daftar berita, bukan tampilan rancangan TCM. '
       . 'Buka <a href="' . esc_url( $url ) . '"><b>Pengaturan &rarr; Membaca</b></a>, lalu pada '
       . '<i>Halaman depan</i> pilih sebuah halaman (misalnya buat halaman kosong bernama '
       . '&ldquo;Beranda&rdquo;). Isi halaman itu tidak dipakai &mdash; tampilan beranda sudah '
       . 'diatur oleh tema.</p></div>';
}
add_action( 'admin_notices', 'tcm_cek_beranda' );

/* ---------------------------------------- pasang gambar saat impor */
/**
 * Salin satu berkas gambar dari folder tema ke Media Library,
 * lalu pasang sebagai Gambar Unggulan.
 */
function tcm_pasang_gambar( $post_id, $nama_berkas, $folder = 'dok' ) {
    if ( empty( $nama_berkas ) ) { return false; }
    if ( has_post_thumbnail( $post_id ) ) { return false; }

    $sumber = TCM_DIR . '/assets/' . $folder . '/' . $nama_berkas;
    if ( ! file_exists( $sumber ) ) {
        // berkas foto kegiatan tersimpan di assets/img, dokumen di assets/dok
        $sumber = TCM_DIR . '/assets/img/' . $nama_berkas;
    }
    if ( ! file_exists( $sumber ) ) { return false; }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $up = wp_upload_dir();
    if ( ! empty( $up['error'] ) ) { return false; }

    $nama_unik = wp_unique_filename( $up['path'], $nama_berkas );
    $tujuan    = trailingslashit( $up['path'] ) . $nama_unik;
    if ( ! copy( $sumber, $tujuan ) ) { return false; }

    $tipe = wp_check_filetype( $nama_unik, null );
    $lampiran = array(
        'post_mime_type' => $tipe['type'] ? $tipe['type'] : 'image/jpeg',
        'post_title'     => get_the_title( $post_id ),
        'post_content'   => '',
        'post_status'    => 'inherit',
    );
    $att_id = wp_insert_attachment( $lampiran, $tujuan, $post_id );
    if ( ! $att_id || is_wp_error( $att_id ) ) { return false; }

    $meta = wp_generate_attachment_metadata( $att_id, $tujuan );
    wp_update_attachment_metadata( $att_id, $meta );
    set_post_thumbnail( $post_id, $att_id );
    return true;
}

/* ------------------------------------------- perapian salinan ganda */

/** Kumpulkan judul yang muncul lebih dari sekali, per tipe konten. */
function tcm_kelompok_duplikat() {
    $hasil = array();
    foreach ( array( 'tcm_proyek', 'tcm_sertifikat' ) as $tipe ) {
        $semua = get_posts( array(
            'post_type'   => $tipe,
            'post_status' => array( 'publish', 'draft', 'pending', 'private' ),
            'numberposts' => -1,
            'orderby'     => 'ID',
            'order'       => 'ASC',
        ) );
        $peta = array();
        foreach ( $semua as $pos ) {
            $k = mb_strtolower( trim( $pos->post_title ) );
            $peta[ $k ][] = $pos;
        }
        foreach ( $peta as $rombongan ) {
            if ( count( $rombongan ) > 1 ) { $hasil[] = $rombongan; }
        }
    }
    return $hasil;
}

/** Berapa banyak salinan berlebih yang ada. */
function tcm_hitung_duplikat() {
    $n = 0;
    foreach ( tcm_kelompok_duplikat() as $rombongan ) { $n += count( $rombongan ) - 1; }
    return $n;
}

/**
 * Buang salinan ganda ke Trash. Yang disimpan: yang punya Gambar Unggulan;
 * kalau sama-sama punya atau sama-sama tidak, yang ID-nya paling kecil (tertua).
 */
function tcm_bersihkan_duplikat() {
    $dibuang = array();
    foreach ( tcm_kelompok_duplikat() as $rombongan ) {
        $simpan = null;
        foreach ( $rombongan as $pos ) {
            if ( has_post_thumbnail( $pos->ID ) ) { $simpan = $pos; break; }
        }
        if ( ! $simpan ) { $simpan = $rombongan[0]; }
        foreach ( $rombongan as $pos ) {
            if ( $pos->ID === $simpan->ID ) { continue; }
            wp_trash_post( $pos->ID );
            $dibuang[] = $pos->post_title;
        }
    }
    return $dibuang;
}

/* --------------------------------- pasang gambar susulan (konten lama) */

/** Baca berkas data awal. */
function tcm_data_awal() {
    $file = TCM_DIR . '/seed/konten-awal.json';
    if ( ! file_exists( $file ) ) { return array( 'proyek' => array(), 'sertifikat' => array() ); }
    $d = json_decode( file_get_contents( $file ), true );
    return is_array( $d ) ? $d : array( 'proyek' => array(), 'sertifikat' => array() );
}

/** Berapa konten yang seharusnya punya gambar tapi belum terpasang. */
function tcm_hitung_gambar_hilang() {
    $data = tcm_data_awal();
    $n = 0;
    foreach ( array( 'proyek' => 'tcm_proyek', 'sertifikat' => 'tcm_sertifikat' ) as $k => $tipe ) {
        foreach ( (array) $data[ $k ] as $row ) {
            if ( empty( $row['gambar'] ) ) { continue; }
            $id = tcm_sudah_ada( $row['judul'], $tipe );
            if ( $id && ! has_post_thumbnail( $id ) ) { $n++; }
        }
    }
    return $n;
}

/**
 * Pasang gambar pada konten yang sudah terlanjur dibuat tanpa gambar.
 * Aman dijalankan berkali-kali: yang sudah punya gambar dilewati.
 */
function tcm_pasang_gambar_susulan() {
    $data = tcm_data_awal();
    $hasil = array( 'pasang' => 0, 'lewat' => 0, 'gagal' => array() );
    @set_time_limit( 300 );
    foreach ( array( 'proyek' => 'tcm_proyek', 'sertifikat' => 'tcm_sertifikat' ) as $k => $tipe ) {
        foreach ( (array) $data[ $k ] as $row ) {
            if ( empty( $row['gambar'] ) ) { continue; }
            $id = tcm_sudah_ada( $row['judul'], $tipe );
            if ( ! $id ) { continue; }
            if ( has_post_thumbnail( $id ) ) { $hasil['lewat']++; continue; }
            if ( tcm_pasang_gambar( $id, $row['gambar'] ) ) {
                $hasil['pasang']++;
            } else {
                $hasil['gagal'][] = wp_strip_all_tags( html_entity_decode( $row['judul'] ) );
            }
        }
    }
    return $hasil;
}

/* ------------------------------------------------ pengimpor konten awal */

/** Cari satu konten berdasarkan judul (sudah didekode) pada tipe tertentu. */
function tcm_cari_judul( $judul, $tipe ) {
    $judul = wp_strip_all_tags( html_entity_decode( $judul, ENT_QUOTES, 'UTF-8' ) );
    $found = get_posts( array(
        'post_type'        => $tipe,
        'post_status'      => 'any',
        'numberposts'      => 1,
        'title'            => $judul,
        'fields'           => 'ids',
        'suppress_filters' => false,
    ) );
    return $found ? (int) $found[0] : 0;
}

/** Penanda unik dari judul, dipakai agar impor ulang tidak menggandakan. */
function tcm_kunci( $judul ) {
    return md5( mb_strtolower( wp_strip_all_tags(
        html_entity_decode( $judul, ENT_QUOTES, 'UTF-8' ) ) ) );
}

/** Sudah pernah diimpor? */
function tcm_sudah_ada( $judul, $tipe ) {
    $kunci = tcm_kunci( $judul );
    $found = get_posts( array(
        'post_type'   => $tipe,
        'post_status' => 'any',
        'numberposts' => 1,
        'fields'      => 'ids',
        'meta_query'  => array( array( 'key' => 'tcm_kunci', 'value' => $kunci ) ),
    ) );
    if ( $found ) { return (int) $found[0]; }
    return tcm_cari_judul( $judul, $tipe );
}

function tcm_import_menu() {
    add_management_page( 'Impor Konten TCM', 'Impor Konten TCM', 'manage_options',
        'tcm-impor', 'tcm_import_page' );
}
add_action( 'admin_menu', 'tcm_import_menu' );

function tcm_import_page() {
    echo '<div class="wrap"><h1>Impor Konten Awal TCM</h1>';

    $file = TCM_DIR . '/seed/konten-awal.json';
    if ( ! file_exists( $file ) ) {
        echo '<p>Berkas <code>seed/konten-awal.json</code> tidak ditemukan.</p></div>';
        return;
    }

    if ( isset( $_POST['tcm_impor'] ) && check_admin_referer( 'tcm_impor' ) ) {
        $data = json_decode( file_get_contents( $file ), true );
        $n = array( 'proyek' => 0, 'sertifikat' => 0, 'lewat' => 0, 'gambar' => 0 );
        @set_time_limit( 300 );

        foreach ( (array) $data['proyek'] as $i => $p ) {
            if ( tcm_sudah_ada( $p['judul'], 'tcm_proyek' ) ) { $n['lewat']++; continue; }
            $id = wp_insert_post( array(
                'post_type'   => 'tcm_proyek',
                'post_title'  => wp_strip_all_tags( html_entity_decode( $p['judul'] ) ),
                'post_status' => 'publish',
                'menu_order'  => (int) $p['no'],
            ) );
            if ( ! $id || is_wp_error( $id ) ) { continue; }
            update_post_meta( $id, 'tcm_kunci',    tcm_kunci( $p['judul'] ) );
            update_post_meta( $id, 'tcm_klien',    html_entity_decode( $p['klien'] ) );
            foreach ( array( 'judul_singkat', 'klien_singkat', 'lokasi_singkat', 'periode_singkat' ) as $ks ) {
                update_post_meta( $id, 'tcm_' . $ks, html_entity_decode( isset( $p[ $ks ] ) ? $p[ $ks ] : '' ) );
            }
            update_post_meta( $id, 'tcm_lokasi',   html_entity_decode( $p['lokasi'] ) );
            update_post_meta( $id, 'tcm_periode',  html_entity_decode( $p['periode'] ) );
            update_post_meta( $id, 'tcm_status',   $p['status'] );
            update_post_meta( $id, 'tcm_kategori', $p['kategori'] );
            update_post_meta( $id, 'tcm_warna',    $p['warna'] );
            update_post_meta( $id, 'tcm_lingkup',  html_entity_decode( $p['lingkup'] ) );
            update_post_meta( $id, 'tcm_tag',      implode( "\n", array_map( 'html_entity_decode', (array) $p['tag'] ) ) );
            if ( ! empty( $p['gambar'] ) && tcm_pasang_gambar( $id, $p['gambar'] ) ) { $n['gambar']++; }
            $n['proyek']++;
        }

        foreach ( (array) $data['sertifikat'] as $i => $s ) {
            if ( tcm_sudah_ada( $s['judul'], 'tcm_sertifikat' ) ) { $n['lewat']++; continue; }
            $id = wp_insert_post( array(
                'post_type'   => 'tcm_sertifikat',
                'post_title'  => wp_strip_all_tags( html_entity_decode( $s['judul'] ) ),
                'post_status' => 'publish',
                'menu_order'  => $i + 1,
            ) );
            if ( ! $id || is_wp_error( $id ) ) { continue; }
            update_post_meta( $id, 'tcm_kunci',      tcm_kunci( $s['judul'] ) );
            update_post_meta( $id, 'tcm_kelompok',   $s['kelompok'] );
            update_post_meta( $id, 'tcm_penerbit',   html_entity_decode( $s['penerbit'] ) );
            update_post_meta( $id, 'tcm_ringkas',    html_entity_decode( isset( $s['ringkas'] ) ? $s['ringkas'] : '' ) );
            update_post_meta( $id, 'tcm_keterangan', html_entity_decode( $s['keterangan'] ) );
            update_post_meta( $id, 'tcm_berlaku',    html_entity_decode( $s['berlaku'] ) );
            update_post_meta( $id, 'tcm_tahun',      $s['tahun'] );
            update_post_meta( $id, 'tcm_warna',      $s['warna'] );
            if ( ! empty( $s['gambar'] ) && tcm_pasang_gambar( $id, $s['gambar'] ) ) { $n['gambar']++; }
            $n['sertifikat']++;
        }

        /* ----------------------------------------------------- berita
         * Tiga berita yang sudah tayang di versi pratinjau dan disetujui.
         * Naskahnya diambil apa adanya dari dokumen bahan berita — tidak ada
         * kalimat baru yang dikarang di sini. Berita berikutnya ditulis
         * sendiri lewat menu Berita.
         */
        $n['berita'] = 0;
        foreach ( (array) ( isset( $data['berita'] ) ? $data['berita'] : array() ) as $b ) {
            $judul = wp_strip_all_tags( html_entity_decode( $b['judul'] ) );
            if ( tcm_sudah_ada( $b['judul'], 'post' ) ) { $n['lewat']++; continue; }
            $id = wp_insert_post( array(
                'post_type'    => 'post',
                'post_title'   => $judul,
                'post_content' => wp_kses_post( html_entity_decode( $b['isi'] ) ),
                'post_excerpt' => wp_strip_all_tags( html_entity_decode( $b['ringkas'] ) ),
                'post_status'  => 'publish',
                'post_date'    => $b['tanggal'],
            ) );
            if ( ! $id || is_wp_error( $id ) ) { continue; }
            update_post_meta( $id, 'tcm_kunci', tcm_kunci( $b['judul'] ) );
            if ( ! empty( $b['kategori'] ) ) {
                // wp_create_category() membuat kategorinya kalau belum ada,
                // dan mengembalikan yang lama kalau sudah ada.
                $kat = wp_create_category( sanitize_text_field( $b['kategori'] ) );
                if ( $kat ) {
                    wp_set_post_categories( $id, array( (int) $kat ) );
                }
            }
            if ( ! empty( $b['gambar'] ) && tcm_pasang_gambar( $id, $b['gambar'], 'img' ) ) { $n['gambar']++; }
            $n['berita']++;
        }

        printf(
            '<div class="notice notice-success"><p>Selesai. %d proyek, %d sertifikat, dan %d berita ditambahkan, %d gambar terpasang otomatis. %d dilewati karena sudah ada.</p></div>',
            $n['proyek'], $n['sertifikat'], $n['berita'], $n['gambar'], $n['lewat']
        );
        echo '<p>Sebagian dokumen memang tidak punya gambar (legalitas, P2K3, CSMS Indonesia Power). '
           . 'Kalau ada berkasnya, pasang lewat kotak <b>Gambar Unggulan</b> di halaman edit masing-masing.</p>';
    }

    /* --- pemasang gambar susulan --- */
    if ( isset( $_POST['tcm_gambar'] ) && check_admin_referer( 'tcm_impor' ) ) {
        $r = tcm_pasang_gambar_susulan();
        printf( '<div class="notice notice-success"><p><b>%d gambar terpasang.</b> '
              . '%d dilewati karena sudah punya gambar.</p></div>',
              $r['pasang'], $r['lewat'] );
        if ( $r['gagal'] ) {
            echo '<div class="notice notice-error"><p>Gagal memasang gambar untuk: '
               . esc_html( implode( ', ', array_slice( $r['gagal'], 0, 10 ) ) ) . '</p></div>';
        }
    }

    $kurang = tcm_hitung_gambar_hilang();
    if ( $kurang ) {
        printf( '<div class="notice notice-warning"><p><b>%d konten belum punya gambar</b> '
              . 'padahal berkasnya tersedia di dalam tema. Ini terjadi kalau konten diimpor '
              . 'memakai tema versi lama. Klik tombol di bawah untuk memasangnya.</p></div>', $kurang );
        echo '<form method="post" style="margin-bottom:26px">';
        wp_nonce_field( 'tcm_impor' );
        submit_button( 'Pasang gambar yang belum ada', 'primary', 'tcm_gambar', false );
        echo '</form>';
    }

    /* --- pembersih duplikat --- */
    if ( isset( $_POST['tcm_bersih'] ) && check_admin_referer( 'tcm_impor' ) ) {
        $dibuang = tcm_bersihkan_duplikat();
        if ( $dibuang ) {
            printf( '<div class="notice notice-success"><p>%d salinan ganda dipindahkan ke '
                  . '<b>Trash</b>. Yang tertua untuk tiap judul tetap disimpan. '
                  . 'Kalau ada yang salah buang, bisa dikembalikan dari Trash.</p></div>',
                  count( $dibuang ) );
            echo '<ul style="margin-left:18px;list-style:disc">';
            foreach ( array_slice( $dibuang, 0, 30 ) as $judul ) {
                echo '<li>' . esc_html( $judul ) . '</li>';
            }
            echo '</ul>';
        } else {
            echo '<div class="notice notice-info"><p>Tidak ada salinan ganda. Semua bersih.</p></div>';
        }
    }

    $ganda = tcm_hitung_duplikat();
    if ( $ganda ) {
        printf( '<div class="notice notice-warning"><p><b>Terdeteksi %d salinan ganda.</b> '
              . 'Biasanya karena tombol impor terklik lebih dari sekali. '
              . 'Klik tombol di bawah untuk merapikan.</p></div>', $ganda );
        echo '<form method="post" style="margin-bottom:26px">';
        wp_nonce_field( 'tcm_impor' );
        submit_button( 'Rapikan salinan ganda', 'secondary', 'tcm_bersih', false );
        echo '</form>';
    }

    $data = json_decode( file_get_contents( $file ), true );
    printf( '<p>Berkas siap impor: <b>%d proyek</b> dan <b>%d sertifikat</b>.</p>',
        count( (array) $data['proyek'] ), count( (array) $data['sertifikat'] ) );
    echo '<p>Gambar proyek dan sertifikat ikut terpasang otomatis. Proses bisa memakan waktu '
       . 'satu sampai dua menit &mdash; jangan tutup halaman ini sampai muncul keterangan selesai.</p>';
    echo '<p>Jalankan <b>sekali saja</b>. Data yang judulnya sudah ada akan dilewati, jadi aman kalau tidak sengaja terklik dua kali.</p>';
    echo '<form method="post">';
    wp_nonce_field( 'tcm_impor' );
    submit_button( 'Impor sekarang', 'primary', 'tcm_impor' );
    echo '</form></div>';
}


/* ------------------------------------------------------------------
 * Penyiapan otomatis (v3.1): buat semua halaman + atur Halaman Depan.
 * Berjalan sekali saat tema diaktifkan ATAU saat admin dibuka pertama
 * kali setelah tema diperbarui — tidak perlu membuat halaman manual.
 * ------------------------------------------------------------------ */
function tcm_setup_awal() {
    $halaman = array(
        'beranda'      => 'Beranda',
        'tentang-kami' => 'Tentang Kami',
        'layanan'      => 'Layanan',
        'proyek'       => 'Proyek',
        'sertifikat'   => 'Sertifikat & Penghargaan',
        'esg'          => 'ESG',
        'sdm'          => 'SDM & Human Capital',
        'kebijakan'    => 'Kebijakan',
        'karier'       => 'Karier',
        'kontak'       => 'Kontak',
        'berita'       => 'Berita',
    );
    foreach ( $halaman as $slug => $judul ) {
        if ( ! get_page_by_path( $slug ) ) {
            wp_insert_post( array(
                'post_type'    => 'page',
                'post_status'  => 'publish',
                'post_title'   => $judul,
                'post_name'    => $slug,
                'post_content' => '',
            ) );
        }
    }
    $beranda = get_page_by_path( 'beranda' );
    $berita  = get_page_by_path( 'berita' );
    if ( $beranda ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $beranda->ID );
    }
    if ( $berita ) {
        update_option( 'page_for_posts', $berita->ID );
    }
    if ( ! get_option( 'permalink_structure' ) ) {
        update_option( 'permalink_structure', '/%postname%/' );
    }
    flush_rewrite_rules();
    update_option( 'tcm_setup_v31', 1 );
}
add_action( 'after_switch_theme', 'tcm_setup_awal' );

function tcm_setup_awal_sekali() {
    if ( ! get_option( 'tcm_setup_v31' ) && current_user_can( 'manage_options' ) ) {
        tcm_setup_awal();
    }
}
add_action( 'admin_init', 'tcm_setup_awal_sekali' );
