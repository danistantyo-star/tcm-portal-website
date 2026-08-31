<?php
/**
 * Blok "Pengalaman Panjang di Jambi".
 *
 * Dipakai di Beranda dan halaman Proyek. Isinya diambil dari
 * Konten Website → Proyek → Pengalaman Jambi, jadi cukup diubah sekali
 * dan berubah di kedua tempat.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Di Beranda blok ini tampil ringkas: tanpa foto lebar dan tanpa foto pada
 * kedua kartu, supaya Beranda tidak terlalu panjang. Di halaman Proyek tampil
 * lengkap. Penanda dikirim lewat $GLOBALS karena get_template_part() tidak
 * membawa variabel dari berkas pemanggilnya.
 */
$tcm_ringkas = ! empty( $GLOBALS['tcm_jambi_ringkas'] );
?>
<div class="jambi rv">
  <div class="jhead">
    <div>
      <div class="eyebrow"><?php tcm_teks( 'proyek', 'jambi_eyebrow' ); ?></div>
      <h3><?php tcm_kaya( 'proyek', 'jambi_judul' ); ?></h3>
      <p><?php tcm_teks( 'proyek', 'jambi_teks' ); ?></p>
    </div>
    <div class="jstat">
      <div><b><?php tcm_teks( 'proyek', 'jambi_s1_nilai' ); ?></b><span><?php tcm_teks( 'proyek', 'jambi_s1_label' ); ?></span></div>
      <div><b><?php tcm_teks( 'proyek', 'jambi_s2_nilai' ); ?></b><span><?php tcm_teks( 'proyek', 'jambi_s2_label' ); ?></span></div>
      <div><b><?php tcm_teks( 'proyek', 'jambi_s3_nilai' ); ?></b><span><?php tcm_teks( 'proyek', 'jambi_s3_label' ); ?></span></div>
    </div>
  </div>

<?php if ( ! $tcm_ringkas ) : ?>
  <figure class="jband rv">
    <img src="<?php tcm_gambar( 'proyek', 'jambi_foto', 'assets/img/stasiun-meter-gas-jambi.jpg' ); ?>"
         alt="<?php echo esc_attr( tcm_kwt_nilai( 'proyek', 'jambi_kapsi' ) ); ?>" loading="lazy">
    <figcaption><?php tcm_teks( 'proyek', 'jambi_kapsi' ); ?></figcaption>
  </figure>
<?php endif; ?>

  <svg class="jroute" viewBox="0 0 900 132" role="img"
       aria-label="<?php echo esc_attr( tcm_kwt_nilai( 'proyek', 'jr_spec1' ) . ' — ' . tcm_kwt_nilai( 'proyek', 'jr_spec2' ) ); ?>">
    <defs><linearGradient id="jg" gradientUnits="userSpaceOnUse" x1="70" y1="0" x2="830" y2="0">
      <stop offset="0" stop-color="#00225C"/><stop offset="1" stop-color="#01702F"/></linearGradient></defs>
    <line x1="70" y1="66" x2="830" y2="66" stroke="url(#jg)" stroke-width="9" stroke-linecap="round"/>
    <g fill="#fff" stroke="#00225C" stroke-width="3.5"><circle cx="70" cy="66" r="11"/><circle cx="450" cy="66" r="11"/></g>
    <circle cx="830" cy="66" r="11" fill="#fff" stroke="#01702F" stroke-width="3.5"/>
    <g font-family="inherit" font-size="13" font-weight="700" fill="#0B2340" text-anchor="middle">
      <text x="70" y="100"><?php tcm_teks( 'proyek', 'jr_t1' ); ?></text>
      <text x="450" y="100"><?php tcm_teks( 'proyek', 'jr_t2' ); ?></text>
      <text x="830" y="100"><?php tcm_teks( 'proyek', 'jr_t3' ); ?></text></g>
    <g font-family="inherit" font-size="11" fill="#6A7C93" text-anchor="middle">
      <text x="70" y="117"><?php tcm_teks( 'proyek', 'jr_s1' ); ?></text>
      <text x="450" y="117"><?php tcm_teks( 'proyek', 'jr_s2' ); ?></text>
      <text x="830" y="117"><?php tcm_teks( 'proyek', 'jr_s3' ); ?></text></g>
    <g font-family="inherit" font-size="12" font-weight="800" fill="#00225C" text-anchor="middle">
      <text x="260" y="42"><?php tcm_teks( 'proyek', 'jr_spec1' ); ?></text></g>
    <g font-family="inherit" font-size="12" font-weight="800" fill="#01702F" text-anchor="middle">
      <text x="640" y="42"><?php tcm_teks( 'proyek', 'jr_spec2' ); ?></text></g>
  </svg>

  <div class="jcards">
    <?php
    $tcm_jalur = array(
      array( 'awalan' => 'j1_', 'foto_bawaan' => 'assets/img/teknisi-payo-selincah-jambi.jpg' ),
      array( 'awalan' => 'j2_', 'foto_bawaan' => 'assets/img/teknisi-sei-gelam-jambi.jpg' ),
    );
    foreach ( $tcm_jalur as $tcm_j ) :
      $a = $tcm_j['awalan'];
      ?>
      <article>
<?php if ( ! $tcm_ringkas ) : ?>
        <figure class="jpic">
          <img src="<?php tcm_gambar( 'proyek', $a . 'foto', $tcm_j['foto_bawaan'] ); ?>"
               alt="<?php echo esc_attr( tcm_kwt_nilai( 'proyek', $a . 'judul' ) ); ?>" loading="lazy">
        </figure>
<?php endif; ?>
        <h4><?php tcm_teks( 'proyek', $a . 'judul' ); ?></h4>
        <div class="jwho"><?php tcm_teks( 'proyek', $a . 'klien' ); ?></div>
        <div class="jspec">
          <div><?php tcm_teks( 'proyek', 'jspec_l1' ); ?><b><?php tcm_teks( 'proyek', $a . 'panjang' ); ?></b></div>
          <div><?php tcm_teks( 'proyek', 'jspec_l2' ); ?><b><?php tcm_teks( 'proyek', $a . 'diameter' ); ?></b></div>
          <div><?php tcm_teks( 'proyek', 'jspec_l3' ); ?><b><?php tcm_teks( 'proyek', $a . 'kapasitas' ); ?></b></div>
          <div><?php tcm_teks( 'proyek', 'jspec_l4' ); ?><b><?php tcm_teks( 'proyek', $a . 'periode' ); ?></b></div>
        </div>
        <p><?php tcm_teks( 'proyek', $a . 'teks' ); ?></p>
      </article>
    <?php endforeach; ?>
  </div>
</div>
