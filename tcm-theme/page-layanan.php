<?php
/*
Template Name: Halaman: Layanan
*/
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; Layanan</div>
    <h1><?php tcm_kaya( 'layanan', 'kepala_judul' ); ?></h1>
    <p><?php tcm_teks( 'layanan', 'kepala_teks' ); ?></p>
  </div>
</section>
<div class="wrap">
  <div class="grp">
    <div class="gcard rv" style="--c:var(--navy)">
      <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-gear"/></svg></div>
      <h3><?php tcm_teks( 'layanan', 'grp1_judul' ); ?></h3><p><?php tcm_teks( 'layanan', 'grp1_teks' ); ?></p>
      <a href="#operasi"><?php tcm_teks( 'layanan', 'grp_tombol' ); ?> &rarr;</a>
    </div>
    <div class="gcard rv" style="--c:var(--orange)">
      <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-bricks"/></svg></div>
      <h3><?php tcm_teks( 'layanan', 'grp2_judul' ); ?></h3><p><?php tcm_teks( 'layanan', 'grp2_teks' ); ?></p>
      <a href="#konstruksi"><?php tcm_teks( 'layanan', 'grp_tombol' ); ?> &rarr;</a>
    </div>
    <div class="gcard rv" style="--c:var(--green)">
      <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-shield"/></svg></div>
      <h3><?php tcm_teks( 'layanan', 'grp3_judul' ); ?></h3><p><?php tcm_teks( 'layanan', 'grp3_teks' ); ?></p>
      <a href="#dukungan"><?php tcm_teks( 'layanan', 'grp_tombol' ); ?> &rarr;</a>
    </div>
  </div>
</div>
<section id="operasi">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'layanan', 'k1_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_teks( 'layanan', 'k1_judul' ); ?></h2>
    </div>
    <div class="sv">
<?php
$tcm_sv = array(
  array( 'sv1', 'i-gear', 'navy' ),
  array( 'sv2', 'i-wrench', 'green' ),
  array( 'sv3', 'i-gear', 'orange' ),
  array( 'sv4', 'i-bolt', 'navy' ),
);
foreach ( $tcm_sv as $v ) :
  $judul = trim( (string) tcm_kwt_nilai( 'layanan', $v[0] . '_judul' ) );
  if ( '' === $judul ) { continue; }
  $rinci = preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'layanan', $v[0] . '_daftar' ) );
  $rinci = array_values( array_filter( array_map( 'trim', $rinci ), 'strlen' ) );
?>
      <div class="svrow rv" style="--c:var(--<?php echo esc_attr( $v[2] ); ?>)">
        <div class="ic"><svg viewBox="0 0 24 24"><use href="#<?php echo esc_attr( $v[1] ); ?>"/></svg></div>
        <div><h3><?php echo esc_html( $judul ); ?></h3><div class="en"><?php tcm_teks( 'layanan', $v[0] . '_sub' ); ?></div><p><?php tcm_teks( 'layanan', $v[0] . '_teks' ); ?></p></div>
        <ul class="svlist"><?php foreach ( $rinci as $baris ) : ?><li><?php echo esc_html( $baris ); ?></li><?php endforeach; ?></ul>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>
<section id="konstruksi" style="background:var(--paper)">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'layanan', 'k2_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_teks( 'layanan', 'k2_judul' ); ?></h2>
    </div>
    <div class="sv">
<?php
$tcm_sv = array(
  array( 'sv5', 'i-flame', 'orange' ),
  array( 'sv6', 'i-bricks', 'green' ),
  array( 'sv7', 'i-ladder', 'navy' ),
  array( 'sv8', 'i-truck', 'orange' ),
);
foreach ( $tcm_sv as $v ) :
  $judul = trim( (string) tcm_kwt_nilai( 'layanan', $v[0] . '_judul' ) );
  if ( '' === $judul ) { continue; }
  $rinci = preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'layanan', $v[0] . '_daftar' ) );
  $rinci = array_values( array_filter( array_map( 'trim', $rinci ), 'strlen' ) );
?>
      <div class="svrow rv" style="--c:var(--<?php echo esc_attr( $v[2] ); ?>)">
        <div class="ic"><svg viewBox="0 0 24 24"><use href="#<?php echo esc_attr( $v[1] ); ?>"/></svg></div>
        <div><h3><?php echo esc_html( $judul ); ?></h3><div class="en"><?php tcm_teks( 'layanan', $v[0] . '_sub' ); ?></div><p><?php tcm_teks( 'layanan', $v[0] . '_teks' ); ?></p></div>
        <ul class="svlist"><?php foreach ( $rinci as $baris ) : ?><li><?php echo esc_html( $baris ); ?></li><?php endforeach; ?></ul>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>
<section id="dukungan">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'layanan', 'k3_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_teks( 'layanan', 'k3_judul' ); ?></h2>
    </div>
    <div class="sv">
<?php
$tcm_sv = array(
  array( 'sv9', 'i-truck', 'green' ),
  array( 'sv10', 'i-shield', 'navy' ),
  array( 'sv11', 'i-check', 'orange' ),
  array( 'sv12', 'i-clock', 'green' ),
);
foreach ( $tcm_sv as $v ) :
  $judul = trim( (string) tcm_kwt_nilai( 'layanan', $v[0] . '_judul' ) );
  if ( '' === $judul ) { continue; }
  $rinci = preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'layanan', $v[0] . '_daftar' ) );
  $rinci = array_values( array_filter( array_map( 'trim', $rinci ), 'strlen' ) );
