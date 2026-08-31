<?php
/*
Template Name: Halaman: Kebijakan
*/
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; Kebijakan Perusahaan</div>
    <h1><?php tcm_kaya( 'kebijakan', 'kepala_judul' ); ?></h1>
    <p><?php tcm_teks( 'kebijakan', 'kepala_teks' ); ?></p>
  </div>
</section>
<div class="kbw">
<?php
$tcm_kb = array(
  array( 'kb1', 'mk3pl', 'orange', 'utama' ),
  array( 'kb2', 'stop-work', 'navy', '' ),
  array( 'kb3', 'alkohol-obat', 'green', '' ),
  array( 'kb4', 'merokok', 'navy-l', '' ),
  array( 'kb5', 'hiv-aids', 'green-l', '' ),
);
foreach ( $tcm_kb as $b ) :
  list( $k, $id, $warna, $kelas ) = $b;
  $judul = trim( (string) tcm_kwt_nilai( 'kebijakan', $k . '_judul' ) );
  if ( '' === $judul ) { continue; }
  $butir = preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'kebijakan', $k . '_daftar' ) );
  $butir = array_values( array_filter( array_map( 'trim', $butir ), 'strlen' ) );
  $tutup = trim( (string) tcm_kwt_nilai( 'kebijakan', $k . '_tutup' ) );
  $pdf   = trim( (string) tcm_kwt_nilai( 'kebijakan', $k . '_pdf' ) );
?>
  <article class="kb <?php echo esc_attr( $kelas ); ?>" id="<?php echo esc_attr( $id ); ?>" style="--c:var(--<?php echo esc_attr( $warna ); ?>)">
    <div class="top">
      <span class="tag"><?php tcm_teks( 'kebijakan', $k . '_tag' ); ?></span>
      <h2><?php echo esc_html( $judul ); ?><span><?php tcm_teks( 'kebijakan', $k . '_sub' ); ?></span></h2>
    </div>
    <div class="bd">
      <p><?php tcm_teks( 'kebijakan', $k . '_intro' ); ?></p>
      <ul>
<?php foreach ( $butir as $baris ) : ?>
        <li><span class="ck"><svg viewBox="0 0 24 24"><path d="m4 12 5.5 5.5L20 7"/></svg></span><span><?php echo wp_kses( $baris, tcm_kwt_tag_kaya() ); ?></span></li>
<?php endforeach; ?>
      </ul>
<?php if ( '' !== $tutup ) : ?>
      <p class="tutup"><?php echo esc_html( $tutup ); ?></p>
<?php endif; ?>
    </div>
    <div class="ft">
      <small><?php tcm_teks( 'kebijakan', $k . '_ft' ); ?></small>
<?php if ( '' !== $pdf ) : ?>
      <a class="dl" href="<?php echo esc_url( TCM_URI . '/assets/dok/' . $pdf ); ?>" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24"><path d="M12 3v12"/><path d="m7 11 5 5 5-5"/>
        <path d="M4 21h16"/></svg><?php tcm_teks( 'kebijakan', 'unduh_tombol' ); ?></a>
<?php endif; ?>
    </div>
  </article>
<?php endforeach; ?>
</div>
<div class="kbnote">
  <div><b>Tentang dokumen ini</b><p>Halaman ini memuat naskah kebijakan sebagaimana ditetapkan Direktur. Dokumen asli bertanda tangan tersedia dalam bentuk PDF pada tombol unduh di setiap kebijakan, dan dapat diserahkan sebagai lampiran pra-kualifikasi.</p></div>
</div>
<section style="padding:76px 0 84px">
  <div class="wrap" style="text-align:center">
    <h2 class="sec"><?php tcm_teks( 'kebijakan', 'tutup_judul' ); ?></h2>
    <p class="lede" style="margin:14px auto 26px"><?php tcm_teks( 'kebijakan', 'tutup_teks' ); ?></p>
    <a class="btn btn-p" href="<?php echo esc_url( tcm_url( array('kontak','hubungi-kami'), '/kontak/' ) ); ?>">Hubungi Kami &rarr;</a>
  </div>
</section>

<?php get_footer(); ?>
