<?php
/**
 * Kepala halaman: logo, menu utama, dan pembuka <body>.
 * Menu sengaja ditulis di tema agar tata letak tidak berubah tak sengaja.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body id="top" <?php body_class(); ?>>
<svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs>
<g id="i-gear"><path d="M10.22 2.82 A 9.35 9.35 0 0 1 13.78 2.82 L14.15 5.18 A 7.15 7.15 0 0 1 15.3 5.66 L17.23 4.25 A 9.35 9.35 0 0 1 19.75 6.77 L18.34 8.7 A 7.15 7.15 0 0 1 18.82 9.85 L21.18 10.22 A 9.35 9.35 0 0 1 21.18 13.78 L18.82 14.15 A 7.15 7.15 0 0 1 18.34 15.3 L19.75 17.23 A 9.35 9.35 0 0 1 17.23 19.75 L15.3 18.34 A 7.15 7.15 0 0 1 14.15 18.82 L13.78 21.18 A 9.35 9.35 0 0 1 10.22 21.18 L9.85 18.82 A 7.15 7.15 0 0 1 8.7 18.34 L6.77 19.75 A 9.35 9.35 0 0 1 4.25 17.23 L5.66 15.3 A 7.15 7.15 0 0 1 5.18 14.15 L2.82 13.78 A 9.35 9.35 0 0 1 2.82 10.22 L5.18 9.85 A 7.15 7.15 0 0 1 5.66 8.7 L4.25 6.77 A 9.35 9.35 0 0 1 6.77 4.25 L8.7 5.66 A 7.15 7.15 0 0 1 9.85 5.18 L10.22 2.82 Z"/><circle cx="12" cy="12" r="2.95"/></g>
<g id="i-wrench"><path d="M2.6 13.8h4.4M17 13.8h4.4"/><circle cx="12" cy="13.8" r="5"/><path d="M12 8.8V5.4"/><path d="M8.6 5.4h6.8"/></g>
<g id="i-flame"><path d="M12 2.9c3.25 3.6 5.6 6.35 5.6 9.95a5.6 5.6 0 1 1-11.2 0c0-3.6 2.35-6.35 5.6-9.95Z"/><path d="M12 13.3c1.3 1.45 2.15 2.4 2.15 3.75a2.15 2.15 0 1 1-4.3 0c0-1.35.85-2.3 2.15-3.75Z"/></g>
<g id="i-bricks"><rect x="3.2" y="5" width="17.6" height="14" rx="2.2"/><path d="M3.2 9.67h17.6M3.2 14.33h17.6"/><path d="M12 5v4.67M7.6 9.67v4.66M16.4 9.67v4.66M12 14.33V19"/></g>
<g id="i-ladder"><rect x="4.5" y="3.9" width="15" height="16.2" rx="1.5"/><path d="M4.5 12h15"/><path d="M4.5 12 19.5 3.9M4.5 20.1 19.5 12"/></g>
<g id="i-bolt"><path d="M13.6 2.4 5.4 13.4h5.1l-.7 8.2 8.2-11h-5.1Z"/></g>
<g id="i-shield"><path d="M12 2.6 20 5.55v6.15c0 4.9-3.3 8.45-8 9.7-4.7-1.25-8-4.8-8-9.7V5.55Z"/><path d="m8.55 12.05 2.45 2.45 4.45-4.75"/></g>
<g id="i-truck"><rect x="2.6" y="7.4" width="10.4" height="7.6" rx="1.6"/><path d="M13 9.8h4l3.6 3.5V15H13"/><circle cx="6.8" cy="17.2" r="2.05"/><circle cx="17" cy="17.2" r="2.05"/></g>
<g id="i-globe"><circle cx="12" cy="12" r="9.2"/><ellipse cx="12" cy="12" rx="4.05" ry="9.2"/><path d="M2.8 12h18.4"/><path d="M4.5 7.3c2.2 1.15 4.7 1.75 7.5 1.75s5.3-.6 7.5-1.75"/><path d="M4.5 16.7c2.2-1.15 4.7-1.75 7.5-1.75s5.3.6 7.5 1.75"/></g>
<g id="i-check"><path d="m4.7 12.35 4.85 4.95L19.4 6.75"/></g>
<g id="i-target"><circle cx="12" cy="12" r="9.2"/><circle cx="12" cy="12" r="5.5"/><circle cx="12" cy="12" r="1.9"/></g>
<g id="i-star"><path d="M12 3 L14.09 9.43 L20.84 9.43 L15.38 13.4 L17.47 19.82 L12 15.85 L6.53 19.82 L8.62 13.4 L3.16 9.43 L9.91 9.43 Z"/></g>
<g id="i-users"><circle cx="9.4" cy="8.9" r="3.15"/><path d="M3.3 19.7c0-3.3 2.65-5.4 6.1-5.4s6.1 2.1 6.1 5.4"/><circle cx="17.4" cy="8.4" r="2.4"/><path d="M16.6 14.3c2.65.35 4.1 2.05 4.1 4.5"/></g>
<g id="i-pin"><path d="M12 21.3c4.3-5.1 6.45-8.65 6.45-11.65a6.45 6.45 0 1 0-12.9 0c0 3 2.15 6.55 6.45 11.65Z"/><circle cx="12" cy="9.6" r="2.5"/></g>
<g id="i-phone"><path d="M6.15 3.4h3.4l1.75 4.4-2.35 1.7a12.7 12.7 0 0 0 5.55 5.55l1.7-2.354.4 1.75v3.4a1.85 1.85 0 0 1-2.05 1.85A16.45 16.45 0 0 1 4.3 5.45a1.85 1.85 0 0 1 1.85-2.05Z"/></g>
<g id="i-mail"><rect x="2.8" y="5.2" width="18.4" height="13.6" rx="2.4"/><path d="m3.6 7.3 8.4 6.1 8.4-6.1"/></g>
<g id="i-clock"><circle cx="12" cy="12" r="9.2"/><path d="M12 6.5V12l3.85 2.3"/></g>
</defs></svg>

<header id="hd">
  <div class="hut-pita hut-el"><?php tcm_kaya( 'umum', 'hut_pita' ); ?> <span>&mdash; <?php tcm_teks( 'umum', 'hut_pita_sub' ); ?></span></div>
  <div class="wrap bar">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="brand">
      <img class="logo lw" src="<?php echo TCM_URI; ?>/assets/img/pt-trimitra-cipta-mandiri.png" alt="<?php bloginfo('name'); ?>">
      <img class="logo ld" src="<?php echo TCM_URI; ?>/assets/img/pt-trimitra-cipta-mandiri-2.png" alt="<?php bloginfo('name'); ?>">
    </a>
    <div class="hut-lencana hut-el" aria-hidden="true"><?php
      $tcm_hut_gid = 'hutg26h';
      get_template_part( 'bagian/lambang-hut' );
    ?></div>
    <nav id="nav">
      <a href="<?php echo esc_url( home_url('/') ); ?>"<?php echo tcm_active('home'); ?>><?php tcm_teks( 'umum', 'nav_beranda' ); ?></a>
      <a href="<?php echo esc_url( tcm_url( array('tentang-kami','tentang','profil'), '/tentang-kami/' ) ); ?>"<?php echo tcm_active('tentang'); ?>><?php tcm_teks( 'umum', 'nav_tentang' ); ?></a>
      <a href="<?php echo esc_url( tcm_url( array('layanan','jasa'), '/layanan/' ) ); ?>"<?php echo tcm_active('layanan'); ?>><?php tcm_teks( 'umum', 'nav_layanan' ); ?></a>
      <a href="<?php echo esc_url( tcm_url( array('proyek','pengalaman'), '/proyek/' ) ); ?>"<?php echo tcm_active('proyek'); ?>><?php tcm_teks( 'umum', 'nav_proyek' ); ?></a>
      <a href="<?php echo esc_url( tcm_url( array('sertifikat','sertifikat-penghargaan'), '/sertifikat/' ) ); ?>"<?php echo tcm_active('sertifikat'); ?>><?php tcm_teks( 'umum', 'nav_sertifikat' ); ?></a>
      <a href="<?php echo esc_url( tcm_url( array('esg','esg-keberlanjutan'), '/esg/' ) ); ?>"<?php echo tcm_active('esg'); ?>><?php tcm_teks( 'umum', 'nav_esg' ); ?></a>
      <a href="<?php echo esc_url( tcm_url( array('sdm','sdm-human-capital','human-capital'), '/sdm/' ) ); ?>"<?php echo tcm_active('sdm'); ?>><?php tcm_teks( 'umum', 'nav_sdm' ); ?></a>
      <a href="<?php echo esc_url( tcm_url_berita() ); ?>"<?php echo tcm_active('berita'); ?>><?php tcm_teks( 'umum', 'nav_berita' ); ?></a>
      <a href="<?php echo esc_url( tcm_url( array('karier','karir'), '/karier/' ) ); ?>"<?php echo tcm_active('karier'); ?>><?php tcm_teks( 'umum', 'nav_karier' ); ?></a>
      <a href="<?php echo esc_url( tcm_url( array('kontak','hubungi-kami'), '/kontak/' ) ); ?>"<?php echo tcm_active('kontak'); ?>><?php tcm_teks( 'umum', 'nav_kontak' ); ?></a>
    </nav>
<?php
/* Pengalih bahasa muncul dalam dua keadaan:
   1. Polylang aktif  -> tautan ke halaman terjemahan yang sebenarnya
   2. Polylang belum aktif, tetapi pengelola sedang login -> pratinjau
      ?bahasa=en, supaya isi versi Inggris bisa diperiksa lebih dulu.
   Pengunjung biasa tanpa Polylang tidak melihat apa-apa. */
