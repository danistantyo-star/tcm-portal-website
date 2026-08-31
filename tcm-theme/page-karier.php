<?php
/*
Template Name: Halaman: Karier
*/
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; Karier</div>
    <h1><?php tcm_kaya( 'karier', 'kepala_judul' ); ?></h1>
    <p><?php tcm_teks( 'karier', 'kepala_teks' ); ?></p>
  </div>
</section>
<section>
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'karier', 'knp_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'karier', 'knp_judul' ); ?></h2>
    </div>
    <div class="why">
      <div class="wcard rv" style="--c:var(--navy)">
        <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-shield"/></svg></div>
        <h3><?php tcm_teks( 'karier', 'knp1_judul' ); ?></h3><p><?php tcm_teks( 'karier', 'knp1_teks' ); ?></p>
      </div>
      <div class="wcard rv" style="--c:var(--green)">
        <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-target"/></svg></div>
        <h3><?php tcm_teks( 'karier', 'knp2_judul' ); ?></h3><p><?php tcm_teks( 'karier', 'knp2_teks' ); ?></p>
      </div>
      <div class="wcard rv" style="--c:var(--orange)">
        <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-star"/></svg></div>
        <h3><?php tcm_teks( 'karier', 'knp3_judul' ); ?></h3><p><?php tcm_teks( 'karier', 'knp3_teks' ); ?></p>
      </div>
    </div>
  </div>
</section>
<section style="background:var(--paper)">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'karier', 'pos_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'karier', 'pos_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'karier', 'pos_lede' ); ?></p>
    </div>
    <div class="roles">
<?php
$tcm_rol = array(
  array( 'rol1', 'var(--navy)' ),
  array( 'rol2', 'var(--orange)' ),
  array( 'rol3', 'var(--green)' ),
  array( 'rol4', 'var(--navy)' ),
);
foreach ( $tcm_rol as $r ) :
  $judul = trim( (string) tcm_kwt_nilai( 'karier', $r[0] . '_judul' ) );
  $isi   = preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'karier', $r[0] . '_daftar' ) );
  $isi   = array_values( array_filter( array_map( 'trim', $isi ), 'strlen' ) );
  if ( '' === $judul || ! $isi ) { continue; }
?>
      <div class="role rv" style="--c:<?php echo esc_attr( $r[1] ); ?>">
        <h4><?php echo esc_html( $judul ); ?></h4>
        <ul><?php foreach ( $isi as $baris ) : ?><li><?php echo esc_html( $baris ); ?></li><?php endforeach; ?></ul>
      </div>
<?php endforeach; ?>
    </div>
    <?php $tcm_lowongan = trim( (string) tcm_kwt_nilai( 'karier', 'lowongan_teks' ) ); ?>
<?php if ( '' !== $tcm_lowongan ) : ?>
    <div class="hiring rv"><i>&#9432;</i><p><?php echo esc_html( $tcm_lowongan ); ?></p></div>
<?php endif; ?>
    <div class="apply rv">
      <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-mail"/></svg></div>
      <div><h3><?php tcm_teks( 'karier', 'lamar_judul' ); ?></h3>
        <p><?php tcm_kaya( 'karier', 'lamar_teks1' ); ?> <a href="mailto:<?php echo esc_attr( tcm_kwt_nilai( 'kontak', 'kantor_email' ) ); ?>"><?php tcm_teks( 'kontak', 'kantor_email' ); ?></a> <?php tcm_kaya( 'karier', 'lamar_teks2' ); ?></p></div>
    </div>
  </div>
</section>
<section>
  <div class="wrap">
    <div class="cta-band rv">
      <div><h2><?php tcm_teks( 'karier', 'cta_judul' ); ?></h2>
        <p><?php tcm_teks( 'karier', 'cta_teks' ); ?></p></div>
      <a class="btn btn-p" href="<?php echo esc_url( tcm_url( array('kontak','hubungi-kami'), '/kontak/' ) ); ?>" style="justify-self:end"><?php tcm_teks( 'karier', 'cta_tombol' ); ?> &rarr;</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