?>
      <div class="svrow rv" style="--c:var(--<?php echo esc_attr( $v[2] ); ?>)">
        <div class="ic"><svg viewBox="0 0 24 24"><use href="#<?php echo esc_attr( $v[1] ); ?>"/></svg></div>
        <div><h3><?php echo esc_html( $judul ); ?></h3><div class="en"><?php tcm_teks( 'layanan', $v[0] . '_sub' ); ?></div><p><?php tcm_teks( 'layanan', $v[0] . '_teks' ); ?></p></div>
        <ul class="svlist"><?php foreach ( $rinci as $baris ) : ?><li><?php echo esc_html( $baris ); ?></li><?php endforeach; ?></ul>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>
<section id="alur" style="background:var(--paper)">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'layanan', 'alur_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'layanan', 'alur_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'layanan', 'alur_lede' ); ?></p>
    </div>
    <div class="flow">
      <div class="step rv" style="--c:var(--navy)"><h4><?php tcm_teks( 'layanan', 'alur1_judul' ); ?></h4><p><?php tcm_teks( 'layanan', 'alur1_teks' ); ?></p></div>
      <div class="step rv" style="--c:var(--green)"><h4><?php tcm_teks( 'layanan', 'alur2_judul' ); ?></h4><p><?php tcm_teks( 'layanan', 'alur2_teks' ); ?></p></div>
      <div class="step rv" style="--c:var(--orange)"><h4><?php tcm_teks( 'layanan', 'alur3_judul' ); ?></h4><p><?php tcm_teks( 'layanan', 'alur3_teks' ); ?></p></div>
      <div class="step rv" style="--c:var(--navy)"><h4><?php tcm_teks( 'layanan', 'alur4_judul' ); ?></h4><p><?php tcm_teks( 'layanan', 'alur4_teks' ); ?></p></div>
      <div class="step rv" style="--c:var(--green)"><h4><?php tcm_teks( 'layanan', 'alur5_judul' ); ?></h4><p><?php tcm_teks( 'layanan', 'alur5_teks' ); ?></p></div>
    </div>
  </div>
</section>
<section id="kapabilitas">
  <div class="wrap">
    <div class="cap">
      <div class="rv">
        <div class="eyebrow"><?php tcm_teks( 'layanan', 'sd_eyebrow' ); ?></div>
        <h2 class="sec"><?php tcm_kaya( 'layanan', 'sd_judul' ); ?></h2>
        <p class="lede"><?php tcm_teks( 'layanan', 'sd_lede' ); ?></p>
        <div class="capnum">
          <div style="--c:var(--navy)"><b>256</b><span><?php tcm_teks( 'layanan', 'num1_label' ); ?></span></div>
          <div style="--c:var(--green)"><b>55</b><span><?php tcm_teks( 'layanan', 'num2_label' ); ?></span></div>
          <div style="--c:var(--orange)"><b>25+</b><span><?php tcm_teks( 'layanan', 'num3_label' ); ?></span></div>
          <div style="--c:var(--navy-l)"><b><?php echo (int) tcm_jumlah_sertifikat( 'iso' ); ?></b><span><?php tcm_teks( 'layanan', 'num4_label' ); ?></span></div>
        </div>
        <div style="margin-top:30px">
          <a class="btn btn-o" href="<?php echo esc_url( tcm_url( array('sertifikat','sertifikat-penghargaan'), '/sertifikat/' ) ); ?>"><?php tcm_teks( 'layanan', 'sert_tombol' ); ?> &rarr;</a>
        </div>
      </div>
      <div class="rv"><img src="<?php tcm_gambar( 'layanan', 'foto_sumberdaya', 'assets/img/tim-tcm-di-area-operasi-2.jpg' ); ?>" alt="Tim TCM di area operasi"></div>
    </div>
  </div>
</section>
<section style="background:var(--paper)">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'layanan', 'nr_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'layanan', 'nr_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'layanan', 'nr_lede' ); ?></p>
    </div>
    <div class="nrt rv"><?php
foreach ( preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'layanan', 'keahlian' ) ) as $tcm_k ) :
  $tcm_k = trim( $tcm_k );
  if ( '' === $tcm_k ) { continue; }
?>
      <span><?php echo esc_html( $tcm_k ); ?></span>
<?php endforeach; ?></div>
    <div style="margin-top:40px">
      <a class="btn btn-o" href="<?php echo esc_url( tcm_url( array('proyek','pengalaman'), '/proyek/' ) ); ?>"><?php tcm_teks( 'layanan', 'proyek_tombol' ); ?> &rarr;</a>
    </div>
  </div>
</section>
<section>
  <div class="wrap">
    <div class="cta-band rv">
      <div><h2><?php tcm_teks( 'layanan', 'cta_judul' ); ?></h2>
        <p><?php tcm_teks( 'layanan', 'cta_teks' ); ?></p></div>
      <a class="btn btn-p" href="<?php echo esc_url( tcm_url( array('kontak','hubungi-kami'), '/kontak/' ) ); ?>" style="justify-self:end"><?php tcm_teks( 'layanan', 'cta_tombol' ); ?> &rarr;</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