$tcm_pratinjau = tcm_boleh_pratinjau_bahasa();
if ( tcm_dwibahasa() || $tcm_pratinjau ) :
      $tcm_kini = tcm_bahasa();
      ?>
    <div class="lang<?php echo $tcm_pratinjau ? ' lang-pratinjau' : ''; ?>"
         <?php if ( $tcm_pratinjau ) : ?>title="Pratinjau bahasa — hanya terlihat oleh pengelola yang sedang login. Pasang Polylang untuk mengaktifkan versi Inggris bagi pengunjung."<?php endif; ?>>
      <?php foreach ( array( 'id' => 'ID', 'en' => 'EN' ) as $tcm_kode => $tcm_label ) :
        $tcm_alamat = $tcm_pratinjau ? tcm_url_pratinjau( $tcm_kode ) : tcm_url_bahasa( $tcm_kode );
        if ( $tcm_kode === $tcm_kini || ! $tcm_alamat ) : ?>
        <span class="on"><?php echo esc_html( $tcm_label ); ?></span>
      <?php else : ?>
        <a href="<?php echo esc_url( $tcm_alamat ); ?>" title="<?php echo esc_attr( 'en' === $tcm_kode ? 'English' : 'Bahasa Indonesia' ); ?>"><?php echo esc_html( $tcm_label ); ?></a>
      <?php endif; endforeach; ?>
    </div>
<?php endif; ?>
    <button class="burger" id="bg" aria-label="Menu"><i></i><i></i><i></i></button>
  </div>
</header>
